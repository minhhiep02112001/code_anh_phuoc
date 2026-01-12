<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    /**
     * Generate text/HTML from Gemini.
     *
     * @param string $prompt
     * @param array $options
     *  - model: override model
     *  - cache: true/false
     *  - cache_key: custom cache key
     *  - temperature, maxOutputTokens
     *  - response_mime_type: 'text/plain' | 'text/html'
     *  - debug_raw: true/false
     */
    public static function generate(string $prompt, array $options = []): array
    {
        $cfg = config('gemini');

        $keys = self::getAliveKeys($cfg['keys'] ?? []);
        if (empty($keys)) {
            return self::fail('No alive GEMINI_KEYS (all blacklisted or missing).');
        }

        // models list (primary + fallback)
        $models = [];
        if (!empty($options['model'])) {
            $models[] = $options['model'];
        } else {
            $models[] = $cfg['default_model'] ?? 'models/gemini-flash-lite-latest';
        }
        $models = array_values(array_unique(array_merge($models, $cfg['fallback_models'] ?? [])));


        // Thử theo model (fallback), mỗi model thử vài key (alive)
        $last = null;

        foreach ($models as $model) {
            // shuffle keys để phân tán tải
            $keysShuffled = $keys;
            shuffle($keysShuffled);

            foreach ($keysShuffled as $key) {
                // Rate limit per key + jitter
                self::acquireRateSlot($key, (int)($cfg['rpm_per_key'] ?? 12));

                $res = self::callGemini($key, $model, $prompt, $cfg, $options);
                $last = $res;

                if ($res['ok']) return $res;

                // 403 leaked => blacklist key và thử key khác (không retry)
                if (($res['http'] ?? 0) === 403 && self::isLeakedKeyError($res)) {
                    self::blacklistKey($key, 7 * 24 * 3600);
                    // update alive keys list
                    $keys = self::getAliveKeys($cfg['keys'] ?? []);
                    continue;
                }

                // 429 => thử lại key khác hoặc model khác (đã có wait trong callGemini)
                if (($res['http'] ?? 0) === 429) {
                    continue;
                }

                // 400/401/404/… thường là lỗi schema/model/permission => không cần thử tiếp vô ích
                if (in_array(($res['http'] ?? 0), [400, 401, 404], true)) {
                    break;
                }
            }
        }

        return $last ?: self::fail('Unknown error');
    }

    private static function callGemini(string $key, string $model, string $prompt, array $cfg, array $options): array
    {
        $endpoint = rtrim((string)($cfg['endpoint'] ?? 'https://generativelanguage.googleapis.com/v1beta'), '/');
        $timeout  = (int)($cfg['timeout'] ?? 60);

        $temperature = $options['temperature'] ?? data_get($cfg, 'generation.temperature', 0.3);
        $maxOutputTokens = $options['maxOutputTokens'] ?? data_get($cfg, 'generation.maxOutputTokens', 1200);

        $generationConfig = [
            'temperature' => (float)$temperature,
            'maxOutputTokens' => (int)$maxOutputTokens,
        ];

        $thinking = data_get($cfg, 'generation.thinkingConfig');
        if (is_array($thinking)) {
            $generationConfig['thinkingConfig'] = $thinking;
        }

        if (!empty($options['response_mime_type'])) {
            $generationConfig['responseMimeType'] = $options['response_mime_type'];
        }

        $payload = [
            'contents' => [[
                'parts' => [['text' => $prompt]],
            ]],
            'generationConfig' => $generationConfig,
        ];

        $attempts = 3;

        for ($i = 1; $i <= $attempts; $i++) {
            /** @var Response $response */
            $response = Http::timeout($timeout)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'x-goog-api-key' => $key,
                ])
                ->post("{$endpoint}/{$model}:generateContent", $payload);

            $http = $response->status();
            $json = $response->json();

            // OK
            if ($response->successful()) {
                $text = (string) data_get($json, 'candidates.0.content.parts.0.text', '');
                $finish = (string) data_get($json, 'candidates.0.finishReason', '');
                $usage = data_get($json, 'usageMetadata', []);

                Log::info('Gemini OK', [
                    'model' => $model,
                    'key' => substr(sha1($key), 0, 10),
                    'finish' => $finish,
                    'usage' => $usage,
                ]);

                return [
                    'ok' => true,
                    'http' => $http,
                    'model' => $model,
                    'text' => trim($text),
                    'finishReason' => $finish,
                    'usage' => $usage,
                    'raw' => ($options['debug_raw'] ?? false) ? $json : null,
                ];
            }

            // 403 leaked: không retry
            if ($http === 403 && self::messageContains((string)data_get($json, 'error.message', ''), 'reported as leaked')) {
                Log::warning('Gemini KEY LEAKED', [
                    'model' => $model,
                    'key' => substr(sha1($key), 0, 10),
                    'http' => $http,
                    'error' => data_get($json, 'error'),
                ]);

                return [
                    'ok' => false,
                    'http' => $http,
                    'model' => $model,
                    'error' => data_get($json, 'error'),
                    'raw' => $json,
                ];
            }

            // 429: chờ đúng Retry-After / "retry in Xs" rồi retry (cùng key+model)
            if ($http === 429 && $i < $attempts) {
                $wait = self::retryAfterSeconds($response, $json);
                // jitter 0-2s
                sleep(max(1, $wait) + rand(0, 2));
                continue;
            }

            Log::warning('Gemini FAIL', [
                'model' => $model,
                'key' => substr(sha1($key), 0, 10),
                'http' => $http,
                'error' => data_get($json, 'error'),
            ]);

            return [
                'ok' => false,
                'http' => $http,
                'model' => $model,
                'error' => data_get($json, 'error'),
                'raw' => $json,
            ];
        }

        return self::fail('Retry attempts exhausted');
    }

    /**
     * Rate limit: RPM per key (simple per-minute counter) + jitter to smooth bursts.
     */
    private static function acquireRateSlot(string $key, int $rpm): void
    {
        $rpm = max(1, $rpm);

        $minuteKey = 'gemini:rpm:' . substr(sha1($key), 0, 12) . ':' . now()->format('YmdHi');
        $count = Cache::increment($minuteKey);

        if ($count === 1) {
            Cache::put($minuteKey, 1, 70);
        }

        if ($count > $rpm) {
            // Sleep until next minute window + jitter
            $secLeft = 60 - (int) now()->format('s');
            usleep((int)(($secLeft + rand(1, 3)) * 1_000_000));
        } else {
            // Small jitter 150-450ms to avoid spike patterns
            usleep(rand(150, 450) * 1000);
        }
    }

    private static function retryAfterSeconds(Response $response, array $json): int
    {
        $h = $response->header('Retry-After');
        if ($h && is_numeric($h)) {
            return (int) $h;
        }

        $msg = (string) data_get($json, 'error.message', '');
        if (preg_match('/retry in\s+([0-9]+(?:\.[0-9]+)?)s/i', $msg, $m)) {
            return (int) ceil((float) $m[1]);
        }

        return 2;
    }

    private static function blacklistKey(string $key, int $ttlSeconds): void
    {
        Cache::put(self::deadKeyCacheKey($key), true, $ttlSeconds);
    }

    private static function getAliveKeys(array $keys): array
    {
        $alive = [];
        $configKey =  Setting::where([
            'domain' => env('APP_URL'),
            'key' => 'config_gemini'
        ])->select(['key', 'value'])->first();

        $configKey = json_decode($configKey->value);
        // cắt = dấu xuống dòng

        $dbKeys = [];

        if (!empty($configKey)) {

            // tách theo xuống dòng
            $lines = preg_split('/\r\n|\r|\n/', trim($configKey->keys));

            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '') continue;
                $dbKeys[] = $line;
            }
        }

        // ===== 2. Merge key từ ENV + DB =====
        $allKeys = array_unique(array_merge($keys, $dbKeys)); 
        // ===== 3. Filter key còn sống (chưa blacklist) =====
        foreach ($allKeys as $k) {
            $k = trim((string) $k);
            if ($k === '') continue;

            if (!Cache::get(self::deadKeyCacheKey($k))) {
                $alive[] = $k;
            }
        }

        return array_values($alive);
    }

    private static function deadKeyCacheKey(string $key): string
    {
        return 'gemini:dead-key:' . substr(sha1($key), 0, 16);
    }

    private static function isLeakedKeyError(array $res): bool
    {
        $msg = (string) data_get($res, 'error.message', '');
        return self::messageContains($msg, 'reported as leaked');
    }

    private static function messageContains(string $haystack, string $needle): bool
    {
        return stripos($haystack, $needle) !== false;
    }

    private static function makeCacheKey(string $prompt, array $models, array $cfg, array $options): string
    {
        return 'gemini:'
            . sha1(json_encode([
                'prompt' => $prompt,
                'models' => $models,
                'gen' => [
                    'temperature' => $options['temperature'] ?? data_get($cfg, 'generation.temperature', 0.3),
                    'maxOutputTokens' => $options['maxOutputTokens'] ?? data_get($cfg, 'generation.maxOutputTokens', 1200),
                    'response_mime_type' => $options['response_mime_type'] ?? null,
                ],
            ], JSON_UNESCAPED_UNICODE));
    }

    private static function fail(string $msg): array
    {
        return [
            'ok' => false,
            'http' => 0,
            'model' => null,
            'error' => ['message' => $msg],
        ];
    }
}

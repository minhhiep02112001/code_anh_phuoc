<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\GeminiService;

class GenerateContentCommand extends Command
{
    protected $signature = 'content:generate {--limit=3}';

    protected $description = 'Generate content for posts using Gemini';

    public function handle()
    {
        $limit = (int) $this->option('limit') ?: 3;

        $this->info("🚀 Start generate content (limit={$limit})");

        $posts = DB::table('st_post')
            ->where('is_crawler_content', 2)
            ->orderBy('id','desc')
            ->limit($limit)
            ->get();

        if ($posts->isEmpty()) {
            $this->warn('⚠️ No posts found.');
            return Command::SUCCESS;
        }

        foreach ($posts as $post) {

            // 👉 Claim tránh chạy trùng job
            DB::table('st_post')->where('id', $post->id)->update([
                'is_crawler_content' => 3, // processing
            ]);

            try {
                $prompt = $post->promat_content ?: convertStrPromat($post);

                $res = GeminiService::generate($prompt, [
                    'maxOutputTokens' => 1200,
                ]);

                // ✅ Thành công
                if (!empty($res['ok'])) {
                    DB::table('st_post')->where('id', $post->id)->update([
                        'content' => $res['text'] ?? '',
                        'is_crawler_content' => 1, // done
                        'updated_at' => now(),
                    ]);

                    $this->info("✅ Done #{$post->id}");
                    continue;
                }

                // ❌ Lỗi
                $errMsg = data_get($res, 'error.message', 'Unknown error');
                $http   = $res['http'] ?? 0;

                DB::table('st_post')->where('id', $post->id)->update([
                    'is_crawler_content' => 4, // error
                    'updated_at' => now(),
                ]);

                $this->error("❌ Error #{$post->id} (HTTP {$http}): {$errMsg}");

            } catch (\Throwable $e) {

                DB::table('st_post')->where('id', $post->id)->update([
                    'is_crawler_content' => 4,
                    'updated_at' => now(),
                ]);

                $this->error("💥 Exception #{$post->id}: " . $e->getMessage());
            }
        }

        $this->info("🎉 Done batch.");

        return Command::SUCCESS;
    }
}

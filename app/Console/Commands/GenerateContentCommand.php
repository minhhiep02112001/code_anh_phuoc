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
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();

        if ($posts->isEmpty()) {
            $this->warn('⚠️ No posts found.');
            return Command::SUCCESS;
        }

        foreach ($posts as $post) {

            DB::table('st_post')->where('id', $post->id)->update([
                'is_crawler_content' => 3, // processing
            ]);

            try {
                if (empty($post->content)) {
                    // ===== Generate content =====
                    $prompt = $post->promat_content ?: convertStrPromat($post);

                    $res = GeminiService::generate($prompt, [
                        'maxOutputTokens' => 1200,
                    ]);

                    if (empty($res['ok'])) {
                        throw new \Exception(data_get($res, 'error.message', 'Unknown error'));
                    }

                    DB::table('st_post')->where('id', $post->id)->update([
                        'content' => $res['text'] ?? '',
                        'updated_at' => now(),
                    ]);

                    $this->info("✅ Done content #{$post->id}");
                }

                // ===== Generate meta description =====
                if (empty($post->meta_description)) {

                    usleep(300_000); // 300ms tránh rate limit

                    $metaPrompt = convertStrPromatMetaDes($post);

                    $metaRes = GeminiService::generate($metaPrompt, [
                        'maxOutputTokens' => 200,
                    ]);

                    if (!empty($metaRes['ok'])) {
                        DB::table('st_post')->where('id', $post->id)->update([
                            'meta_description' => trim($metaRes['text'] ?? ''),
                        ]);

                        $this->info("📝 Done meta_description #{$post->id}");
                    }
                }

                // ===== Done =====
                DB::table('st_post')->where('id', $post->id)->update([
                    'is_crawler_content' => 1, // done
                ]);
            } catch (\Throwable $e) {

                DB::table('st_post')->where('id', $post->id)->update([
                    'is_crawler_content' => 4, // error
                    'updated_at' => now(),
                ]);

                $this->error("💥 Error #{$post->id}: {$e->getMessage()}");
            }
        }


        $this->info("🎉 Done batch.");

        return Command::SUCCESS;
    }
}

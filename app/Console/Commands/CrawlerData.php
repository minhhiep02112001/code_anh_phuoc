<?php

namespace App\Console\Commands;

use App\Models\Crawler as ModelsCrawler;
use App\Models\Post;
use App\Models\Media;
use App\Services\Crawlers;
use App\Services\CrawlersRestaurants;
use App\Services\CrawlersYelp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:data {--function=} {--url=} {--page=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // php artisan crawler:data --function=category
    public function handle()
    {
        $function = $this->option('function');
        $this->$function();
    }

    function resizeGoogleImageUrl(string $url, int $size = 1000): string
    {
        return preg_replace('/=[swh]\d+(?=-|$)/', '=s' . $size, $url) ?? $url;
    }
    // php artisan crawler:data --function=crawler_images
    public function crawler_images()
    {
        $datas = DB::table('st_post_images')->join('st_post', 'st_post_images.post_id', '=', 'st_post.id')
            ->select(['st_post_images.*', 'st_post.slug'])
            ->where('st_post_images.is_crawler', 0)
            ->whereNotNull('st_post_images.crawler_href')
            ->limit(200)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($datas->groupBy('post_id')->toArray() as $post_id => $data) {
            foreach (array_values($data) as $k => $item) {
                $thumb =  $this->resizeGoogleImageUrl($item->crawler_href);
                if (!empty($thumb)) {
                    $name = rand(1, 1000000);
                    $path = saveImageUrlStorage($thumb, "photos/restaurants/{$item->slug}", "{$item->slug}-{$item->type}-{$name}.jpg");
                    if (empty($path)) {
                        DB::table('st_post_images')->where('id', $item->id)->delete();
                        continue;
                    }
                    $thumbnail = str_replace(['storage', '//'], '', trim($path, '/'));
                    if (Storage::disk('public')->exists($thumbnail)) {
                        $dataUpdate = ['is_crawler' => 1, 'thumbnail' => "/{$path}", 'position' => $k];
                    } else {
                        $dataUpdate = ['is_crawler' => 2, 'position' => $k];
                    }
                    DB::table('st_post_images')->where('id', $item->id)->update($dataUpdate);
                    echo "\n Done {$item->id} {$path}";
                }

                echo "\n Done  Post_id {$post_id}";
            }
        }
    }
    // php artisan crawler:data --function=deleteImage
    public function deleteImage()
    {
        $datas = DB::table('st_post_images')->join('st_post', 'st_post_images.post_id', '=', 'st_post.id')->select(['st_post_images.*', 'st_post.slug'])->where('is_crawler', 0)->where('st_post.is_status', 0)->get();
        foreach ($datas->groupBy('post_id')->toArray() as $post_id => $data) {
            echo "\n start {$post_id}";
            if (count($data) < 20) continue;
            foreach (array_values($data) as $k => $item) {
                if ($k > 20) {
                    Media::where('id', $item->id)->delete();
                    echo "\n ================ Done {$post_id} {$item->id}";
                }
            }
        }
    }

    // php artisan crawler:data --function=deleteImageNotExist
    public function deleteImageNotExist()
    {
        for ($i = 1; $i < 1000; $i++) {
            $data = DB::table('st_post_images')->orderBy('id', 'asc')->limit(1000)->offset(($i - 1) * 1000)->get();
            foreach ($data as $item) {
                $thumbnail = str_replace(['storage', '//'], '', trim($item->thumbnail, '/'));
                if (Storage::disk('public')->exists($thumbnail)) continue;
                DB::table('st_post_images')->where('id', $item->id)->delete();
                echo "\n ================ DeleteSuccess {$item->id}";
            }
            echo "\n ================ Done {$i}";
        }
    }
    // php artisan crawler:data --function=crawler_images_comment
    public function crawler_images_comment()
    {
        $data = DB::table('st_comment')->get();
        foreach ($data as $item) {
            $fullname = str_replace('Photo of', '', $item->fullname);
            DB::table('st_comment')->where('id', $item->id)->update([
                'fullname' => $fullname
            ]);

            // $thumb = $item->thumbnail;
            // $path = saveImageUrlStorage($thumb, "photos/comments",   "user-{$item->id}.jpg");
            // DB::table('st_comment')->where('id', $item->id)->update([
            //     'is_download_thumb' => 1,
            //     'thumbnail' => "/{$path}"
            // ]);
            echo "\n Done {$item->id}";
        }
    }

    // php artisan crawler:data --function=yelp
    public function yelp()
    {
        $service = \App::make(CrawlersYelp::class);
        $service->index();
    }
    public function convertThumbnail()
    {
        $dataPost = Post::all();
        foreach ($dataPost as $item) {
            $thumbnail = str_replace(['storage', '//'], '/', $item->thumbnail);
            if (Storage::disk('public')->exists(trim($thumbnail, '/'))) {
                echo "\nExisting {$item->id}";
                continue;
            }
            ModelsCrawler::where('relate_id', $item->id)->update(['is_status' => 0]);
            echo "\n ==== Not Existing {$item->id}";
        }
    }
}


// UPDATE crawler_map cm
// LEFT JOIN (
//     SELECT crawler_id, COUNT(*) total
//     FROM st_post_images
//     WHERE type = 'photo'
//     GROUP BY crawler_id
// ) img ON img.crawler_id = cm.id
// SET cm.is_status = 0
// WHERE img.total < 10
//    OR img.total IS NULL;

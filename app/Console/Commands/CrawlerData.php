<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Services\Crawlers;
use App\Services\CrawlersRestaurants;
use App\Services\CrawlersYelp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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

    public function category()
    {
        $url = $this->option('url') ?? '';
        $page = $this->option('page') ?? 1;
        $crawler = new CrawlersRestaurants();
        $crawler->index($url, $page);
        return "Done All";
    }

    // php artisan crawler:data --function=crawler_images
    public function crawler_images()
    {
        $datas = DB::table('st_post_images')->join('st_post', 'st_post_images.post_id', '=', 'st_post.id')
            ->select(['st_post_images.*', 'st_post.slug'])
            ->where('st_post_images.is_crawler', 0)->whereNotNull('st_post_images.crawler_href')->get();

        foreach ($datas->groupBy('post_id')->toArray() as $post_id => $data) {
            foreach (array_values($data) as $k => $item) {
                $thumb = $item->crawler_href;
                if (!empty($thumb)) {
                    $path = saveImageUrlStorage($thumb, "photos/nails/{$item->slug}", "{$item->slug}-{$item->type}-{$k}.jpg");
                    DB::table('st_post_images')->where('id', $item->id)->update([
                        'is_crawler' => 1,
                        'thumbnail' => "/{$path}",
                        'position' => $k,
                    ]);
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
   
}

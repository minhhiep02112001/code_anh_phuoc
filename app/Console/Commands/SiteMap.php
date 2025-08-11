<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use App\Services\CustomerSitemapGenerator;
use App\Services\CustomSitemapIndex;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Sitemap as ST;
use Spatie\Sitemap\Tags\Url;

class SiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create {--function=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    // php artisan sitemap:create --function=category
    public function handle()
    {
        $function = $this->option('function');
        $this->$function();
    }

    public function render()
    {
        $this->sitemapStoryNewRss();
    }
    // php artisan sitemap:create --function=sitemap
    public function sitemap()
    {
        $sitemap = CustomSitemapIndex::create();
        // $sitemap->add(ST::create('sitemap_news.xml')->setLastModificationDate(Carbon::yesterday()));
        
        foreach (glob(public_path() . '/sitemap_brand*') as $filename) {
            $url = str_replace(public_path(), '', $filename);
            $sitemap->add(ST::create($url)->setLastModificationDate(Carbon::yesterday()));
        }
        foreach (glob(public_path() . '/sitemap_page*') as $filename) {
            $url = str_replace(public_path(), '', $filename);
            $sitemap->add(ST::create($url)->setLastModificationDate(Carbon::yesterday()));
        }
        $arr = [];
        foreach ($arr as $key => $filename) {
            $url = str_replace(public_path(), '', $filename);
            $sitemap->add(ST::create($url)->setLastModificationDate(Carbon::yesterday()));
        }
        $sitemap->writeToFile(public_path('sitemap.xml'));
        echo "\nrun sitemap";
    }

    public function sitemapCategory()
    {
        $sitemap = CustomerSitemapGenerator::create('/')->getSitemap();
        $categoryModel = App::make(Category::class);
        $categories = $categoryModel->where([
            'is_status' => 1,
        ])->select(['id', 'title', 'slug', 'updated_at'])->orderBy('created_at', 'desc')->get();

        foreach ($categories as $key => $data) {
            $sitemap->add(Url::create(route('category', ['slug' => $data->slug, 'id' => $data->id]))
                ->setLastModificationDate($data->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.9));
        }
        $sitemap->writeToFile(public_path('sitemap_category.xml'));
        Log::info("Vừa chạy sitemap_category: " . now()->format('H:i:s d-m-Y'));
        return true;
    } 

    // php artisan sitemap:create --function=sitemapPage
    public function sitemapPage()
    {
        $sitemap = SitemapGenerator::create('/')->getSitemap();
        $sitemap->add(Url::create('/')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
            ->setPriority(1.0));

        $categories = Page::where([
            'is_status' => 1,
        ])->select(['id', 'title', 'slug', 'updated_at'])->orderBy('created_at', 'desc')->get();


        $posts = Post::where([
            'is_status' => 1,
            'type' => 'top_list'
        ])->select(['id', 'title', 'slug', 'publish_at', 'updated_at'])->orderBy('publish_at', 'desc')->get();

 
        foreach ($categories as $key => $data) {
            $sitemap->add(Url::create(route('page', ['slug' => $data->slug]))
                ->setLastModificationDate($data->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8));
        }
        foreach ($posts as $post) {
            $time = Carbon::parse($post->publish_at);
            $sitemap->add(Url::create(route('post', ['slug' => $post->slug]))
                ->setLastModificationDate($time)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.8));
        }

        $sitemap->writeToFile(public_path('sitemap_page.xml'));
        echo "\nRun sitemapPage";
    }

    // php artisan sitemap:create --function=sitemapPost
    public function sitemapPost()
    {
        $posts = Post::where([
            'is_status' => 1,
            'type' => 'brand'
        ])->select(['id', 'title', 'slug', 'publish_at', 'updated_at'])->orderBy('publish_at', 'desc')->get();

        foreach (glob(public_path() . '/sitemap_brand*') as $filename) {
            if (File::exists($filename)) {
                unlink($filename);
            }
        }

        foreach ($posts->chunk(300) as $key => $data) {
          
            $sitemap = SitemapGenerator::create('/')->getSitemap();
            // add home pages mặc định
            foreach ($data as $post) {
                $time = Carbon::parse($post->publish_at);
                $sitemap->add(Url::create(route('post', ['slug' => $post->slug]))
                    ->setLastModificationDate( $time)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setPriority(0.8));
            }
            if (!empty($data)) {
                $path = ($key == 0) ? 'sitemap_brand.xml' : "sitemap_brand_$key.xml";
                $file = public_path($path);
                if (File::exists($file)) {
                    chmod($file, 0777);
                }
                $sitemap->writeToFile($file);
            }
            // lưu file và phân quyền

        }
        Log::info("Vừa chạy sitemapStory : " . now()->format('H:i:s d-m-Y'));
        return;
    }

    public function genderMenu()
    {
        $category = Category::all();
        foreach ($category as $key => $value) {

            //            $story_count = $value->story()->where('st_story.is_status', 1)->count();
            //
            //            if ($story_count > 10) {
            $url = route('category', ['slug' => $value->slug, 'id' => $value->id]);
            Menu::firstOrCreate([
                'title' => $value->title,
            ], [
                'title' => $value->title,
                'link' => $url,
                'location_id' => 0,
                'parent_id' => 0
            ]);
            //            }
            //
            //            if ($story_count <= 10) {
            //                $value->is_status = 0;
            //                $value->save();
            //            }
        }
    }

    public function renderStoryToCategory()
    { // thêm random bài viết vào danh mục
        $category = Category::all();
        foreach ($category as $cate) {
            $story_id_exists = $cate->story()->where('st_story.is_status', 1)->select('st_story.id')->get()->pluck('id')->toArray();
            echo "\ndone $cate->title : " . count($story_id_exists);
            // if (count($story_id_exists) > 30) {
            //     continue;
            // } else {

            //     $story_id = Story::where('is_status', 1)->select('id')->inRandomOrder()->limit(50)->get()->pluck('id')->toArray();
            //     $arr = array_diff($story_id, $story_id_exists);
            //     $cate->story()->attach($arr);
            //     echo "\ndone $cate->title";

            // }
        }
        dd("\ndone All");
    }
}

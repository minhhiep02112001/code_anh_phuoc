<?php

namespace App\Console\Commands;

use App\Models\About;
use App\Models\Category;
use App\Models\Crawler;
use App\Models\Language;
use App\Models\Media;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Str;

class ConvertData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:data {--function=}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $function = $this->option('function');
        $this->$function();
    }




    // php artisan convert:data --function=updatePost
    public function updatePost()
    {
        $datas = Crawler::where(['is_crawler' => 1, 'is_convert' => 0, 'is_status' => 1])->get();

        foreach ($datas as $data) {
            echo "\n\n Start: {$data->key_word}";
            $data->slug = \Str::slug($data->key_word);
            $post = Post::firstOrCreate(['slug' => $data->slug], ['title' => $data->key_word, 'slug' => $data->slug]);
            if (!empty($post->is_status)) continue;
             
            $data_update = [
                'is_thumbnail' => 1,
                'theme' => 'theme_1'
            ];

            $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));

            if ((empty($thumnail_post) || !Storage::disk('public')->exists($thumnail_post)) && !empty($data->thumbnail)) { // download_image
                $data_update['thumbnail'] = saveImageUrlStorage($data->thumbnail, "photos/restaurants/{$post->slug}",   "thumbnail.jpg");
                $thumnail_post = str_replace(['storage', '//'], '', trim($data_update['thumbnail'], '/'));
            }

            if (Storage::disk('public')->exists($thumnail_post))  $data_update['is_thumbnail'] = 0;

            $thumbs = Media::where('post_id', $post->id)->orderBy('id', 'asc')->get();

            if ($thumbs->isEmpty()) {
                $images = DB::table('datacenter.st_images')->where('crawler_id', $data->id)->get();
                $menus = collect($images)->where('type', 'menu')->take(10);
                $_images = collect($images)->where('type', 'photo')->take(15);
                $images = collect($menus)->merge($_images);
                $data_insert = collect($images)->map(function ($item) use ($post) {
                    return [
                        'thumbnail' => $item->thumbnail,
                        'crawler_href' => $item->crawler_href,
                        'post_id'   => $post->id,
                        'position'  => $item->position ?? 0,
                        'type'      => $item->type ?? 'photo',
                    ];
                })->toArray();

                if (!empty($data_insert)) {
                    Media::insert($data_insert);
                    $thumbs = Media::where('post_id', $post->id)->orderBy('id', 'asc')->get();
                    echo "\n Insert " . $thumbs->count() . " thumb";
                }
            }

            $abouts = About::where('relate_id', $post->id)->orderBy('id', 'asc')->get();

            if ($abouts->isEmpty()) {
                $dataAbout = DB::table('datacenter.about')->where('crawler_id', $data->id)->get();
                if ($dataAbout->isNotEmpty()) {
                    foreach (collect($dataAbout)->where('parent_id', 0) as $val) {
                        $children = collect($dataAbout)->where('parent_id', $val->id)->values()->toArray();
                        $aboutId = About::insertGetId([
                            'title' => $val->title,
                            'slug' => $val->slug,
                            'crawler_id' => $val->crawler_id,
                            'parent_id' => 0,
                            'relate_id' => $post->id
                        ]);
                        if (!empty($children)) {
                            $dataInsertAbout = array_map(function ($i)  use ($aboutId, $post) {
                                return [
                                    'title' => $i->title,
                                    'slug' => $i->slug,
                                    'crawler_id' => $i->crawler_id,
                                    'parent_id' => $aboutId,
                                    'relate_id' => $post->id
                                ];
                            }, $children);
                            About::insert($dataInsertAbout);
                        }
                    }
                    echo "\n Insert " . $dataAbout->count() . " about";
                }
            }

            $products = Product::where('relate_id', $post->id)->orderBy('id', 'asc')->get();

            if ($products->isEmpty()) {
                $dataProd = DB::table('datacenter.st_product')->where('crawler_id', $data->id)->get();
                if ($dataProd->isNotEmpty()) {
                    foreach (collect($dataProd)->where('parent_id', 0) as $val) {
                        $children = collect($dataProd)->where('parent_id', $val->id)->values()->toArray();

                        $proId = Product::insertGetId([
                            'title' => $val->title,
                            'slug' => $val->slug,
                            'crawler_id' => $val->crawler_id,
                            'price' => $val->price,
                            'parent_id' => 0,
                            'relate_id' => $post->id
                        ]);
                        if (!empty($children)) {
                            $dataProduct = array_map(function ($i) use ($proId, $post) {
                                return [
                                    'title' => $i->title,
                                    'slug' => $i->slug,
                                    'crawler_id' => $i->crawler_id,
                                    'price' => $i->price,
                                    'parent_id' => $proId,
                                    'relate_id' => $post->id
                                ];
                            }, $children);
                            Product::insert($dataProduct);
                        }
                    }
                    echo "\n Insert " . $dataProd->count() . " product";
                }
            }
            if ($thumbs->isNotEmpty()) {
                if ($thumbs->where('type', 'banner')->count() == 0) {
                    $arrs = $thumbs->whereIn('type', ['photo', 'menu'])->take(3)->pluck('id')->toArray();
                    Media::whereIn('id',  $arrs)->update(['type' => 'banner']);
                }
            }

            if (!empty($data->time_open)) {
                $data_update['time_open']  = convertTimeOpen($data->time_open);
            }

            if (!empty($data->address)) {
                $_address = str_replace(['Address:', '\u{A0}', ':'], '', $data->address);
                $data_update['address'] = trim(str_replace('  ', ' ', $_address));
            }

            if (!empty($data->google_review)) {
                $data_update['review_google'] = trim(str_replace(['avis Google', ' ', '\u{A0}',], '', $data->google_review));
                $data_update['review_google'] = (int) $data_update['review_google'];
            }

            if (!empty($data->phone)) {
                $data_update['phone'] = str_replace(['Phone: ', ':', '\u{A0}',], '', $data->phone);
                $data_update['phone'] = trim(str_replace('  ', ' ', $data_update['phone']));
            }

            if (!empty($data->link_google_map)) {
                $data_update['link_map'] =  $data->link_google_map;
            }

            if (!empty($data->iframe_map)) {
                $data_update['iframe_map'] =  $data->iframe_map;
            }


            if (!empty($data_update)) {
                //     //     // $data_update['is_status'] = 0;
                DB::table('st_post')->where('id', $post->id)->update($data_update);
                Crawler::where('id', $data->id)->update(['relate_id' => $post->id, 'is_convert' => 1]);
                //     // echo "\n Done {$post->id} status {$post->is_status}";
                echo "\n Done {$post->id} status {$post->is_status}";
            }
        }
        die("Done All");
    }

    public function public_data()
    {
        $post = Post::where('is_status', 0)->limit(5)->get();
        foreach ($post as $item) {
            $item->publish_at = date('Y-m-d H:i:s');
            $item->is_status = 1;
            $arr_theme = ['theme', 'theme_1', 'theme_2'];
            $index = array_rand($arr_theme);
            $item->theme = $arr_theme[$index];
            $item->save();
            echo "\n public {$item->id}";
        }
    }

    public function getRandomTheme()
    {
        $arr = config('theme_colors.colors');
        // Kiểm tra xem mảng có phần tử hay không
        if (empty($arr)) {
            return []; // Trả về null nếu mảng rỗng
        }

        // Lấy ngẫu nhiên một phần tử trong mảng
        return $arr[array_rand($arr)];
    }

    // php artisan convert:data --function=asyncDataCrawler

}

<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
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

        $datas = DB::table('crawler_map')->where([
            'is_crawler' => 1,
            'is_status' => 2
        ])->get();

        foreach ($datas as $data) {
            $post = Post::firstOrCreate(['slug' => $data->slug], ['title' => $data->key_word, 'slug' => $data->slug]);

            $data_update = [];


            $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));
            if ((empty($thumnail_post) || !Storage::exists($thumnail_post)) && !empty($data->thumbnail)) { // download_image
                $data_update['thumbnail'] = saveImageUrlStorage($data->thumbnail, "photos/nails/{$post->slug}",   "thumbnail.jpg");
            }
             
            $thumbs = DB::table('st_post_images')->where('post_id', $post->id)->orderBy('id', 'asc')->get();

            if ($thumbs->isNotEmpty()) {
                if ($thumbs->where('type', 'banner')->count() == 0) {
                    $arrs = $thumbs->where('type', 'photo')->take(3)->pluck('id')->toArray();
                    DB::table('st_post_images')->whereIn('id',  $arrs)->update(['type' => 'banner']);
                }
            }

            $image_block_1 = str_replace(['storage', '//'], '', trim($post->image_block_1 ?? '', '/'));
            
            if ((empty($image_block_1) || !Storage::exists($post->image_block_1))) { // download_image
                $first =  DB::table('st_post_images')->where([
                    'post_id' => $post->id,
                    'type' => 'photo'
                ])->first();
                $data_update['image_block_1'] = $first->thumbnail ?? '';
                if (!empty($first)) { 
                    DB::table('st_post_images')->whereIn('id',  $first->id)->update(['type' => 'block']);
                }
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
                // $data_update['is_status'] = 0;
                DB::table('st_post')->where('id', $post->id)->update($data_update);
                DB::table('crawler_map')->where('id', $data->id)->update(['relate_id' => $post->id]);
                DB::table('st_post_images')->where('crawler_id', $data->id)->update(['post_id' => $post->id]);
                echo "\n Done $post->id";
            }
        }
        die("Done All");
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
    // php artisan convert:data --function=convert_data_crawler
    public function convert_data_crawler()
    {
        // is_convert = 0 (chưa cào)|  is_convert = 1 (cần convert)| is_convert = 2 (hoàn thànnh)| 
        $datas = DB::table('crawler_map')
            ->join('st_post', 'crawler_map.relate_id', '=', 'st_post.id')
            ->orderBy('st_post.id', 'asc')
            ->select(['crawler_map.*'])
            ->get();

        if (!empty($datas)) {
            foreach ($datas as $item) {
                $data = collect($item)->only(['google_review', 'email', 'phone', 'time_open', 'address', 'link_google_map', 'iframe_map'])->filter()->toArray();
                $post = DB::table('st_post')->find($item->relate_id);
                $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));
                if ((empty($thumnail_post) || !Storage::exists($thumnail_post)) && !empty($item->thumbnail)) { // download_image
                    $data['thumbnail'] = saveImageUrlStorage($item->thumbnail, "photos/restaurants/{$item->slug}",   "thumbnail.jpg");
                }
                $thumbs = DB::table('st_post_images')->where('post_id', $item->relate_id)->orderBy('id', 'asc')->get();


                if ($thumbs->isNotEmpty()) {
                    if ($thumbs->where('type', 'banner')->count() == 0) {
                        for ($i = 0; $i < 3; $i++) {
                            $item_img = $thumbs->shift();
                            if (!empty($item_img)) {
                                DB::table('st_post_images')->where('id', $item_img->id)->update(['type' => 'banner']);
                            }
                        }
                    }
                }

                if (empty($post->config_color)) {
                    $color = $this->getRandomTheme();
                    $style = "<style>";
                    if (!empty($color)) {
                        $style .= 'body {background-color:' . $color['background'] . '!important}';
                        $style .= '#primary-menu, header#navbar-spy, .footer--copyright.text-center {background-color:' . $color['menu'] . '!important}';
                        // $style .= "body \{color:{$color['text']}\} ";
                    }
                    $style .= "</style>";
                    $data['config_color'] = $style;
                }

                if (!empty($post->meta_title)) {
                    $meta_description = env('META_DES');
                    $data['meta_description'] = str_replace('[text]',   $post->meta_title, $meta_description);
                }

                if (!empty($data['address'])) {
                    $data['address'] = str_replace(['Adresse', '\u{A0}', ':'], '', $data['address']);
                    $data['address'] = trim(str_replace('  ', ' ', $data['address']));
                }

                if (!empty($data['google_review'])) {
                    $data['google_review'] = trim(str_replace(['avis Google', ' ', '\u{A0}',], '', $data['google_review']));
                    $data['review_google'] = (int) $data['google_review'];
                    unset($data['google_review']);
                }
                if (!empty($data['phone'])) {
                    $data['phone'] = str_replace(['Numéro de téléphone', ':', 'Phone', '\u{A0}',], '', $data['phone']);
                    $data['phone'] = trim(str_replace('  ', ' ', $data['phone']));
                }

                if (!empty($data['link_google_map'])) {
                    $data['link_map'] =  $data['link_google_map'];
                    unset($data['link_google_map']);
                }

                if (!empty($item->relate_id) && !empty($data)) {
                    DB::table('st_post')->where('id', $item->relate_id)->update($data);
                    DB::table('crawler_map')->where('id', $item->id)->update(['is_convert' => 2]);
                }
                echo "\n Done crawler {$item->id} -> post: {$item->relate_id}\n";
            }
        }
    }

    // php artisan convert:data --function=convertPost
    public function convertPost()
    {
        # Creating an array from the provided keywords
        $posts = Post::where([
            'is_crawler_content' => 1,
        ])->whereIn('is_status', [0, 1, 3])->get();
        foreach ($posts as $post) {
            $meta_title_arr = explode(':', $post->meta_title);
            $meta_title = trim(array_pop($meta_title_arr), "\n \u{200B}");
            $post->meta_title = $meta_title;

            $post->meta_description = str_replace('[text]',  $meta_title, env('META_DES'));
            // Nếu meta_title chứa dấu [ thì update status = 3
            if (strpos($meta_title, '[') !== false || empty(strlen($meta_title))) {
                $post->is_status = 3;
                $post->is_crawler_content = 0;
            }

            if (empty($post->config_color)) {
                $color = $this->getRandomTheme();
                if (!empty($color)) {
                    $style = "<style>";
                    $style .= 'body {background-color:' . $color['background'] . '!important}';
                    $style .= '#primary-menu,div#logo-centered, header#navbar-spy, .footer--copyright.text-center {background-color:' . $color['menu'] . '!important}';
                    // $style .= "body \{color:{$color['text']}\} ";
                    $style .= "</style>";
                    $post->config_color = $style;
                }
            }


            // Regex để tìm thẻ <table>
            $schema = '<script type="application/ld+json">{';
            $schema .= '"@context": "https://schema.org",';
            $schema .= '"@type": "Restaurant",';
            $schema .= ' "name": "' . $post->title . '",';
            $schema .= ' "description": "' . strip_tags($post->content_about) . '",';
            $schema .= '"address": "' . $post->address . '",';
            $schema .= ' "openingHours": "' . str_replace(['\n'], '', strip_tags($post->time_open)) . '",';
            $schema .= '"telephone": "' . $post->phone . '",';
            $schema .= ' "url": "' . route('post', $post->slug) . '",';
            $schema .= '"hasMenu": "' . route('menu', $post->slug) . '"';
            $schema .= '} </script>';
            $post->schema = $schema;
            if (!empty($post->time_open)) {
                // Regex để tìm thẻ <table>
                $pattern = '/<table.*?>.*?<\/table>/s';
                $time = $post->time_open;
                // Tìm và lấy kết quả
                if (preg_match($pattern, $post->time_open, $matches)) {
                    $time = $matches[0];
                }
                $post->time_open = $time;
            }

            $post->save();
            echo "\n Done {$meta_title} - ({$post->id})";
        }

        echo "\n Done ALL";
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            if (empty($data->slug))  $data->slug = \Str::slug($data->key_word);
            $post = Post::firstOrCreate(['slug' => $data->slug], ['title' => $data->key_word, 'slug' => $data->slug]);
           
            if (!empty($post->is_status)) continue;
            
            $data_update = [
                'is_thumb_block_1' => 1,
                'is_thumbnail' => 1
            ];
            $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));

            if ((empty($thumnail_post) || !Storage::disk('public')->exists($thumnail_post)) && !empty($data->thumbnail)) { // download_image
                $data_update['thumbnail'] = saveImageUrlStorage($data->thumbnail, "photos/nails/{$post->slug}",   "thumbnail.jpg");
                $thumnail_post = str_replace(['storage', '//'], '', trim($data_update['thumbnail'], '/'));
            }

            if (Storage::disk('public')->exists($thumnail_post))  $data_update['is_thumbnail'] = 0;

            $thumbs = Media::where('post_id', $post->id)->orderBy('id', 'asc')->get();
            if ($thumbs->isNotEmpty()) {
                if ($thumbs->where('type', 'banner')->count() == 0) {
                    $arrs = $thumbs->whereIn('type', ['photo', 'menu'])->take(3)->pluck('id')->toArray();
                    Media::whereIn('id',  $arrs)->update(['type' => 'banner']);
                }

                $imgBlock = Media::where(['post_id' => $post->id, 'type' =>  'block'])->first();
                if (empty($imgBlock)) {
                    $imgBlock = Media::where('post_id', $post->id)->whereIn('type', ['photo', 'menu'])->first();
                }
                if (!empty($imgBlock)) {
                    Media::where('id',  $imgBlock->id)->update(['type' => 'block']);
                    $data_update['image_block_1'] = $imgBlock->thumbnail ?? '';
                    $data_update['is_thumb_block_1'] = 0;
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
                //     // $data_update['is_status'] = 0;
                DB::table('st_post')->where('id', $post->id)->update($data_update);
                DB::table('crawler_map')->where('id', $data->id)->update(['relate_id' => $post->id]);
                DB::table('st_post_images')->where('crawler_id', $data->id)->update(['post_id' => $post->id]);
                // echo "\n Done {$post->id} status {$post->is_status}";
                echo "\n Done {$post->id} status {$post->is_status} | status thumb {$data_update['is_thumbnail']} | status block {$data_update['is_thumb_block_1']}";
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
}

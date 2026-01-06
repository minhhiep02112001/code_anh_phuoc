<?php

namespace App\Console\Commands;

use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Crawler;
use App\Models\Language;
use App\Models\Media;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Carbon\Carbon;
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
        $datas = Crawler::where(['is_status' => 1])->get();

        foreach ($datas as $data) {
            echo "\n\n Start: {$data->key_word}";
            $data->slug = \Str::slug($data->key_word);
            $post = Post::firstOrCreate(['slug' => $data->slug], [
                'title' => mb_convert_case($data->key_word, MB_CASE_TITLE, 'UTF-8'),
                'slug' => $data->slug
            ]);

            $data_update = [
                'is_thumbnail' => 1,
            ];

            $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));

            if ((empty($thumnail_post) || !Storage::disk('public')->exists($thumnail_post)) && !empty($data->thumbnail)) { // download_image
                $thumb = strtok($data->thumbnail, '=') . '=s1200';
                $data_update['thumbnail'] = saveImageUrlStorage($thumb, "photos/thumbnails/restaurants/{$post->slug}",   "thumbnail.jpg");
                $thumnail_post = str_replace(['storage', '//'], '', trim($data_update['thumbnail'], '/'));
            }

            if (Storage::disk('public')->exists($thumnail_post)) {
                $size = @getimagesize(Storage::disk('public')->path($thumnail_post));
                if ($size) {
                    [$w, $h] = $size;
                    $data_update['is_thumbnail'] = ($h >= $w) ? 1 : 0;
                }
            }

            // downloadFile 

            Media::where('crawler_id', $data->id)->update([
                'post_id' => $post->id
            ]);

            About::where('crawler_id', $data->id)->update([
                'relate_id' => $post->id
            ]);

            Product::where('crawler_id', $data->id)->update([
                'relate_id' => $post->id
            ]);

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
                DB::table('st_post')->where('id', $post->id)->update($data_update);
                Crawler::where('id', $data->id)->update(['relate_id' => $post->id,  'is_status' => 2]);
                echo "\n Done {$post->id} status {$post->is_status}";
            }
        }
        die("Done All");
    }

    // php artisan convert:data --function=public_data
    public function public_data()
    {
        $posts = Post::get();

        foreach ($posts as $item) {
            $item->title = mb_convert_case($item->title, MB_CASE_TITLE, 'UTF-8');
            $item->save();
            echo "\n Success {$item->id} -- {$item->title}";
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


    // php artisan convert:data --function=convertPath
    public function convertPath()
    {
        $allPost = Post::where('is_thumbnail', 1)->get();
        foreach ($allPost as $post) {
            $this->convertImageThumbnail($post->id, $post->thumbnail);
        }
    }

    // php artisan convert:data --function=convertComment
    public function convertComment()
    {
        $allComment = Comment::get();
        foreach ($allComment as $comment) {
            // random created_at từ 1 năm trước tới bây giờ
            // Timestamp ngẫu nhiên trong 1 năm gần đây
            $randomDate = Carbon::now()->addDays(
                rand(1, 365 * 24 * 60 * 60)
            );
            $comment->created_at = $randomDate;
            $comment->updated_at = $randomDate; // nên đồng bộ
            $comment->save();
            echo "\nDone {$comment->id}";
        }
    }

    public function convertImageThumbnail($postId, $thumb)
    {
        DB::table('st_post')->where('id', $postId)->update(['is_thumbnail' => 2]);
        if (empty($thumb)) return;
        // Chuẩn hoá path storage
        $thumbnail = ltrim(str_replace('storage/', '', $thumb), '/');
        $storage = Storage::disk('public');
        $width = $height = 0;
        if ($storage->exists($thumbnail)) [$width, $height] = getimagesize($storage->path($thumbnail));
        // Ảnh ngang → giữ nguyên
        if ($width > $height) return;
        // Ảnh dọc → tìm ảnh ngang lớn nhất trong media
        $medias = Media::where('post_id', $postId)->where('type', 'photo')->get();
        if ($medias->isEmpty()) return;
        foreach ($medias as $media) {
            $mediaThumbTemp = '';
            if (empty($media->thumbnail)) continue;
            $mediaThumb = ltrim(str_replace('storage/', '', $media->thumbnail), '/');
            if (!$storage->exists($mediaThumb)) {
                if (empty($media->crawler_href)) continue;
                $mediaThumbTemp = saveImageUrlStorage($media->crawler_href, dirname(ltrim(str_replace('storage/', '', $media->thumbnail), '/')), 'test-' . basename($media->thumbnail));
                $mediaThumb = ltrim(str_replace('storage/', '', $mediaThumbTemp), '/');
            }
            [$w, $h] = getimagesize($storage->path($mediaThumb));

            if ($w > $h && $w > $width && $width = $w) {
                $crawler_href = strtok($media->crawler_href, '=') . '=s1200';
                saveImageUrlStorage($crawler_href, dirname(ltrim(str_replace('storage/', '', $thumb), '/')), basename($thumb));
                DB::table('st_post')->where('id', $postId)->update(['is_thumbnail' => 0]);
                echo "\n Done {$media->id} $crawler_href";
            }
            if (!empty($mediaThumbTemp)) $storage->delete(ltrim(str_replace('storage/', '', $mediaThumbTemp), '/'));
        }
        return;
    }


    // php artisan convert:data --function=generateContent
    public function generateContent()
    {
        DB::table('st_post')->where('is_crawler_content', 2)->limit(10)->get()->each(function ($post) {
            $promat = $post->promat_content ?? convertStrPromat($post);
            $content = getContentGemini($promat);  
            if (!empty($content)) {
                DB::table('st_post')->where('id', $post->id)->update([
                    'content' => $content,
                    'is_crawler_content' => 1
                ]);
            } else {
                DB::table('st_post')->where('id', $post->id)->update([
                    'is_crawler_content' => 4
                ]);
            }
            echo "\n Done {$post->id}";
        });
    }
}

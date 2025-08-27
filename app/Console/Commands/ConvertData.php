<?php

namespace App\Console\Commands;

use App\Models\About;
use App\Models\Crawler;
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
    protected $signature = 'convert:data {--function=} {--status=}';
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




    public function updatePost()
    {
        $datas = Crawler::where([
            'domain' => env('APP_URL'),
            'is_crawler' => 1,
            'is_status' => 1,
            'is_convert' => 0
        ])->get();

        foreach ($datas as $data) {
            try { 
                $data->slug = \Str::slug($data->key_word);
                $post = Post::firstOrCreate(['slug' => $data->slug], ['title' => $data->key_word, 'slug' => $data->slug]);
                if (!empty($post->is_status)) continue;
                echo "\n Start " . $data->key_word;

                $data_update = [
                    'is_thumbnail' => 1,
                    'slug' => $data->slug,
                ];

                $thumnail_post = str_replace(['storage', '//'], '', trim($post->thumbnail ?? '', '/'));

                if ((empty($thumnail_post) || !Storage::disk('public')->exists($thumnail_post)) && !empty($data->thumbnail)) { // download_image
                    $data_update['thumbnail'] = saveImageUrlStorage($data->thumbnail, "photos/nails/{$post->slug}",   "thumbnail.jpg");
                    $thumnail_post = str_replace(['storage', '//'], '', trim($data_update['thumbnail'], '/'));
                }

                if (Storage::disk('public')->exists($thumnail_post))  $data_update['is_thumbnail'] = 0;

                $thumbs = Media::where('post_id', $post->id)->orderBy('id', 'asc')->get();

                if ($thumbs->isEmpty()) {
                    $images = DB::table('datacenter.st_images')->where('crawler_id', $data->id)->get();

                    $data_insert = collect($images)->take(20)->map(function ($item) use ($post) {
                        return [
                            'thumbnail' => $item->thumbnail,
                            'crawler_href' => $item->crawler_href,
                            'post_id'   => $post->id,
                            'position'  => $item->position ?? 0,
                            'type'      => 'photo',
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
                    Crawler::where('id', $data->id)->update(['relate_id' => $post->id, 'is_convert' => 1]);
                    // echo "\n Done {$post->id} status {$post->is_status}";
                }
                echo "\n Done {$post->id} ============";
            } catch (\Exception $ex) {
                echo "\n Error {$data['title']}";
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

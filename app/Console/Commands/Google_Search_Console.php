<?php

namespace App\Console\Commands;

use App\Models\Chapter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Google_Search_Console extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google_search:index {--function=}';

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

    public function handle()
    {
        $function = $this->option('function');
        $this->$function();
    }

    public function index_google()
    {
        $client_config = [
            app_path('/Google/key_1.json'),
            app_path('/Google/key_2.json'),
            app_path('/Google/key_3.json'),
            app_path('/Google/key_4.json'),
            app_path('/Google/key_5.json'),
            app_path('/Google/key_6.json'),
            app_path('/Google/key_7.json'),
            app_path('/Google/key_8.json'),
            app_path('/Google/key_9.json'),
            app_path('/Google/key_10.json'),
            app_path('/Google/hiep_cm.json'),
            app_path('/Google/cmh02112001.json'),
            app_path('/Google/service_mh0211.json'),
            app_path('/Google/service_account.json'),
            app_path('/Google/service_cmh02112001.json'),
            app_path('/Google/service_cmh0394.json'),
        ];

        $count = 3200;
        $categories = DB::table('st_category')->where(['is_status' => 1, 'index_google' => 0])->limit(200)->offset(0)->get();
        $storys = DB::table('st_story')->where(['is_status' => 1, 'index_google' => 0])->limit(200)->offset(0)->get();

        $count_limit = $count - $categories->count() - $storys->count();

        $chapters = DB::select("SELECT st_chapter.id , st_chapter.story_id, st_story.slug , st_chapter.chapter FROM st_chapter LEFT JOIN st_story on st_chapter.story_id = st_story.id WHERE st_chapter.index_google = 0 AND st_story.is_status = 1 order by st_chapter.id ASC LIMIT {$count_limit} OFFSET 0;");
        $data = [];
        $stt = 0;
        foreach ($categories as $value) {
            $data[] = [
                'url' => route('category', ['slug' => $value->slug, 'id' => $value->id]),
                'table' => 'st_category',
                'id' => $value->id,
            ];
        }
        foreach ($storys as $value) {
            $data[] = [
                'url' => route('story', ['slug' => $value->slug, 'id' => $value->id]),
                'table' => 'st_story',
                'id' => $value->id,
            ];
        }

        foreach ($chapters as $value) {
            $data[] = [
                'url' => route('chapter', ['slug' => $value->slug, 'chap' => $value->chapter]),
                'table' => 'st_chapter',
                'id' => $value->id,
            ];
        }

        try {
            foreach (array_chunk($data, 200) as $key => $values) {
                if (!empty($client_config[$key])) {
                    $client = new \Google_Client();
                    $client->setAuthConfig($client_config[$key]);
                    $client->addScope('https://www.googleapis.com/auth/indexing');
                    $httpClient = $client->authorize();
                    $endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';
                    foreach ($values as $item) {
                        sleep(2);
                        $arr = ['url' => $item['url'], 'type' => 'URL_UPDATED'];
                        $response = $httpClient->post($endpoint, ['body' => json_encode($arr)]);
                        $status_code = $response->getStatusCode();
                        if ($status_code == 200) {
                            $stt++;
                            DB::table($item['table'])->where('id', $item['id'])->update(['index_google' => 1]);
                            Log::info("Link: {$item['url']} index google status {$status_code}");
                        } else {
                            Log::error("Link: {$item['url']} index google status {$status_code}");
                        }
                        echo "\nLinks {$item['url']}: $status_code";
                    }
                }
            }
        } catch (\Exception$ex) {
            Log::error("Mau sửa lỗi ép index google nhanh nhanh .......");
            return;
        }
        Log::info("Ép google index ($stt) link : " . now()->format('d-m-Y'));
        return Command::SUCCESS;
    }

    public function index_bing()
    {
        $count = 500;
        $categories = DB::table('st_category')->where(['is_status' => 1, 'index_bing' => 0])->limit(200)->offset(0)->get();
        $storys = DB::table('st_story')->where(['is_status' => 1, 'index_bing' => 0])->limit(200)->offset(0)->get();

        $count_limit = $count - $categories->count() - $storys->count();

        $chapters = DB::select("SELECT st_chapter.id , st_chapter.story_id, st_story.slug , st_chapter.chapter FROM st_chapter LEFT JOIN st_story on st_chapter.story_id = st_story.id WHERE st_chapter.index_bing = 0 AND st_story.is_status = 1 order by st_chapter.id ASC LIMIT {$count_limit} OFFSET 0;");

        $category_id = collect($categories ?? [])->pluck('id')->toArray();
        $storys_id = collect($storys ?? [])->pluck('id')->toArray();
        $chapter_id = collect($chapters ?? [])->pluck('id')->toArray();
        $url = [];

        foreach ($categories as $value) {
            $url[] = route('category', ['slug' => $value->slug, 'id' => $value->id]);
        }
        foreach ($storys as $value) {
            $url[] = route('story', ['slug' => $value->slug, 'id' => $value->id]);
        }

        foreach ($chapters as $value) {
            $url[] = route('chapter', ['slug' => $value->slug, 'chap' => $value->chapter]);
        }

        try {
            $data = [
                "host" => "https://9manhwa.net/",
                "key" => "b487510b1788491cb18d819969829b88",
                "keyLocation" => "https://www.9manhwa.net/b487510b1788491cb18d819969829b88.txt",
                "urlList" => $url,
            ];

            $respon = Http::withHeaders([
                'Content-Type' => 'application/json',
                'charset' => 'utf-8',
            ])->post('https://www.bing.com/indexnow', $data);
            echo "\nBing index: " . $respon->status() . "\n";

            if ($respon->status() == 200) {
                try {
                    DB::beginTransaction();
                    if (!empty($category_id)) {
                        DB::table('st_category')->whereIn('id', array_values($category_id))->update(['index_bing' => 1]);
                    }
                    if (!empty($storys_id)) {
                        DB::table('st_story')->whereIn('id', array_values($storys_id))->update(['index_bing' => 1]);
                    }
                    if (!empty($chapter_id)) {
                        DB::table('st_chapter')->whereIn('id', array_values($chapter_id))->update(['index_bing' => 1]);
                    }
                    DB::commit();
                } catch (\Exception$ex) {
                    DB::rollBack();
                    Log::error("Mau sửa lỗi ép bing nhanh nhanh update database false.......");
                    return;
                }
                Log::info("Ép bing index ($count) link : " . now()->format('d-m-Y'));
                return;
            }
        } catch (\Exception$ex) {
            Log::error("Mau sửa lỗi ép bing nhanh nhanh update database false.......");
            return;
        }
    }
}

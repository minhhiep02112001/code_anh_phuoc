<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CrawlersGameskite
{
    public function index()
    {
        $data = File::get(public_path('gameskite.json'));
        $datas = json_decode($data, true);
        $datas = $datas['data'] ?? [];

        foreach ($datas as $key => $item) {
            try {

                $name = $item['Name'] ?? '';
                $iframe = Str::replace('/game/', '/play/', $item['English']);
                $thumb = !empty($item['Image Links']) ? $item['Image Links'] : '';
                $categories = $item['Category'] ?? '';
                $tags = $item['Orientation'] ?? ''; 

                $slug = Str::slug($name) ?? '';
                $post = Post::where('slug', '=', $slug)->first();

                if (!empty($post)) {
                    if (empty($post->thumbnail) || !file_exists(public_path($post->thumbnail))) {
                        $thumb = !empty($thumb) ? saveImageUrlStorage($thumb, "thumbnail", Str::slug($name) . ".jpg") : '';
                        $post->thumbnail = $thumb;
                        $post->save();
                    }
                    $this->handle_category([$categories], $post->id);
                    $this->handle_tag([$tags], $post->id);
                    echo "Warning: {$name} exists !!!\n";
                    continue;
                } else {
                    $post = Post::create([
                        'title' => $name,
                        'viewed' => rand(1, 10000),
                        'played' => rand(1, 1000),
                        'total_vote' => rand(1, 1000),
                        'avg_vote' => rand(1, 5),
                        'is_status' => 3,
                        'slug' => Str::slug($name) ?? '',
                        'description' => $name,
                        'supplier' => 'gameskite.com',
                        'technology' => $data['technology'] ?? 'HTML5',
                        'meta_description' => $name,
                        'meta_title' => $name,
                        'meta_keyword' => $name,
                        'iframe' => $iframe,
                        'thumbnail' => !empty($thumb) ? saveImageUrlStorage($thumb, "thumbnail", Str::slug($name) . ".jpg") : '',
                        'crawler_href' => $item['English']
                    ]);
                    $this->handle_category([$categories], $post->id);
                    $this->handle_tag([$tags], $post->id);
                    echo "Success : {$name} {$key}\n";
                }
            } catch (\Exception $ex) {
                echo "Error: {$name} !!!\n";
                continue;
            }
        }
        dd("done All");
    }

    function handle_category($datas, $post_id)
    {
        foreach ($datas as $data) {
            if (empty($data)) continue;
            $slug = Str::slug($data);
            $category = Category::firstOrCreate([
                'slug' => $slug,
            ], [
                'title' => $data,
                'slug' => $slug,
                'crawler_href' => $slug,
            ]);

            if (!$category->posts->contains('id', $post_id)) {
                $category->posts()->attach($post_id);
            }
        }
    }

    function handle_tag($datas, $post_id)
    {

        foreach ($datas as $item) {
            if (empty($item)) continue;
            $slug = Str::slug($item);
            $tag = Tags::firstOrCreate([
                'slug' => $slug,
            ], [
                'title' => Str::ucfirst($item),
                'slug' => $slug,
                'crawler_href' => $slug,
                'type' => 'gamedistribution.com'
            ]);
            if (!$tag->posts->contains('id', $post_id)) {
                $tag->posts()->attach($post_id);
            }
        }
    }
}

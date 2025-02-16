<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Country;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tags;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class Crawlers
{
    public function index()
    {
        $this->crawler_country();
        // $this->crawler_category_post('https://restaurantguru.com/Aix-en-Provence');
        // $this->crawler_post('https://restaurantguru.com/Yves-Restaurant-Aix-en-Provence-2');
        //        $this->curl_category_detail('https://samyenhoangminh.com/danh-muc-san-pham/an-cung-nguu/');
        //        $this->curl_detail_product('https://samyenhoangminh.com/san-pham/an-cung-nguu-han-quoc-vu-hoang-thanh-tam/');

    }

    
    public function crawler_country(){
        $countrys = Country::all();
        if (!empty($countrys)) { 
            foreach ($countrys as $k => $country) {
                try {
                    echo "\n===============Start {$k}: {$country['title']} !!!\n"; 
                    $this->crawler_category_post($country->crawler_href, 1 ,  $country->id);
                    echo "\n===============Success {$k}: {$country['title']} !!!\n";
                } catch (\Exception $ex) {
                    echo "\n===============Error: {$country['title']} !!!\n";
                    continue;
                }
            }
        } 
        echo "DONE All \n"; 
    }



    public function crawler_category_post($url, $page = 1, $country_id)
    { 
        $url_detail  = str_replace(['#restaurant-list'], '', $url);
        $url_detail = trim($url_detail, '/');
        $url_detail = "{$url_detail}/{$page}";
        $_html = $this->curl_html($url_detail);
        $crawler = new Crawler($_html);
        $urls = $crawler->filter('.restaurant_result .restaurant_row .info_header a')->each(function ($node) {
          
            $url = $node->filter('a')->attr('href'); 
            return [ 
                'url' => $url, 
            ];
        });

        dd($urls);
        
        if(!empty($urls)){
            echo "\n===== Start page {$page} {$url} !!!\n";
            foreach($urls as $url){
                $this->crawler_post($url['url'] , $country_id);
                sleep(20);
            }
            echo "\n===== DONE page {$page} {$url}\n"; 
            $page++;
            $this->crawler_category_post($url, $page , $country_id);
        } 
        echo "DONE All \n"; 
        return;
    }

    public function crawler_post($url, $country_id)
    { 
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $title = $crawler->filter('h1')->text();
            $slug = Str::slug($title) ?? '';
 
            $address = $crawler->filter('#info_location')->count() > 0 ? $crawler->filter('#info_location')->text() : '';
            $map = $crawler->filter('.info_address .direction_link')->count() > 0 ? $crawler->filter('.info_address .direction_link')->attr('href') : '';
            $book_detail = $crawler->filter('.wrapper_main_info .cuisine_hidden')->count() > 0 ? $crawler->filter('.wrapper_main_info .cuisine_hidden')->text() : '';
           
            DB::beginTransaction();

            $post = Post::updateOrCreate(
                ['slug' => $slug, 'crawler_href' => $url,],
                [
                    'title' => $title,  
                    'is_status' => 1,
                    'slug' => $slug,    
                    'country_id' => $country_id, 
                    'crawler_href' => $url,
                    'location' => $address,
                    'map' => $map,
                    'book_detail' => $book_detail,
                ]
            );
            DB::commit();
            echo "\nSuccess product: {$title} !!!";
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            echo "\nError: $url !!!";
        }
    }

    public function curl_detail_product($url, $category_id = 0)
    {

        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $title = $crawler->filter('h1')->text();
            $slug = Str::slug($title) ?? '';
            $images = $crawler->filter('.product-images .woocommerce-product-gallery__image  a')->each(function ($node, $index) use ($slug) {
                $_url = $node->attr('href');
                $image = saveImageUrlStorage($_url, 'products', "{$slug}-{$index}.jpg");
                return $image;
            });
            $thumbnail = !empty($images) ? array_shift($images) : '';

            $price_out = $crawler->filter('.product-page-price')->count() > 0 ? $crawler->filter('.product-page-price')->text() : 0;

            $price_out = (int)str_replace(['₫', ',', ' '], '', $price_out);

            $price = $crawler->filter('.price-on-sale bdi')->count() > 0 ? $crawler->filter('.price-on-sale bdi')->text() : 0;
            $price = (int)str_replace(['₫', ',', ' '], '', $price);

            $description = $crawler->filter('.product-short-description')->text();

            $content = $crawler->filter('#tab-description')->html();


            if (empty($price_out) && !empty($price)) $price_out = $price;
            if (empty($price) && !empty($price_out)) $price = $price_out;


            DB::beginTransaction();

            $product = Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'content' => $content,
                    'viewed' => rand(0, 10000),
                    'thumbnail' => $thumbnail,
                    'is_status' => 1,
                    'slug' => $slug,
                    'description' => $description,
                    'meta_title' => $title,
                    'meta_description' => $title,
                    'meta_keyword' => $title,
                    'avg_vote' => rand(1, 5),
                    'total_vote' => rand(0, 500),
                    'category_id' => $category_id,
                    'price' => $price,
                    'price_out' => $price_out,
                    'quantity' => rand(10, 10000),
                    'images' => json_encode($images),
                ]
            );
            DB::commit();
            echo "\nSuccess product: {$title} !!!";
        } catch (\Exception $ex) {
            DB::rollBack();
            echo "\nError: $url !!!";
        }
    }

    public function curl_category()
    {
        $url = 'https://samyenhoangminh.com/danh-muc-san-pham/an-cung-nguu/';
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $categorys = $crawler->filter('.product-categories > li')->each(function ($node) {
                $category = $node->filter('a')->text();
                $url = $node->filter('a')->attr('href');
                $child = $node->filter('ul li a')->each(function ($n) {
                    return ['title' => $n->text(), 'url' => $n->attr('href')];
                });
                return [
                    'title' => $category,
                    'url' => $url,
                    'childs' => $child
                ];
            });

            if (!empty($categorys)) {

                foreach ($categorys as $category) {
                    try {

                        $slug = Str::slug($category['title']) ?? '';
                        $cate = Category::firstOrCreate(
                            ['slug' => $slug],
                            ['title' => $category['title'], 'parent_id' => 0]
                        );

                        if (!empty($category['childs'])) {
                            foreach ($category['childs'] as $child) {
                                $_slug = Str::slug($child['title']) ?? '';
                                $cate = Category::firstOrCreate(
                                    ['slug' => $_slug],
                                    ['title' => $child['title'], 'parent_id' => $cate->id]
                                );
                                $this->curl_category_detail($child['url'], 1, $cate->id);
                                echo "\n===============Success: {$child['title']} !!!\n";
                            }
                        }
                        $this->curl_category_detail($category['url'], 1, $cate->id);
                        echo "\n===============Success: {$category['title']} !!!\n";
                    } catch (\Exception $ex) {

                        echo "\n===============Error: {$category['title']} !!!\n";
                        continue;
                    }
                }
            }
            echo "DONE All \n";
        } catch (\Exception $ex) {
            echo "Error page   !!! \n";
        }
    }

    public function curl_category_detail($url, $page = 1, $cate_id = 0)
    {

        $_url = trim($url, '/') . "/page/{$page}";
        try {
            $_html = $this->curl_html($_url);
            $crawler = new Crawler($_html);

            $products = $crawler->filter('.products .product-title a')->each(function ($node) {
                return ['title' => $node->text(), 'url' => $node->attr('href')];
            });

            if (empty($products)) {
                echo "\n ----- DONE all {$cate_id} ---------\n";
                return [];
            }
            if (!empty($products)) {

                foreach ($products as $product) {
                    $this->curl_detail_product($product['url'], $cate_id);
                }
            }
            echo "\n ----- DONE page {$page} {$cate_id} \n";
            $this->curl_category_detail($url, $page + 1, $cate_id);
        } catch (\Exception $ex) {
            echo "\n ----- Error page {$page} {$cate_id}Error!!! \n";
        }
    }


    public
    function curl_html($url)
    { {
            $pointer = curl_init();
            curl_setopt($pointer, CURLOPT_URL, $url);
            curl_setopt($pointer, CURLOPT_TIMEOUT, 40);
            curl_setopt($pointer, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($pointer, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.10 (KHTML, like Gecko) Chrome/8.0.552.28 Safari/534.10");
            curl_setopt($pointer, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($pointer, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($pointer, CURLOPT_HEADER, false);
            curl_setopt($pointer, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($pointer, CURLOPT_AUTOREFERER, true);

            $return_val = curl_exec($pointer);

            $http_code = curl_getinfo($pointer, CURLINFO_HTTP_CODE);
            if ($http_code == 404) {
                return false;
            }
            curl_close($pointer);
            unset($pointer);
            return $return_val;
        }
    }

    function handle_category($datas, $post_id)
    {
        foreach ($datas as $data) {
            if (empty($data)) continue;
            $category = Category::firstOrCreate([
                'slug' => $data['slug'],
            ], [
                'title' => $data['title'],
                'slug' => $data['slug'],
                'crawler_href' => $data['crawler_href'],
            ]);
            if (!$category->posts->contains('id', $post_id)) {
                $category->posts()->attach($post_id);
            }
        }
    }

    function handle_tag($datas, $post_id)
    {
        foreach ($datas as $data) {
            if (empty($data)) continue;
            $slug = Str::slug($data);
            $tag = Tags::firstOrCreate([
                'slug' => $data['slug'],
            ], [
                'title' => $data['title'],
                'slug' => $data['slug'],
                'crawler_href' => $data['crawler_href'],
            ]);
            if (!$tag->tags->contains('id', $post_id)) {
                $tag->tags()->attach($post_id);
            }
        }
    }
}

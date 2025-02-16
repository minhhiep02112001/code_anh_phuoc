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

class CrawlersRestaurants
{
    public function index($url = '', $page = 1)
    {



        $this->curl_category();

        // $this->crawler_category_post($url, $page);
        //  $this->crawler_category_post("https://restaurants-de-france.fr/59-nord/lille/",4);

        //  $this->crawler_category_post("https://restaurants-de-france.fr/59-nord/lille/",4);

        //        $this->crawler_post('https://restaurants-de-france.fr/fr/traiteur-du-theatre-paris-2144730.html');
        //        $this->curl_category_detail('https://samyenhoangminh.com/danh-muc-san-pham/an-cung-nguu/');
        //        $this->curl_detail_product('https://samyenhoangminh.com/san-pham/an-cung-nguu-han-quoc-vu-hoang-thanh-tam/');

    }


    public function getPageCrawler()
    {
        $data =  DB::table('crawler')->where([
            'domain' => 'https://carta.menu',
            'status' => 0,
        ])->limit(3000)->offset(0)->get();
        if (empty($data) && $data->count() == 0) return;
        $data_id = collect($data)->pluck('id')->toArray();
        DB::table('crawler')->whereIn('id', $data_id)->update(['status' => 2]);
        foreach ($data as $item) {
            $this->crawlerCarta($item->page, $item->id);
        }
        return;
    }


    public function crawlerCarta($page = 0, $id = 0)
    {
        $_url = "https://carta.menu/restaurants?restaurants_page={$page}&t=1730371399527";
        $_html = $this->curl_html($_url);
        $crawler = new Crawler($_html);

        $urls = $crawler->filter('.restaurants-listing-parrent .listing-title')->each(function ($node) {
            return ['url' => $node->attr('href')];
        });


        if (!empty($urls)) {
            $i = 0;
            foreach ($urls as $_url_detail) {
                $status = $this->crawlerPostCarta($_url_detail['url']);
                echo "\n===== DONE url {$_url_detail['url']}\n";
                if ($status) $i++;
            }
            DB::table('crawler')->where('id', $id)->update([
                'status' => 1,
                'crawler_href' => $_url,
                'count_success' => $i
            ]);
            echo "\n===== DONE page {$page} {$_url}\n";
        }
        echo "DONE All \n";
        return;
    }
    public function crawlerPostCarta($url)
    {
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);


            $title = $crawler->filter('h1')->text();
            $slug = Str::slug($title) ?? '';

            $address = $crawler->filter('.detail-contact-address a')->count() > 0 ? $crawler->filter('.detail-contact-address a')->text() : '';
            $phone = $crawler->filter('.detail-contact-phone a')->count() > 0 ? $crawler->filter('.detail-contact-phone a')->text() : '';
            $time_open = $crawler->filter('#open-hours')->count() > 0 ? $crawler->filter('#open-hours')->html() : '';
            $crawler_href_thumb = $crawler->filter('.detail-gallery img')->count() > 0 ? $crawler->filter('.detail-gallery img')->attr('src') : '';
            $book_detail = $crawler->filter('#restaurant-details-flex')->count() > 0 ? $crawler->filter('#restaurant-details-flex')->html() : '';

            DB::beginTransaction();
            Post::create(
                [
                    'title' => $title,
                    'is_status' => 0,
                    'slug' => $slug,
                    'crawler_href' => $url,
                    'book_detail' => $book_detail,
                    'location' => $address,
                    'map' => $map ?? '',
                    'time_open' => $time_open,
                    'phone' => $phone,
                    'crawler_href_thumb' => $crawler_href_thumb,
                ]
            );
            DB::commit();
            echo "\nSuccess product: {$title} !!!";
            return true;
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollBack();
            echo "\nError: $url !!!";
            return false;
        }
    }



    public function crawler_country()
    {
        $countrys = Country::all();
        if (!empty($countrys)) {
            foreach ($countrys as $k => $country) {
                try {
                    echo "\n===============Start {$k}: {$country['title']} !!!\n";
                    $this->crawler_category_post($country->crawler_href, 1, $country->id);
                    echo "\n===============Success {$k}: {$country['title']} !!!\n";
                } catch (\Exception $ex) {
                    echo "\n===============Error: {$country['title']} !!!\n";
                    continue;
                }
            }
        }
        echo "DONE All \n";
    }


    public function crawler_category_post($url, $page = 1)
    {
        $_url = "$url?page_no={$page}";
        $_html = $this->curl_html($_url);
        $crawler = new Crawler($_html);

        $urls = $crawler->filter('.recent-listing-box-container-item h2')->each(function ($node) {

            $__url = $node->closest('a')->attr('href');

            return [
                'url' => "https://restaurants-de-france.fr{$__url}",
            ];
        });


        if (!empty($urls)) {
            echo "\n===== Start page {$page} {$url} !!!\n";
            foreach ($urls as $_url) {
                $this->crawler_post($_url['url']);
                echo "\n===== DONE url {$_url['url']}\n";
            }
            echo "\n===== DONE page {$page} {$url}\n";
            $page++;
            sleep(1);
            $this->crawler_category_post($url, $page);
        }
        echo "DONE All \n";
        return;
    }

    public function crawler_post($url)
    {
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $count_breadcrumb = $crawler->filter('.breadcrumb-item')->count();
            DB::beginTransaction();
            if (!empty($count_breadcrumb) && $count_breadcrumb > 3) {
                $category_title = $crawler->filter('.breadcrumb-item')->eq($count_breadcrumb - 2)->text();
                $slug_category = Str::slug($category_title);
                $category = Category::firstOrCreate(
                    ['slug' => $slug_category, 'crawler_href' => "https://restaurants-de-france.fr"],
                    ['title' => $category_title, 'parent_id' => 0]
                );
            }
            $title = $crawler->filter('h1')->text();
            $slug = Str::slug($title) ?? '';

            $address = $crawler->filter('h1+p')->count() > 0 ? $crawler->filter('h1+p')->text() : '';
            $phone = $crawler->filter('#btn_num_id_1')->count() > 0 ? $crawler->filter('#btn_num_id_1')->attr('data-tel') : '';
            $time_open = $crawler->filter('table.table')->count() > 0 ? $crawler->filter('.table.table')->html() : '';

            $post = Post::updateOrCreate(
                ['slug' => $slug, 'crawler_href' => $url],
                [
                    'title' => $title,
                    'is_status' => 1,
                    'slug' => $slug,
                    'country_id' => $category->id ?? 0,
                    'crawler_href' => $url,
                    'location' => $address,
                    'map' => $map ?? '',
                    'time_open' => $time_open,
                    'phone' => $phone,
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
        $url = 'https://restaurantguru.com/cities-Iceland-c';
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $categorys = $crawler->filter('#content a')->each(function ($node) {
                return [
                    'title' => $node->text(),
                    'url' => $node->attr('href')
                ];
            });
           
            if (!empty($categorys)) {
                foreach ($categorys as $category) {
                    try {

                        $slug = Str::slug($category['title']) ?? '';
                        Category::firstOrCreate(
                            ['crawler_href' => $category['url']],
                            [
                                'title' => $category['title'],
                                'slug' => $slug,
                                'crawler_href' => $category['url'],
                                'parent_id' => 0
                            ]
                        );

                        echo "\n===============Success: {$category['title']} !!!\n";
                    } catch (\Exception $ex) {
                        dd($ex);
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

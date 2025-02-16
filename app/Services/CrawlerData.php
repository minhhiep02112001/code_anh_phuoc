<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;


class CrawlerData
{
    function index()
    {
        // $this->crawler_category('https://kojamart.com/collections/all', 1);
        $this->crawler('https://thegioihongsam.com/');
    }
    public function crawler_category($url, $page = 1)
    {
        $url_detail = "{$url}?page={$page}";
        $_html = $this->curl_html($url_detail);
        $crawler = new Crawler($_html);
        $urls = $crawler->filter('.products-view .item_product_main .product-name a')->each(function ($node) use (&$i) {
            $url = $node->filter('a')->attr('href');
            return  "https://kojamart.com{$url}";
        });


        if (!empty($urls)) {
            echo "\n===== Start page {$page} {$url} !!!\n";
            foreach ($urls as $url) {
                $this->crawler_post($url);
            }
            // echo "\n===== DONE page {$page} {$url}\n";
            $page++;
            return $this->crawler_category($url, $page);
        }
        echo "DONE All \n";
        return;
    }
    public function crawler($url)
    {
        $_html = $this->curl_html($url);
        $crawler = new Crawler($_html);
        $urls = $crawler->filter('ul.list-group-flush li a')->each(function ($node) use (&$i) {
            $link = $node->filter('a')->attr('href');
            if (strpos($link, 'collections') !== false) return 'https://thegioihongsam.com' . $link;
            return '';
        });
        $urls = array_filter($urls);

        if (!empty($urls)) {
            foreach ($urls as $url) {
                $this->crawler_category2($url);
            }
        }
        echo "DONE All \n";
        return;
    }
    public function crawler_category2($url, $page = 1)
    {
        
        $url_detail = "{$url}?page={$page}";
        $_html = $this->curl_html($url_detail);
        $crawler = new Crawler($_html);
        $urls = $crawler->filter('.category-products .product-info h3 a')->each(function ($node) use (&$i) {
            $url = $node->filter('a')->attr('href');
            return  "https://thegioihongsam.com{$url}";
        });
       
        if (!empty($urls)) {
            echo "\n===== Start page {$page} {$url} !!!\n";
            foreach ($urls as $href) {
                $this->crawler_post($href);
            }
            echo "\n===== DONE page {$page} {$url}\n";
            $page = $page + 1;
            $this->crawler_category2($url, $page);
        }
        echo "DONE All \n";
        return;
    }

    public function crawler_post($url)
    {
        try {
            $_html = $this->curl_html($url);
            $crawler = new Crawler($_html);
            $title = $crawler->filter('h1')->text();

            // $cate = $crawler->filter('ul.breadcrumb .changeurl')->count() > 0 ? $crawler->filter('ul.breadcrumb .changeurl')->text() : '';
            $cate = $crawler->filter('ul.breadcrumb li')->count() >= 2 ? $crawler->filter('ul.breadcrumb li')->eq(1)->text() : '';

            $slug = Str::slug($cate ?? '') . Str::slug($title ?? '');
            $index = 0;

            // $crawler->filter('.product-images #lightgallery a')->each(function ($node) use ($slug, &$index) {
            //     $link = $node->attr('href');
            //     if (empty(strpos('https:', $link))) $link = "https:" . $link;
            //     saveImageUrlStorage($link, "products_kojamart", "{$slug}-{$index}.png");
            //     $index++;
            // });

            $crawler->filter('#gallery_02 img')->each(function ($node) use ($slug, &$index) {
                $link = $node->attr('data-img');
                saveImageUrlStorage($link, "thegioihongsam", "{$slug}-{$index}.png");
                $index++;
            });
            echo "\nSuccess product: {$title} !!!";
        } catch (\Exception $ex) {
            echo "\nError: $url !!!";
        }
    }

    public function curl_html($url)
    {
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

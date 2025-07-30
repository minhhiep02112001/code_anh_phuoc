<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Country;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tags;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class CrawlersYelp
{
    public function index($offset = 0, $limit = 10)
    {
        $datas = DB::table('crawler_map')->where('is_crawler_yelp', 0)->whereNotNull('url_yelp')->limit(10)->offset($offset)->get();
        foreach ($datas as $key => $item) {
            dd($item->url_yelp);
            $data = $this->detailCrawler($item->url_yelp);
            dd($data);
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
    private function detailCrawler($crawler_href)
    {
        try {
            $dataHtml = $this->curl_html($crawler_href);
            dd($dataHtml);
            $crawler = new Crawler($dataHtml);
            if (empty($crawler->filter('h1')->count() > 0)) {
                return [];
            }

            $title = $crawler->filter('h1')->text();
            $textScript = $crawler->filter('script[data-apollo-state]')->text();
            $textScript = str_replace(['<!--', '-->'], '', $textScript);
            $textScript = str_replace(['&quot;'], '"', $textScript);
            $textScript = json_decode($textScript, true);

            preg_match('/encid":"(.*?)"/', key($textScript), $matches);
            if (!empty($matches[1])) {
                $yelpId = $matches[1];
            } else {
                if ($crawler->filter('div[class*="photo-header-buttons"] a')->count() > 0) {
                    $photo_header_buttons = $crawler->filter('div[class*="photo-header-buttons"] a')->attr('href');
                    $extracted_name = str_replace(['https://www-yelp-co-uk.translate.goog/biz_photos/', 'https://www-yelp-co-uk.translate.goog/biz_user_photos/'], '', $photo_header_buttons);
                    $yelpId = preg_replace('/\?.+/', '', $extracted_name);
                    $yelpId = str_replace(['/biz_photos/', '/biz_user_photos/', '/upload'], '', $yelpId);
                } else {
                    $yelpId = $crawler->filter('meta[name="yelp-biz-id"]')->attr('content');
                }
            }

            $listBusiness = [];
            if (!empty($textScript["Business:{$yelpId}"]['organizedProperties({"clientPlatform":"WWW"})'][0]['properties'])) foreach ($textScript["Business:{$yelpId}"]['organizedProperties({"clientPlatform":"WWW"})'][0]['properties'] as $item) {
                $listBusiness[] = [
                    'title' => $item['displayText'],
                    'active' => $item['isActive']
                ];
            }

            if ($crawler->filter('div[class*="photo-header-content"] div[role="img"]')->count() > 0) {
                $review_avg_vote = $crawler->filter('div[class*="photo-header-content"] div[role="img"]')->attr('aria-label');
                $review_avg_vote = str_replace(' star rating', '', $review_avg_vote);
            }

            $address = !empty($textScript["BusinessLocation:{$yelpId}"]['address']['formatted']) ? $textScript["BusinessLocation:{$yelpId}"]['address']['formatted'] : null;
            $address = str_replace("\n", ' ', $address);

            $phone = !empty($textScript["Business:{$yelpId}"]['phoneNumber']['formatted']) ? $textScript["Business:{$yelpId}"]['phoneNumber']['formatted'] : null;
            $review_count = !empty($textScript["Business:{$yelpId}"]['reviewCount']) ? $textScript["Business:{$yelpId}"]['reviewCount'] : null;

            $params_store = [
                'title' => $title,
                'business' => !empty($listBusiness) ? json_encode($listBusiness) : null,
                'review_count' => $review_count,
                'address' => $address,
                'phone' => $phone,
            ];
        } catch (\Exception $e) {
            $params_store = [];
        }
        return $params_store;
    }

    private function detailCrawlerReview($crawler_href, $domain)
    {
        try {
            $dataHtml = $this->curl_html($crawler_href);

            $crawler = new Crawler($dataHtml);

            $yelpId = $crawler->filter('meta[name="yelp-biz-id"]')->attr('content');

            $dataApi = $this->curlApiReview($yelpId);
            $dataJson = json_decode($dataApi);

            $listReviews = [];
            if (!empty($dataJson[0]->data->business->reviews->edges)) foreach ($dataJson[0]->data->business->reviews->edges as $key => $value) {
                if ($value->node->rating > 3) {
                    $dateTime = date('Y-m-d', strtotime($value->node->createdAt->utcDateTime));

                    $listReviews[] = [
                        'full_name' => $value->node->author->displayName,
                        'content' => $value->node->text->full,
                        'rating' => $value->node->rating,
                        'is_status' => 1,
                        'created_time' => $dateTime,
                        'updated_time' => $dateTime
                    ];
                }
            }
        } catch (\Exception $e) {
            $listReviews = [];
        }

        return $listReviews;
    }
    public function curlApiReview($yelpId)
    {
        $url = "https://www.yelp.com/gql/batch";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: */*",
            "accept-language: vi,en;q=0.9",
            "content-type: application/json",
            "dnt: 1",
            "origin: https://www.yelp.com",
            "priority: u=1, i",
            "referer: https://www.yelp.com/writeareview/biz/" . $yelpId,
            // "sec-ch-ua: "Google Chrome";v="129", "Not=A?Brand";v="8", "Chromium";v="129"",
            "sec-ch-ua-mobile: ?0",
            // "sec-ch-ua-platform: "Windows"",
            "sec-fetch-dest: empty",
            "sec-fetch-mode: cors",
            "sec-fetch-site: same-origin",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36",
            "x-apollo-operation-name: GetOpenGraphTagsData,GetWarReviewControllerData,GetWarComposeSidebarData",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = '[{"operationName":"GetWarComposeSidebarData","variables":{"bizEncId":"' . $yelpId . '"},"extensions":{"operationType":"query","documentId":"fa9c069fb844f0e607ef1a7e8a1458fa649ce1423075ca917cf2b9aeb340fe8e"}}]';

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}

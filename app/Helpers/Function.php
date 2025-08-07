<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

if (!function_exists('getValueSetting')) {
    function getValueSetting($key)
    {
        if (!Cache::has($key)) {
            $data = \App\Models\Setting::where([
                'key' =>  $key,
                'domain' => env('APP_URL')
            ])->select(['value'])->first();
            Cache::put($key, !empty($data->value) ? json_decode($data->value) : [], 365 * 24 * 60 * 60);
        }
        return Cache::get($key);
    }
}
if (!function_exists('convertDataTreeToArray')) {

    function convertDataTreeToArray($data, $parent_id = 0)
    {
        $result = [];

        if (empty($data) || !is_array($data)) {
            return [];
        }
        $stt = 0;
        foreach ($data as $key => $item) {
            if (empty($item)) {
                continue;
            }
            $arr = array('id' => $item['id'], 'parent_id' => $parent_id, 'position' => $stt);
            array_push($result, $arr);
            if (!empty($item['children'])) {
                $index = 0;
                foreach ($item['children'] as $val) {
                    $arr = array('id' => $val['id'], 'parent_id' => (int)$item['id'], 'stt' => $index);
                    array_push($result, $arr);
                    $index++;
                }
            }
            $stt++;
        }
        return $result;
    }
}

if (!function_exists('getMenuParent')) {
    function getMenuParent($parent_id, $type = 0)
    {
        $key = "config_menu_{$type}_{$parent_id}";
        if (!Cache::has($key)) {
            $menus = \App\Models\Menu::where(['parent_id' => $parent_id, 'type' => $type])->orderBy('position', 'asc')->get()->toArray();
            Cache::put($key, json_encode($menus), 365 * 24 * 60 * 60);
        }
        return json_decode(Cache::get($key));
    }
}
if (!function_exists('getCacheSetting')) {
    function getCacheSetting($key = '')
    {
        if (!Cache::has('setting')) {
            $settings = \App\Models\Setting::select(['key', 'value'])->get()->toArray();
            $arr = [];
            foreach ($settings as $val) {
                $arr[$val['key']] = $val['value'] ?? '';
            }
            Cache::put('setting', json_encode($arr), 365 * (24 * 60));
        }
        $settings = (array)json_decode(Cache::get('setting') ?? '[]');

        if (!empty($key)) {
            return $settings[$key] ?? '';
        }
        return $settings;
    }
}
if (!function_exists('getMenu')) {
    function getMenu($location_id)
    {
        if (!Cache::has("menus_$location_id")) {
            $settings = \App\Models\Menu::where('location_id', $location_id)->orderBy('order', 'asc')->get()->toArray();
            Cache::put("menus_$location_id", json_encode($settings), 365 * (24 * 60));
        }
        $settings = json_decode(Cache::get("menus_$location_id"));
        return $settings;
    }
}


if (!function_exists('thumbnail')) {
    function thumbnail($image, $new_w, $new_h, $type = 'url', $focus = 'center')
    {
        $percent = 0.5; // percentage of resize

        // Content type
        header('Content-type: image/jpeg');
        $folder = '/storage/resize';
        if (!is_dir($folder)) {
            dd("done");
            mkdir($folder);
        }
        // Get new dimensions
        list($width, $height) = getimagesize($image);
        $new_width = $width * $percent;
        $new_height = $height * $percent;

        $image_p = imagecreatetruecolor($new_width, $new_height);
        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);

        $image = imagecreatefromjpeg($image);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // Output
        imagejpeg($image_p, 'test.jpg', 100);

        dd(1);
        // $w = $image->getImageWidth();
        // $h = $image->getImageHeight();

        // if ($w > $h) {
        //     $resize_w = $w * $new_h / $h;
        //     $resize_h = $new_h;
        // } else {
        //     $resize_w = $new_w;
        //     $resize_h = $h * $new_w / $w;
        // }
        // $image->resizeImage($resize_w, $resize_h, \Imagick::FILTER_LANCZOS, 0.9);

        // switch ($focus) {
        //     case 'northwest':
        //         $image->cropImage($new_w, $new_h, 0, 0);
        //         break;

        //     case 'center':
        //         $image->cropImage($new_w, $new_h, ($resize_w - $new_w) / 2, ($resize_h - $new_h) / 2);
        //         break;

        //     case 'northeast':
        //         $image->cropImage($new_w, $new_h, $resize_w - $new_w, 0);
        //         break;

        //     case 'southwest':
        //         $image->cropImage($new_w, $new_h, 0, $resize_h - $new_h);
        //         break;

        //     case 'southeast':
        //         $image->cropImage($new_w, $new_h, $resize_w - $new_w, $resize_h - $new_h);
        //         break;
        // }
    }
}


if (!function_exists('getLinkUrl')) {
    function getLinkUrl($link)
    {
        $link = str_replace(env("APP_URL", "/"), "", $link);
        return env('APP_URL', "/") . trim($link, '/');
    }
}

if (!function_exists('saveImageUrlStorage')) {
    function saveImageUrlStorage($url, $folder, $name = '')
    {
        try {
            $response = Http::timeout(10)->get($url);

            if (!$response->successful()) {
                return '';
            }

            $contents = $response->body();

            $pathInfo = pathinfo(parse_url($url, PHP_URL_PATH));
            $basename = $pathInfo['basename'] ?? 'image.jpg';

            if (empty($name)) {
                $name = rand(1, 1000000) . '-' . $basename;
            }

            $pathName = "$folder/$name";

            // Đảm bảo thư mục tồn tại
            Storage::disk('public')->makeDirectory($folder);

            Storage::disk('public')->put($pathName, $contents);

            return "storage/$pathName";
        } catch (\Exception $ex) {
            // Log lỗi nếu cần
            \Log::error('saveImageUrlStorage error: ' . $ex->getMessage());
            return '';
        }
    }
}

if (!function_exists('replace_title')) {
    function replace_title($content)
    {
        $content = strip_tags($content);
        $content = trim($content);
        $content = str_replace(['"', "'", '“', '“', '”', ': -', '&nbsp;', '[', ']'], '', $content);
        return $content;
    }
}


if (!function_exists('getThumb')) {
    function getThumb($src, $title = "Image", $class = "")
    {
        $src = convertPathImage($src);
        $path_default = convertPathImage("/assets/images/default.png");
        return "<img loading='lazyload' src='$path_default' data-src='$src' alt='$title' class='w-full rounded-md shadow-lg h-full lazyload'>";
    }
}

if (!function_exists('apiChatGpt')) {
    function apiChatGpt($keyword)
    {
        $api_key = env("CHAT_GPT_KEY");

        $url = "https://api.openai.com/v1/chat/completions";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Content-Type: application/json",
            "Authorization: Bearer " . $api_key . "",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = [
            'model' => 'gpt-4',  // Sử dụng GPT-4 thay vì GPT-3.5-turbo
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $keyword,
                ]
            ],
        ];

        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        $dataJson = json_decode($resp);

        $result = !empty($dataJson->choices[0]->message->content) ? $dataJson->choices[0]->message->content : '';
        return $result;
    }
}


function showListTreeCategoryUl($categories, $parent_id = 0, $level = 0)
{
    $html = "";
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_data = array();
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id) {
            $cate_data[] = $item;
            unset($categories[$key]);
        }
    }

    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_data) {
        $class = $level > 0 ? 'nav-second-level' : '';
        $html .= '<ol class="dd-list">';
        foreach ($cate_data as $key => $item) {
            // Hiển thị tiêu đề chuyên mục
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            $str = showListTreeCategoryUl($categories, $item['id'], $level + 1);
            if ($str == "") {
                $html .= '<li class="dd-item" data-id="' . $item['id'] . ' ">';
                $html .= "<div class='dd-handle'>
                            <a href='#'>" . $item['title'] . "</a>
                          </div>";
                $html .= '</li>';
            } else {
                $html .= '<li class="dd-item dd-collapsed" data-id="' . $item['id'] . '">';
                $html .= '<button class="dd-collapse" data-action="collapse" type="button">Collapse</button>';
                $html .= '<button class="dd-expand" data-action="expand" type="button">Expand</button>';
                $html .= "<div class='dd-handle'><a href='#'>" . $item['title'] . "</a></div>";
                $html .= $str;
                $html .= '</li>';
            }
        }
        $html .= '</ol>';
    }
    return $html;
}

function getTreeData($data, $parent_id = 0)
{
    $result = [];
    foreach ($data as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id) {
            unset($data[$key]);
            $_child = getTreeData($data, $item['id']);
            $item['children'] = collect($_child)->sortBy('position')->toArray();
            $result[] = $item;
        }
    }
    return $result;
}

function format_price($number)
{
    return number_format($number, 0, ',', '.') . ' VNĐ';
}

function format_vote($vote = 0, $review = 0)
{
    $_html = '<div class="rating-star">';
    $_html .= "<span class='spr-badge' data-rating='4.0'>";
    $_html .= "<span class='spr-starrating spr-badge-starrating'>";

    for ($i = 1; $i <= 5; $i++) {
        $style = $i <= $vote ? 'spr-icon-star' : 'spr-icon-star-empty';
        $_html .= "<i class='spr-icon $style'></i >";
    }
    $_html .= "</span >";
    $_html .= "<span class='spr-badge-caption'> ({$review} review)</span>";
    $_html .= "</span >";
    $_html .= "</div > ";
    return $_html;
}


function format_date($date, $format = 'H:i, d-m-Y')
{
    $_date = \Carbon\Carbon::parse($date);
    return $_date->format($format);
}

function timeAgo($date)
{
    $_date = \Carbon\Carbon::parse($date);
    return $_date->diffForHumans();
}

function parseConditions($input)
{
    // Regex to match both simple key-value pairs and complex nested conditions
    $pattern = '/(\w+):((?:\([^\)]+\)(?:\sOR\s\([^\)]+\))*|\d+))/';
    preg_match_all($pattern, $input, $matches, PREG_SET_ORDER);

    $parsed = [];
    foreach ($matches as $match) {
        $key = $match[1];
        $value = $match[2];

        // Check if the value is simply numeric or complex conditions
        if (is_numeric($value)) {
            $parsed[$key] = $value;
        } else {
            // Remove the double parentheses and split by ' OR '
            $value = preg_replace('/^\(\((.*)\)\)$/', '$1', $value);
            $values = preg_split('/\sOR\s/', $value);

            // Clean up each value by removing outer parentheses
            array_walk($values, function (&$val) {
                $val = trim($val, '()');
            });

            $parsed[$key] = $values;
        }
    }
    return $parsed;
}


function parseQuery($input)
{
    // Split the input string on 'AND', taking care not to split within nested parentheses
    $conditions = preg_split('/\sAND\s(?![^\(]*\))/', $input);

    // Prepare an array to hold the parsed data
    $parsed = [];

    // Iterate over each condition to extract and process it
    foreach ($conditions as $condition) {
        // Match the pattern key:value where value can be complex
        if (preg_match('/(\w+):((?:\([^)]+\)|[^;])+)/', $condition, $matches)) {
            $key = $matches[1];  // The field name
            $value = $matches[2];  // The complex value string

            // Remove outer parentheses if present
            $value = trim($value, '()');

            // Split the values by 'OR', respecting nested parentheses
            $values = preg_split('/\sOR\s/', $value);

            // Clean up each value
            array_walk($values, function (&$val) {
                $val = trim($val, '()');
            });

            // Assign the cleaned values to the corresponding key in the parsed array
            $parsed[$key] = $values;
        }
    }

    return $parsed;
}




function parseComplexQuery($input)
{
    $result = [];
    $stack = [];
    $current = '';

    // Tokenize the input based on parentheses and logical operators
    $tokens = preg_split('/(\sAND\s|\sOR\s|[\(\)])/i', $input, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

    foreach ($tokens as $token) {
        $token = trim($token);
        if ($token == '') continue;

        switch ($token) {
            case '(':
                // Push current context to stack and start a new context
                array_push($stack, [$current, []]);
                $current = '';
                break;
            case ')':
                // Finalize current context and pop from stack
                $data = trim($current);
                if (!empty($data)) {
                    $last = array_pop($stack);
                    $last[1][] = parseKeyValue($data);
                    $current = $last[0];
                    $result = $last[1];
                }
                break;
            case "AND":
            case 'OR':
                if (!empty($current)) {
                    $result[] = parseKeyValue($current);
                    $result[] = $token;
                }
                $current = '';
                break;
            default:
                // Continue building the current context
                $current .= $token;
                break;
        }
    }

    // Final clean-up to catch any trailing data
    if (!empty($current)) {
        $result[] = parseKeyValue($current);
    }

    return $result;
}

function parseKeyValue($input)
{
    if (strpos($input, ':') !== false) {
        list($key, $value) = explode(':', $input, 2);
        $value = trim($value, "()");
        if (strpos($value, 'OR') !== false) {
            $values = explode('OR', $value);
            $value = array_map('trim', $values);
        }
        return [$key => $value];
    }
    return $input;
}

function getIframeSrcFromString($iframeString)
{
    // Thay thế width và height bằng biểu thức chính quy
    $iframeString = preg_replace('/width="[^"]*"/', 'width="100%" title="Google Map location"', $iframeString);
    $iframeString = preg_replace('/height="[^"]*"/', 'height="100%"', $iframeString);
    return $iframeString; // Trả về giá trị src hoặc null nếu không tìm thấy
}

function  replaceContent($content)
{
    return str_replace(['—'], ' ', $content);
}

function  replaceContentBanner($post)
{
    return $post->title . ' ' . replaceAddress($post->address);
}

function replaceAddress($addr)
{
    return preg_replace('/\s\d{5}(?:-\d{4})?, United States$/', '', $addr);
}

function convertTimeOpen($timeOpen)
{
    $timeOpen = preg_replace('/<button\b[^>]*>.*?<\/button>/is', '', $timeOpen);
    $timeOpen = str_replace("\u{202F}", ' ', $timeOpen);
    return  $timeOpen;
}


function exportTimeOpen($html)
{
    $pattern = '/<tr[^>]*>\s*<td[^>]*>\s*<div>(.*?)<\/div>\s*<\/td>\s*<td[^>]*>\s*<ul[^>]*>\s*<li[^>]*>(.*?)<\/li>/';

    preg_match_all($pattern, $html, $matches);

    $schedule = [];
    for ($i = 0; $i < count($matches[1]); $i++) {
        $schedule[] = [
            'day' => $matches[1][$i],
            'hours' => $matches[2][$i]
        ];
    }
    return $schedule;
}

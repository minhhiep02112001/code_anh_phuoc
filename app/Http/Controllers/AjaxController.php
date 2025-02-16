<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Districts;
use App\Models\Post;
use App\Models\Provinces;
use App\Models\QueryDB;
use App\Models\Shipping\ShippingRate;
use App\Models\Vote;
use App\Models\Wards;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function __construct(
        public CategoryRepository $categoryRepository,
        public ProductRepository  $productRepository,
        public PostRepository     $postRepository
    ) {
    }
    public function ajax_load_more_home(Request $request)
    {
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 36;
        $where = ['is_status' => 1];
        try {
            $select = ['id', 'title', 'description', 'thumbnail', 'slug', 'data_mp4_movie'];
            $collection = QueryDB::all('g_post', $where, ['order_by' => array(['updated_at', 'desc']), 'select' => $select, 'limit' => $limit, 'offset' => (($page - 1) * $limit)]);
            $html = view('front_end.block.ajax_load_more_home', ['games' => $collection])->render();
            return $html;
        } catch (\Exception $ex) {
            return '';
        }
    }


    private function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function wishlist(Request $request)
    {
        $_id = $request->product_id;
        $data_id = json_decode($request->cookie('follow_product')) ?? [];
        $message = in_array($_id, $data_id) ? 'Unfollow Success' : "Follow Success";
        $check = in_array($_id, $data_id) ? 0 : 1;
        $this->setCookie('follow_product', $_id, $check);
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'text' => $check ? 'Unfollow' : "Follow"
        ]);
    }

    function votePost(Request $request)
    {
        $ip = $this->getUserIpAddr();
        $vote = $request->vote ?? 0;
        $post = Post::find($request->post);
        $votes = Vote::where('post_id', $post->id ?? 0)->orderBy('created_at', 'desc')->get();
        $total = $votes->count() + 1;
        $avg_vote = round((($votes->sum('rating') + $vote) / $total), 1);
        if (!empty($votes) && $votes->count() > 0) {
            $first = $votes->first();
            $time = Carbon::parse($first->created_at, 'Y-m-d H:i:s');
            if ($time->diffInMinutes(Carbon::now()->format("Y-m-d H:i:s")) < 10) {
                return response()->json([
                    'status' => false,
                    'message' => 'You have rated this article of ours'
                ], 404);
            }
        }
        Vote::create([
            'ip_address' => $ip,
            'rating' => $vote,
            'post_id' => $post->id ?? 0,
        ]);

        Post::updateField($post->id, [
            'avg_vote' => $avg_vote,
            'total_vote' => $total
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thank you for rating the article',
            'avg_vote' => $avg_vote,
            'total_vote' => $total
        ], 200);
    }


    public function loadProducts(Request $request)
    {
        $filter = parseConditions($request->filter);

        $sort = array_filter(explode(':', $request->sortby ?? ''));

        $page = $request->page ?? 1;
        $limit = 16;
        $option = ['page' => $page, 'limit' => $limit];
        if (!empty($sort)) $option['order_by'] = [$sort[0], $sort[1] ?? 'asc'];
        //  $option['select'] =    ['id', 'code', 'sell_number', 'slug', 'title', 'thumbnail', 'description', 'price', 'price_out', 'params', 'unit', 'avg_vote', 'total_vote'];

        $products = $this->productRepository->getAllFilterProduct($filter,$option);

        $html = view('front_end.block.ajax_load_product', ['products' => $products])->render();

        return $html;
    }

    private function _convert_filter($filter)
    {
        $results = [];



        return $results;
    }

    public function ajax_load_data(Request $request)
    {
        $data_seach = $request->only(['tag_id', 'category_id', 'order_by', 'type', 'page', 'limit', 'title']);

        $page = $data_seach['page'] = $data_seach['page'] ?? 1;
        $data_seach['type'] = $data_seach['type'] ?? 'home';
        $data_seach['order_by'] = $data_seach['order_by'] ?? 'updated_at';

        $limit = $data_seach['limit'] ?? 63;
        $key = env("APP_NAME") . "_{$page}_{$limit}_" . json_encode($data_seach);
        $html = "";
        if (Cache::has("file_$key")) {
            return Cache::get("file_$key");
        }
        $data_seach['select'] = ['g_post.id', 'g_post.title', 'g_post.description', 'g_post.thumbnail', 'g_post.slug', 'g_post.data_mp4_movie'];
        $rows = $this->query($key, $data_seach);
        $html = view('front_end.block.ajax_load_more_home', ['games' => $rows])->render();
        Cache::put("file_$key", $html, 300);
        return $html;
    }

    private function query($key, $data)
    {
        $cache = 60 * 60;
        $delete_cache = false;
        $param = [
            'where' => [
                "g_post.is_status" => 1
            ],
            'option' => [
                'select' => $data['select'] ?? '*',
                'limit' => $data['limit'],
                'page' => $data['page']
            ]
        ];
        if (!empty($data['type'])) {
            switch ($data['type']) {
                case "search":
                    if (empty($data['title'])) return [];
                    $param['where']['title'] = ['like' => $data['title']];
                    $delete_cache = true;
                    $cache = 300;
                    break;
                case "tag":
                    if (!empty($data['tag_id'])) {
                        $param['where']['join'] = ['table' => 'g_post_tag', 'foreign_key' => "post_id"];
                        $param['where']['g_post_tag.tag_id'] = $data['tag_id'];
                    }
                    break;
                case "category":
                    if (!empty($data['category_id'])) {
                        $param['where']['join'] = ['table' => 'st_post_categorys', 'foreign_key' => "post_id"];
                        $param['where']['st_post_categorys.category_id'] = $data['category_id'];
                    }
                    break;
                default:
                    break;
            }
        }
        if (!empty($data['order_by'])) {
            $param['option']["order_by"] = $data['order_by'];
        }
        $posts = $this->model_post->getData($key, $param, $delete_cache, $cache);
        return $posts;
    }

    public function load_province(Request $request) {
        return Provinces::where(function($query) use ($request) {
            
        })->get();
    }

    public function load_district(Request $request) {
        return Districts::where(function($query) use ($request) {
            if($request->has('province_code')) return $query->where('province_code', $request->province_code);
        })->get();
    }

    public function load_wards(Request $request) {
        $query = $request->only(['district_code', 'province_code', 'ward_code']);
        $query =array_filter($query); 
        return Wards::where($query)->get();
    } 

    public function load_shipping_rates(Request $request)
    {
        $query = $request->only(['district_code', 'province_code', 'ward_code']);
        $rates = ShippingRate::where($query)->with('shipping')->get();
        return response()->json($rates);
    }
}

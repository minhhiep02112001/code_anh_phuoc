<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DragController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'key' => config('data.config_drags')
        ];
        return view('admin.drag.index', $data);
    }

    public function ajax_load_data(Request $request)
    {
        $key = $request->key;
        $type = $request->type;
        $query = DB::table('st_drag')->where('key', $key)->orderBy('order', 'asc')->get()->toArray();
        $arr_id = array_column($query, 'data_id');
        $rows = [];
        switch ($type) {
            case 'product':
                $rows = Product::whereIn('id', $arr_id ?? [-1])->select(['id', 'title'])->get()->keyBy('id')->toArray();
                break;
            case 'coupon':
                // $rows = Coupon::whereIn('id', $arr_id ?? [-1])->select(['id', 'title'])->get()->keyBy('id')->toArray();
                break;
            case "category":
                $rows = Category::whereIn('id', $arr_id ?? [-1])->select(['id', 'title'])->get()->keyBy('id')->toArray();
                break;
            case 'post':
                $rows = Post::whereIn('id', $arr_id ?? [-1])->select(['id', 'title'])->get()->keyBy('id')->toArray();
                break;
        }
        $data = [];
        if (!empty($rows)) {
            foreach ($query as $item) {
                $val = $rows[$item->data_id] ?? [];
                if (!empty($val)) $data[] = ['id' => $val['id'], 'text' => $val['title'], 'type' => $type];
            }
        }
        return response()->json($data);
    }


    public function store(Request $request)
    {
        $data = $request->get('drag_id');
        $arr = [];
        foreach ($data as $key => $item) {
            $arr[] = [
                'data_id' => $item['id'],
                'type' => $item['type'],
                'key' => $request->key,
                'order' => $key
            ];
        }
        DB::table('st_drag')->where('key', $request->key)->delete();
        $check = DB::table('st_drag')->insert($arr);
        return response()->json([
            'status' => $check ? 'success' : 'error',
            'message' => $check ? 'Thành công' : 'Lỗi'
        ]);
    }
}

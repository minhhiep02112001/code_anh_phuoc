<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Eloquent\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends BaseAdminController
{

    function __construct(PostRepository $postRepository)
    {
        $this->_repository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topList($type = 'brand')
    {
        return $this->index('top_list');
    }

    public function index($type = 'brand')
    {
        $data = [
            'type' => $type
        ];
        return view('admin.post.index', $data);
    }

    public function ajax_load_data(Request $request)
    {
        $limit = $request->length ?? 10;
        $offset = $request->start;

        $params = $request->params ?? [];
        $option = ['limit' => $limit, 'offset' => $offset];
        if (!empty($params['order_by'])) {
            $order = explode('__', $params['order_by']);
            $option['order_by'] = [$order[0], $order[1]];
            unset($params['order_by']);
        }
        $params['type'] = request('type', 'brand');
        $total = $this->_repository->count_customer($params);
        $list = $this->_repository->getAll($params, $option);

        $rows = [];
        if (!empty($list)) foreach ($list as $item) {
            $title = $item->title;
            if ($item->is_status == 1) {
                $title = "<a target='_blank' href='" . route('post', ['slug' => $item->slug]) . "' title='{$item->title}'>{$item->title}</a>";
            }
            $row = array();
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['title'] = $item->title;
            $row['title_link'] = $title;
            $row['parent_id'] = $item->parent_id;
            $row['is_status']    = $item->is_status;
            $row['is_robot']    = $item->is_robot;
            $row['is_thumbnail']    = $item->is_thumbnail;
            $row['is_thumb_block_1']    = $item->is_thumb_block_1;
            $row['thumbnail']    = getThumbnail($item, 100, 100);
            $row['address']     = $item->address;
            $row['link_map']     = $item->link_map;
            $row['iframe_map']     = $item->iframe_map;
            $row['time_open']     = $item->time_open;
            $row['email']     = $item->email;
            $row['review_google']     = $item->review_google;
            $row['phone']     = $item->phone;
            $row['review_yelp']     = $item->review_yelp;
            $row['schema']     = $item->schema;
            $row['updated_at'] = format_date($item->updated_at);
            $row['created_at'] = format_date($item->created_at);
            $rows[] = $row;
        }

        $data = [
            "draw" => intval($request->draw ?? 0),
            "iTotalRecords" => $total,
            "iTotalDisplayRecords" => $total,
            "aaData" => $rows,
            'data' => $rows,
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'action' => route('admin.post.store'),
            'method' => 'POST',
        ];
        return view('admin.post.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only($this->_repository->getCustomFillable());
        $input['config_social'] = $input['config_social'] ?? json_encode([]);
        if (!empty($input['config_social'])) {
            $input['config_social'] = json_encode($input['config_social']);
        }
        if (!empty($input['is_status']) && $input['is_status'] == 1) $input['publish_at'] = date('Y-m-d H:i:s');
        if (!empty($input['is_status']) && $input['is_status'] == 1) {
            $arr_theme = ['theme', 'theme_2'];
            $index = array_rand($arr_theme);
            $input['theme'] = $arr_theme[$index];
        }

        $input['is_thumbnail'] =  (empty($input['thumbnail']) || !Storage::disk('public')->exists(str_replace(['storage', '//'], '', trim($input['thumbnail'], '/'))))  ? 1 : 0;
        $input['is_thumb_block_1'] =  (empty($input['image_block_1']) || !Storage::disk('public')->exists(str_replace(['storage', '//'], '', trim($input['image_block_1'], '/'))))  ? 1 : 0;

        try {
            DB::beginTransaction();
            $story = $this->_repository->create($input);

            if ($request->has('banners') && !empty($request->get('banners'))) {
                $banners = array_map(function ($item) use ($story) {
                    return [
                        'position' => $item['position'] ?? 0,
                        'thumbnail' => $item['thumb'] ?? '',
                        'post_id' => $story->id,
                        'type' => 'banner'
                    ];
                }, $request->banners);
                DB::table('st_post_images')->insert($banners);
            }

            if ($request->has('thumbnails') && !empty($request->get('thumbnails'))) {
                $images = array_map(function ($item) use ($story) {
                    return [
                        'position' => 0,
                        'thumbnail' => $item['thumb'] ?? '',
                        'post_id' => $story->id,
                        'type' => 'photo'
                    ];
                }, $request->thumbnails);
                DB::table('st_post_images')->insert($images);
            }
            DB::commit();
            return $this->responsiveSuccess('Thêm bài viết thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            dd($ex);
            return $this->responsiveError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if (!$request->ajax()) return redirect()->route('admin.category.index');
        $story = $this->_repository->find($id);
        if (empty($story)) return response()->json(['status' => 'error'], 500);
        $story['url'] = route('post', ['slug' => $story->slug]);

        $story['banners'] = $story->media()->where('type', 'banner')->get();
        $story['thumbnails'] = $story->media()->where('type', 'photo')->get();
        if (!empty($story->config_social)) {
            $story['config_social'] = json_decode($story->config_social);
        }
        return response()->json(['status' => 'success', 'data_info' => $story], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = $this->_repository->find($id);
        if (empty($row)) return abort(404);
        $category = $row->categories()->select(['g_categories.id', 'g_categories.title'])->get()->toArray();

        $data = [
            'action' => route('admin.post.update', ['post' => $id]),
            'method' => 'PUT',
            'row' => $row,
            'category_id' => $category
        ];
        return view('admin.post.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $story = $this->_repository->find($id);
        $input = $request->only($this->_repository->getCustomFillable());

        if ($request->has('is_status')) {
            $input['is_status'] = $request->get('is_status') ?? $story->is_status;
            if (empty($story->publish_at) && $input['is_status'] == 1) $input['publish_at'] = date('Y-m-d H:i:s');
            if (empty($story->theme) && $input['is_status'] == 1) {
                $arr_theme = ['theme', 'theme_2'];
                $index = array_rand($arr_theme);
                $input['theme'] = $arr_theme[$index];
            }
        }
        if ($request->has('is_robot')) $input['is_robot'] = $request->get('is_robot') ?? $story->is_robot;

        $input['config_social'] = $input['config_social'] ?? json_encode([]);
        if (!empty($input['config_social'])) {
            $input['config_social'] = json_encode($input['config_social']);
        }

        $input['is_thumbnail'] =  (empty($input['thumbnail']) || !Storage::disk('public')->exists(str_replace(['storage', '//'], '', trim($input['thumbnail'], '/'))))  ? 1 : 0;
        $input['is_thumb_block_1'] =  (empty($input['image_block_1']) || !Storage::disk('public')->exists(str_replace(['storage', '//'], '', trim($input['image_block_1'], '/'))))  ? 1 : 0;

        try {
            DB::beginTransaction();
            $this->_repository->update($input, $id);

            if ($request->has('banners') && !empty($request->get('banners'))) {
                $banners = array_map(function ($item) use ($story) {
                    return [
                        'position' => $item['position'] ?? 0,
                        'thumbnail' => $item['thumb'] ?? '',
                        'post_id' => $story->id,
                        'type' => 'banner'
                    ];
                }, $request->banners);
                DB::table('st_post_images')->where([
                    'post_id' => $story->id,
                    'type' => 'banner'
                ])->delete();
                DB::table('st_post_images')->insert($banners);
            }

            if ($request->has('thumbnails') && !empty($request->get('thumbnails'))) {
                $images = array_map(function ($item) use ($story) {
                    return [
                        'position' => 0,
                        'thumbnail' => $item['thumb'] ?? '',
                        'post_id' => $story->id,
                        'type' => 'photo'
                    ];
                }, $request->thumbnails);
                DB::table('st_post_images')->where([
                    'post_id' => $story->id,
                    'type' => 'photo'
                ])->delete();
                DB::table('st_post_images')->insert($images);
            }

            DB::commit();
            return $this->responsiveSuccess('Sửa bài viết thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->_repository->delete($id);
            DB::table('st_post_images')->where('post_id', $id)->delete();
            DB::commit();
            return $this->responsiveSuccess('Xóa bài viết thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

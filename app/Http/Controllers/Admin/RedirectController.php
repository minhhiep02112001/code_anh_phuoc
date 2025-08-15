<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings\Redirect;
use App\Repositories\Eloquent\RedirectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectController extends BaseAdminController
{
    function __construct(RedirectRepository $repository)
    {
        $this->_repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.redirect.index', $data);
    }

    public function ajax_load_data(Request $request)
    {

        $limit = $request->limit ?? $request->length ?? 10;
        $offset = $request->offset ?? $request->start ?? 0;
        $params = $request->params ?? [];


        $total = $this->_repository->count_customer($params);
        $list = $this->_repository->getAll($params, ['limit' => $limit, 'offset' => $offset]);

        $rows = []; 

        if (!empty($list)) foreach ($list as $item) {

            $row = array();
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['type'] =  $item->type;
            $row['url_old'] = "<a target='_blank' href='{$item->url_old}'>{$item->url_old}</a>";
            $row['url_new'] = "<a target='_blank' href='{$item->url_new}'>{$item->url_new}</a>";
            $row['is_status']    = $item->is_status;
            $row['updated_at'] = $item->updated_at;
            $row['created_at'] = $item->created_at;
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
            'action' => route('admin.redirect.store'),
            'method' => 'POST',
        ];
        return view('admin.redirect.form', $data);
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
        try {
            // switch ($input['type']) {
            //     case 'category':
            //         $category = Category::find($input['key_id']);
            //         $input['slug'] = $category->slug;
            //         break;
            //     case 'post':
            //         $story = Post::find($input['key_id']);
            //         $input['slug'] = $story->slug ?? '';
            //         break;
            //     case 'tag':
            //         $story = Tag::find($input['key_id']);
            //         $input['slug'] = $story->slug ?? '';
            //         break;
            //     case 'page':
            //         $story = Page::find($input['key_id']);
            //         $input['slug'] = $story->slug ?? '';
            //         break;
            //     default:
            //         $input['key_id'] = 0;
            //         $input['slug'] = '';
            //         break;
            // }
            DB::beginTransaction();
            $this->_repository->create($input);
            DB::commit();
            return $this->responsiveSuccess('Thêm link 301 thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->route('admin.redirect.index');
        }

        $redirect = $this->_repository->find($id);
        if (empty($redirect)) {
            return response()->json(['status' => 'error'], 500);
        }

        return response()->json(['status' => 'success', 'data_info' => $redirect], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'action' => route('admin.redirect.update', ['redirect' => $id]),
            'row' => $this->_repository->find($id),
            'method' => 'PUT',
        ];
        return view('admin.redirect.form', $data);
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
        $input = $request->only($this->_repository->getCustomFillable());
          
        $redirect =  $this->_repository->find($id);
        if ($request->has('is_status')) {
            $input['is_status'] = $request->get('is_status') ?? $redirect->is_status;
        } 
        try {
            DB::beginTransaction();
            $this->_repository->update($input, $id);
            DB::commit();
            return $this->responsiveSuccess('Sửa thành công');
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
            DB::commit();
            return $this->responsiveSuccess('Xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

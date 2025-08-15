<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Repositories\Eloquent\BannerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends BaseAdminController
{ 
    function __construct(BannerRepository $repository)
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
        return view('admin.banner.index');
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
            $row['title'] =  $item->title;
            $row['thumbnail'] = getThumbnail($item, 100);
            $row['thumbnail_mobile'] = getThumbnail($item, 100);
            $row['is_status']    = $item->is_status;
            $row['type']     = !empty(config('data.banner_type')[$item->type]) ? config('data.banner_type')[$item->type] :  $item->type;
            $row['key']     = $item->key;
            $row['description']     = $item->description;
            $row['position']     = $item->position ?? 0;
            $row['content']     = $item->content;
            $row['link_redirect']     = $item->link_redirect;
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
            'action' => route('admin.banner.store'),
            'method' => 'POST',
        ];
        return view('admin.banner.form', $data);
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
            DB::beginTransaction();
            $this->_repository->create($input);
            DB::commit();
            return $this->responsiveSuccess('Thêm banner thành công');
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
    public function show($id, Request $request)
    {
        if (!$request->ajax()) return redirect()->route('admin.banner.index');
        $banner = $this->_repository->find($id);
        if (empty($banner)) return response()->json(['status' => 'error'], 500);
        return response()->json(['status' => 'success', 'data_info' => $banner], 200);
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
            'action' => route('admin.banner.update', ['banner' => $id]),
            'row' =>  $this->_repository->find($id),
            'method' => 'PUT',
        ];
        return view('admin.banner.form', $data);
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
        $banner = $this->_repository->find($id);
        $input = $request->only($this->_repository->getCustomFillable());

        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $banner->is_status;
        try {
            DB::beginTransaction();
            $this->_repository->update($input, $id);
            DB::commit();
            return $this->responsiveSuccess('Sửa banner thành công');
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
            return $this->responsiveSuccess('Xóa banner thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

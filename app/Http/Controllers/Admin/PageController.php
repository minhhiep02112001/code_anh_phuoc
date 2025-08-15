<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Repositories\Eloquent\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends BaseAdminController
{

    function __construct(PageRepository $repository)
    {
        $this->_repository = $repository;
    }
    public function index()
    {
        return view('admin.page.index');
    }
    public function ajax_load_data(Request $request)
    {
        $limit = $request->length ?? 10;
        $offset = $request->start;
        $params = $request->params ?? [];
        $total = $this->_repository->count_customer($params);
        $list = $this->_repository->getAll($params, ['limit' => $limit, 'offset' => $offset]);

        $rows = [];
        if (!empty($list)) foreach ($list as $item) {
            $row = array();
            if ($item->is_status == 1) {
                $title = "<a target='_blank' href='" . route('page', ['slug' => $item->slug]) . "' title='{$item->title}'>{$item->title}</a>";
            }
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['title'] =  $item->title;
            $row['title_link'] = $title ?? $item->title;
            $row['parent_id'] = $item->parent_id;
            $row['schema'] = $item->schema ?? '';
            $row['is_status']    = $item->is_status;
            $row['is_robot']     = $item->is_robot;
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
            'action' => route('admin.page.store'),
            'method' => 'POST',
        ];
        return view('admin.page.form', $data);
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
            return $this->responsiveSuccess('Thêm page thành công');
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
        if (!$request->ajax()) return redirect()->route('admin.page.index');
        $page =  $this->_repository->find($id);
        if (empty($page)) return response()->json(['status' => 'error'], 500);
        $page['url'] =  route('page', [$page->slug]);
        return response()->json(['status' => 'success', 'data_info' => $page], 200);
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
            'action' => route('admin.page.update', ['page' => $id]),
            'method' => 'PUT',
            'row' =>  $this->_repository->findOrFail($id)
        ];
        return view('admin.page.form', $data);
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
        $page = $this->_repository->findOrFail($id);
        $input = $request->only($this->_repository->getCustomFillable());
        $input = array_filter($input);

        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $page->is_status;
        if ($request->has('is_robot')) $input['is_robot'] = $request->get('is_robot') ?? $page->is_robot;

        try {
            DB::beginTransaction();
            $this->_repository->update($input, $id);
            DB::commit();
            return $this->responsiveSuccess('Sửa page thành công');
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

<?php

namespace App\Http\Controllers\Admin;
  
use App\Repositories\Eloquent\LanguageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguageController extends BaseAdminController
{ 

    function __construct(LanguageRepository $languageRepository)
    {
        $this->_repository = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.language.index');
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
            $title_link = $item->title;
            if ($item->is_status == 1) {
                $route =  route('language', ['slug' => $item->code]);
                $title_link = "<a target='_blank' href='{$route}' title='{$item->title}'>{$item->title}</a>";
            }
            $row = array();
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['title_link'] =  $title_link;
            $row['title'] =  $item->title; 
            $row['lang'] =  $item->lang; 
            $row['is_status']    = $item->is_status ?? 0;
            $row['is_robot']     = $item->is_robot ?? 0;
            $row['code']     = $item->code;
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
            'action' => route('admin.language.store'),
            'method' => 'POST',
        ];
        return view('admin.language.form', $data);
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
            return $this->responsiveSuccess('Thêm ngôn ngữ thành công');
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
        if (!$request->ajax()) return redirect()->route('admin.language.index');
        $language = $this->_repository->find($id);
        if (empty($language)) return response()->json(['status' => 'error'], 500);
        return response()->json(['status' => 'success', 'data_info' => $language], 200);
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
            'action' => route('admin.language.update', ['language' => $id]),
            'row' => $this->_repository->find($id),
            'method' => 'PUT',
        ];
        return view('admin.language.form', $data);
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
        $language = $this->_repository->find($id); 
        $input = $request->only($this->_repository->getCustomFillable());
         
        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $language->is_status;
        if ($request->has('is_robot')) $input['is_robot'] = $request->get('is_robot') ?? $language->is_robot;
        if ($request->has('is_home')) $input['is_home'] = $request->get('is_home') ?? $language->is_home;
        if ($request->has('show_content')) $input['show_content'] = $request->get('show_content') ?? $language->show_content;

        try {
            DB::beginTransaction();
            $this->_repository->update($input, $id);
            DB::commit();
            return $this->responsiveSuccess('Sửa ngôn ngữ thành công');
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
            return $this->responsiveSuccess('Xóa ngôn ngữ thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageDetail;
use App\Models\Settings\ConfigPage;
use App\Models\Settings\ConfigPageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigPageController extends Controller
{
    public $fillable = [
        'title',
        'slug',
        'group',
        'layout',
        'code'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.config.page.index', $data);
    }

    public function ajax_load_data(Request $request)
    {

        $total = ConfigPage::count();

        $list = ConfigPage::orderBy('id', 'desc')->get();

        $rows = [];
        if (!empty($list)) foreach ($list as $item) {
            $row = array();
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['slug'] = $item->slug;
            $row['title'] = $item->title;
            $row['group'] = json_decode($item->group, true);
            $row['code'] = $item->code;
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only($this->fillable);
        $data['slug'] = \Str::slug($data['title']);
        $data['group'] = json_encode($data['group'] ?? []);
        try {
            DB::beginTransaction();
            ConfigPage::create($data);
            DB::commit();
            return $this->responsiveSuccess('Thêm thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $config_page = ConfigPage::find($id);
        if (!empty($config_page['group'])) $config_page['group'] = json_decode($config_page['group'], true);
        if ($request->ajax()) {
            if (empty($config_page)) return response()->json(['status' => 'error'], 500);
            return response()->json(['status' => 'success', 'data_info' => $config_page], 200);
        }
        return view('admin.config.page.show', compact('config_page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = ConfigPage::find($id);
        if (empty($row)) return abort(404);
        $data = [
            'action' => route('admin.size.update', ['post' => $id]),
            'method' => 'PUT',
            'row' => $row
        ];
        return view('admin.size.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $config_page = ConfigPage::find($id);
        $input = $request->only($this->fillable);
        $input = array_filter($input);
        $input['group'] = json_encode($input['group'] ?? []);
        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $config_page->is_status;

        try {
            DB::beginTransaction();
            $config_page->update($input);
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $config_page = ConfigPage::find($id);
        try {
            DB::beginTransaction();
            $config_page->delete();
            DB::commit();
            return $this->responsiveSuccess('Xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    function create_detail(Request $request)
    {
        $data = $request->only(['form_type', 'key', 'group', 'page_id', 'value', 'title']);
        if (!empty($data['form_type']) && $data['form_type'] == 'gallery') {
            $_data = array_values($data['value']);
            $data['value'] = json_encode($_data);
        }
        try {
            DB::beginTransaction();
            ConfigPageDetail::create($data);
            DB::commit();
            return $this->responsiveSuccess('Thêm thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    function update_detail(Request $request, $id)
    {
        $page = ConfigPageDetail::find($id);
        $data = $request->only(['form_type', 'key', 'group', 'page_id', 'value', 'title']);
        if (!empty($data['form_type']) && $data['form_type'] == 'gallery') {
            $_data = array_values($data['value']);
            $data['value'] = json_encode($_data);
        }
        try {
            DB::beginTransaction();
            $page->update($data);
            DB::commit();
            return $this->responsiveSuccess('Cập nhật thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    function show_detail(Request $request, $id)
    {
        $config_page = ConfigPageDetail::find($id);
        if (!empty($config_page['form_type']) && $config_page['form_type'] == 'gallery') {
            $config_page['value'] = json_decode($config_page['value'], true);
        }

        if ($request->ajax()) {
            if (empty($config_page)) return response()->json(['status' => 'error'], 500);
            return response()->json(['status' => 'success', 'data_info' => $config_page], 200);
        }
    }

    function delete_detail(Request $request, $id)
    {
        $config_page = ConfigPageDetail::find($id);
        try {
            DB::beginTransaction();
            $config_page->delete();
            DB::commit();
            return $this->responsiveSuccess('Xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

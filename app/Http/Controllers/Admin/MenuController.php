<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    protected $fillData = ['title', 'svg', 'link', 'parent_id', 'order', 'class', 'location_id', 'language_code', 'type'];
    protected $fillSearch = [
        'title', 'location_id', 'type',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        return view('admin.menu.index', $data);
    }

    public function ajax_load_data(Request $request)
    {
        $limit = $request->limit ?? $request->length ?? 10;
        $offset = $request->start;
        $query = Menu::select('*');
        if ($request->has('params') && !empty($request->params)) {
            $param = collect($request->params)->only($this->fillSearch)->filter(function ($item) {
                return $item != "";
            })->toArray();
            if (!empty($param['title'])) {
                $query->where('title', 'like', "%{$param['title']}%");
                $query->orWhere('id', 'like', "%{$param['title']}%");
                unset($param['title']);
            }
            if (!empty($param)) {
                $query->where($param);
            }
        }
        $total = $query->get()->count();
        $list = $query->orderBy('position', 'asc')->offset($offset)->limit($limit)->get();
        $rows = [];
        if (!empty($list)) foreach ($list as $item) {
            $row = array();
            $row['id'] = $item->id;
            $row['title'] = $item->title;
            $row['parent_id'] = $item->parent_id;
            $row['type']    = $item->type ?? '';
            $row['position']    = $item->position ?? 0;
            $row['class']    = $item->class;
            $row['target']     = $item->target;
            $rows[] = $row;
        }
        $result = getTreeData($rows);
        $data = [
            "draw" => intval($request->draw ?? 0),
            "iTotalRecords" => count($result),
            "iTotalDisplayRecords" =>  count($result),
            "aaData" => $result,
            'data' => $result
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
            'action' => route('admin.menu.store'),
            'method' => 'POST',
        ];
        return view('admin.menu.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only($this->fillData);
        try {
            DB::beginTransaction();
            $menu = Menu::create($input);
            DB::commit();
            return $this->responsiveSuccess('Thêm menu thành công', 'success',   $menu);
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
        if (!$request->ajax()) return redirect()->route('admin.menu.index');
        $menu = Menu::find($id);
        if (empty($menu)) return response()->json(['status' => 'error'], 500);
        return response()->json(['status' => 'success', 'data_info' => $menu], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'action' => route('admin.menu.update', ['menu' => $id]),
            'row' => Menu::find($id),
            'method' => 'PUT',
        ];
        return view('admin.menu.form', $data);
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
        $menu = Menu::find($id);
        $input = $request->only($this->fillData);
        $input = array_filter($input);

        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $menu->is_status;
        if ($request->has('is_robot')) $input['is_robot'] = $request->get('is_robot') ?? $menu->is_robot;

        try {
            DB::beginTransaction();
            $menu->update($input);
            DB::commit();
            return $this->responsiveSuccess('Sửa danh mục thành công');
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
        $menu = Menu::find($id);
        if (empty($menu)) return $this->responsiveSuccess('Danh mục này không tồn tại', 'warning');
        $parent_id = $menu->parent_id;
        try {
            DB::beginTransaction();
            $menu->delete();
            Menu::where('parent_id', $id)->update(['parent_id' => $parent_id]);
            DB::commit();
            return $this->responsiveSuccess('Xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    function updateMultiple(Request $request)
    {
        $data = $request->data;
        $data = convertDataTreeToArray($data);

        try {
            DB::beginTransaction();
            foreach ($data as $key => $value) {
                Menu::where('id', $value['id'])->update([
                    'parent_id' => $value['parent_id'],
                    'position' => $value['position'] ?? 0
                ]);
            }
            DB::commit();
            return $this->responsiveSuccess("Thành công");
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

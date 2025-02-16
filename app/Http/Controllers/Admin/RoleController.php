<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role\Permission;
use App\Models\Role\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    protected $fillData = [
        'title', 'code', 'permissions'
    ];

    protected $fillSearch = [
       'title', 'code',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.role.index', ['permissions' => $permissions]);
    }

    public function ajax_load_data(Request $request)
    {
        $limit = $request->length ?? 10;
        $offset = $request->start;
        $query = Role::select('*');
        if ($request->has('params') && !empty($request->params) && is_array($request->params)) {
            $param = collect($request->params)->only($this->fillSearch)->filter(function ($item) {
                return $item != "";
            })->toArray();

            if (!empty($param)) foreach ($param as $k => $val) {
                if (in_array($k, ['title'])) {
                    $query->where($k, 'like', "%{$val}%");
                    continue;
                }
                if (is_array($val)) $query->whereIn($k, $val);
                else  $query->where($k, $val);
            }
        }

        $total = $query->count();

        $list = $query->orderBy('id', 'desc')->offset($offset)->limit($limit)->get();

        $rows = [];
        if (!empty($list)) foreach ($list as $item) {

            $row = array();
            $row['checkID'] = $item->id;
            $row['id'] = $item->id;
            $row['title'] =  $item->title;
            $row['code'] = $item->code;
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
            'action' => route('admin.role.store'),
            'method' => 'POST',
        ];
        return view('admin.role.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only($this->fillData);
        try {
            DB::beginTransaction();
            $role = Role::create($input);
            if(!empty($request->permissions)){
                $role->permissions()->anysc($request->permissions);
            }
            DB::commit();
            return $this->responsiveSuccess('Thêm role thành công');
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
        if (!$request->ajax()) return redirect()->route('admin.role.index');
        $role = Role::find($id);
        $role['permissions'] = $role->permissions()->get();
        if (empty($role)) return response()->json(['status' => 'error'], 500);
        return response()->json(['status' => 'success', 'data_info' => $role], 200);
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
            'action' => route('admin.role.update', ['role' => $id]),
            'row' => Role::find($id),
            'method' => 'PUT',
        ];
        return view('admin.role.form', $data);
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
        dd($request);
        $role = Role::find($id);
        $input = $request->only($this->fillData);
        $input = array_filter($input);
        if ($request->has('is_status')) $input['is_status'] = $request->get('is_status') ?? $role->is_status;
        try {
            DB::beginTransaction();
            $role->update($input);
            if(!empty($request->permissions)){
                $role->permissions()->detach([]);
                $role->permissions()->attach($request->permissions);
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if (empty($role)) return $this->responsiveSuccess('Role này không tồn tại', 'warning');
        try {
            DB::beginTransaction();
            $role->delete();
            DB::commit();
            return $this->responsiveSuccess('Xóa role thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }
}

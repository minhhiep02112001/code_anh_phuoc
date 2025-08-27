<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\KeywordImport;
use App\Repositories\Eloquent\KeywordRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class KeywordController extends BaseAdminController
{
    

    function __construct(KeywordRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index()
    {
        $data = [];
        return view('admin.keyword.index', $data);
    }

    public function ajax_load_data(Request $request)
    {
        $limit = $request->limit ?? $request->length ?? 10;
        $offset = $request->offset ?? $request->start ?? 0;
        $params = $request->params ?? [];

        $total = $this->_repository->count_customer($params);
        $list = $this->_repository->getAll($params, ['limit' => $limit, 'offset' => $offset]);

        $rows = [];
        if (!empty($list))
            foreach ($list as $item) {
                $row = array();
                $row['checkID'] = $item->id;
                $row['id'] = $item->id;
                $row['key_word'] = $row['title'] = $item->key_word;
                $row['is_status'] = $item->is_status ?? 0;
                $row['created_at'] = format_date($item->created_at);
                $row['updated_at'] = format_date($item->updated_at);
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
            'action' => route('admin.keyword.store'),
            'method' => 'POST',
        ];
        return view('admin.keyword.form', $data);
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
            $crawler = $this->_repository->create($input);
            DB::commit();
            $count = $this->_repository->count_customer(['is_status' => 0]);
            return $this->responsiveSuccess('Thêm thành công! Bạn cần chờ (' . round($count / 2) . ') phút để crawler');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->get('import');
            $import = new KeywordImport();
            Excel::import($import, public_path($file));
            $result = $import->getImportResults();
            $successCount = $result['importedCount'] ?? 0;
            $failureCount = $result['failureCount'] ?? 0;

            $count = $this->_repository->count_customer(['is_status' => 0]);
            @unlink(public_path($file));
            return response()->json([
                'status' => 'success',
                'message' => "Dữ liệu đã được nhập thành công! Dòng thành công: $successCount, Dòng lỗi: $failureCount, Bạn cần chờ (" . round($count / 2) . ")phút để crawler."
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage()
            ]);
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
        if (!$request->ajax())
            return redirect()->route('admin.keyword.index');
        $crawler = $this->_repository->find($id);
        if (empty($crawler))
            return response()->json(['status' => 'error'], 500);
        return response()->json(['status' => 'success', 'data_info' => $crawler], 200);
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
            'action' => route('admin.keyword.update', ['post' => $id]),
            'method' => 'PUT',
            'row' => $this->_repository->find($id)
        ];
        return view('admin.keyword.form', $data);
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
        $crawler = $this->_repository->find($id);
        $input = $request->only($this->_repository->getCustomFillable());
        if ($request->has('status'))
            $input['status'] = $request->get('status') ?? $crawler->is_status;
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

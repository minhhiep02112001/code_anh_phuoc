<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CrawlerImport;
use App\Models\Products\Size;
use App\Repositories\Eloquent\CrawlerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CrawlerController extends Controller
{
    private $_repository;

    function __construct(CrawlerRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function index()
    {
        $data = [];
        return view('admin.crawler.index', $data);
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
            $row['key_word'] = $item->key_word;
            $row['google_review'] = $item->google_review;
            $row['address'] = $item->address;
            $row['is_crawler_iframe_map'] = $item->is_crawler_iframe_map;
            $row['relate_id'] = $item->relate_id;
            $row['link_google_map'] = $item->link_google_map;
            $row['is_status']    = $item->status ?? 0;
            $row['is_convert']    = $item->is_convert ?? 0;
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
            'action' => route('admin.crawler.store'),
            'method' => 'POST',
        ];
        return view('admin.crawler.form', $data);
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
            return $this->responsiveSuccess('Thêm thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        }
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $import = new CrawlerImport();
        Excel::import($import, $file); 
        $successCount = $import->successCount;
        $failureCount = $import->failureCount;
        dd($successCount);
        return back()->with('success', "Dữ liệu đã được nhập thành công! Dòng thành công: $successCount, Dòng lỗi: $failureCount");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if (!$request->ajax()) return redirect()->route('admin.crawler.index');
        $crawler =  $this->_repository->find($id);
        if (empty($crawler)) return response()->json(['status' => 'error'], 500);
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
            'action' => route('admin.crawler.update', ['post' => $id]),
            'method' => 'PUT',
            'row' => $this->_repository->find($id)
        ];
        return view('admin.crawler.form', $data);
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
        dd($input);
        if ($request->has('status')) $input['status'] = $request->get('status') ?? $crawler->is_status;

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

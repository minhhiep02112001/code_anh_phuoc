<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CrawleExport;
use App\Http\Controllers\Controller;
use App\Imports\CrawlerImport;
use App\Repositories\Eloquent\CrawlerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CrawlerController extends BaseAdminController
{     function __construct(CrawlerRepository $repository)
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
        $option = ['limit' => $limit, 'offset' => $offset];

        if (!empty($params['order_by'])) {
            $order = explode('__', $params['order_by']);
            $option['order_by'] = [$order[0], $order[1]];
            unset($params['order_by']);
        }
 
        $total = $this->_repository->count_customer($params);
        $list = $this->_repository->getAll($params, $option);

        $rows = [];
        if (!empty($list))
            foreach ($list as $item) {
                $row = array();
                $row['checkID'] = $item->id;
                $row['id'] = $item->id;
                $row['key_word'] = $item->key_word;
                $row['google_review'] = $item->google_review;
                $row['address'] = $item->address;
                $row['is_crawler_iframe_map'] = $item->is_crawler_iframe_map;
                $row['relate_id'] = $item->relate_id;
                $row['crawler_id'] = $item->crawler_id;
                $row['link_google_map'] = $item->link_google_map;
                $row['is_status'] = $item->is_status ?? 0;
                $row['is_convert'] = $item->is_convert ?? 0;
                $row['website'] = $item->website ?? '';
                $row['phone'] = $item->phone ?? ''; 
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
        try {
            $file = $request->get('import');
            $import = new CrawlerImport();
            Excel::import($import, public_path($file));
            $result = $import->getImportResults();
            $successCount = $result['importedCount'] ?? 0;
            $failureCount = $result['failureCount'] ?? 0;
            return response()->json([
                'status' => 'success',
                'message' => "Dữ liệu đã được nhập thành công! Dòng thành công: $successCount, Dòng lỗi: $failureCount"
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage()
            ]);
        }
    }

    public function export(Request $request)
    {
        $params = collect($request->params ?? [])->whereNotNull()->toArray();
        $option = [];
        if (!empty($params['order_by'])) {
            $order = explode('__', $params['order_by']);
            $option['order_by'] = [$order[0], $order[1]];
            unset($params['order_by']);
        }
        // Xuất tệp Excel với các bộ lọc và tùy chọn
        return Excel::download(new CrawleExport($this->_repository, $params, $option ?? []), 'crawled_data.xlsx');
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
            return redirect()->route('admin.crawler.index');
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
        if ($request->has('status')) {
            $input['is_status'] = $request->get('is_status') ?? $crawler->is_status;
            if ($input['is_status'] == 0)
                $input['is_crawler'] = 0;
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseAdminController extends Controller
{
    public $_repository;
    public function removeAll(Request $request)
    {
        $ids = $request->get('ids'); 
        if (empty($ids)) return $this->responsiveError('Bạn chưa chọn id cần xóa', 422);
         try {
            DB::beginTransaction();
            $this->_repository->deleteAll($ids);
            DB::commit();
            return $this->responsiveSuccess('Xóa thành công');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responsiveError($ex->getMessage());
        } 
    }
}

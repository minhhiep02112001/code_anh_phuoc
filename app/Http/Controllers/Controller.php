<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function responsiveError($message, $status = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message
        ], $status);
    }

    function responsiveSuccess($message, $status = 'success', $data = [])
    {
        $arr = array('status' => $status, 'message' => $message);
        if (!empty($data)) {
            $arr['data'] = $data;
        }

        return response()->json($arr, 200);
    }
    protected function setCookie($key, $value, $action = 0, $time = (30 * 34 * 60 * 60))
    {
        $data = json_decode(Cookie::get($key)) ?? [];
        if (!empty($data)) {
            $data = array_filter($data, function ($item) use ($value) {
                return $item != $value;
            });
            $data = array_slice($data, 0, 39);
        }

        if (!empty($action)) $data[] = $value;
        return Cookie::queue($key, json_encode($data), $time);
    }

}

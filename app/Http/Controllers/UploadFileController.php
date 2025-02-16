<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{
    function upload(Request $request)
    {
        $file = $request->file('files');
        $folder = $request->folder ?? 'upload';

        if (empty($file)) return response()->json(['status' => 'error'], 404);
        if (is_array($file)) {
            $result = [];
            foreach ($file as $key => $value) {
                $pathName = (!empty($folder) ? $folder . "/" : "") . $value->getClientOriginalName();
                $path = Storage::disk('public')->putFileAs('photos', $value, $pathName);
                $result[] =  'storage/' . $path;
            }
            return response()->json($result, 200);
        }

        $pathName = (!empty($folder) ? $folder . "/" : "") . $file->getClientOriginalName();
        $path = Storage::disk('public')->putFileAs('photos', $file, $pathName);
        return response()->json(['path' => 'storage/' . $path]);
    }

    
}

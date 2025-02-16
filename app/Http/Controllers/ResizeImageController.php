<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResizeImageController extends Controller
{
    public function resize($type, $size, $image_path)
    {
        $imageFullPath = public_path("storage/images/$image_path");
        
        $sizes = config("image.sizes.$type");

        if (empty($sizes) || !file_exists($imageFullPath) || !in_array($size, $sizes)) return abort(404);


        $savedPath = public_path("storage/images/$type/$size/$image_path");

        try {
            $savedDir = dirname($savedPath);

            if (!is_dir($savedDir)) {
                mkdir($savedDir, 777, true);
            }

            list($width, $height) = explode("x", $size);

            $image = \Image::make($imageFullPath)->fit($width, $height)->save($savedPath);

            return $image->response();
        } catch (\Exception $ex) {
            return abort(404);
        }
    }
}

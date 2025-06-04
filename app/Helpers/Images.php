<?php

use Intervention\Image\ImageManagerStatic as Image;

if (!function_exists('getImageThumb')) {
     function getImageThumb($image = '', $width = '', $height = '', $crop = true)
     {
          $img_default = asset("assets/default.png");

          if (empty($image) || !file_exists(public_path($image))) {
               return $img_default;
          }
          if (empty($width) && empty($height)) {
               return convertPathImage($image);
          }

          $image = trim($image);
          $imageOrigin = public_path($image);
          $sizeText = sprintf('-%dx%d', $width, $height);

          $ext = pathinfo($image, PATHINFO_EXTENSION);

          $newImage = str_replace(".$ext", "$sizeText.$ext", $image);
          $newImage = str_replace("storage", "", $newImage);
          $newImage = str_replace(['///', '//'], '/', ($crop ? "storage/crop/" : 'storage/resize/') . $newImage);

          $pathThumb = public_path($newImage);
          $pathThumb = str_replace(['///', '//'], '/', $pathThumb);

          $webpImage = preg_replace('/\.\w+$/', '.webp', $newImage);
          $pathWebp = public_path($webpImage);

          try {
               if (!file_exists($pathThumb) && !file_exists($pathWebp)) {
                    if (!is_dir(dirname($pathThumb))) {
                         mkdir(dirname($pathThumb), 0755, true);
                    }

                    Image::configure(['driver' => 'gd']);
                    $intval_width = intval($width);
                    $intval_height = intval($height);

                    if ($intval_width > 0 && $intval_height > 0) {
                         $imageObj = Image::make($imageOrigin)->fit($intval_width, $intval_height);
                    } else {
                         $imageObj = Image::make($imageOrigin);
                    }

                    // Lưu file gốc resized
                    $imageObj->save($pathThumb, 85);

                    // Lưu file WebP với chất lượng 80
                    $imageObj->encode('webp', 80)->save($pathWebp);
               }
          } catch (Exception $e) {
               return $img_default;
          }

          // Trả về ảnh WebP nếu tồn tại, nếu không thì trả ảnh resize gốc
          if (file_exists($pathWebp)) {
               return convertPathImage($webpImage);
          }

          return convertPathImage($newImage);
     }
}

if (!function_exists('convertPathImage')) {
     function convertPathImage($path)
     {
          return env('MEDIA_URL') . trim($path, '/');
     }
}

if (!function_exists('getThumbnail')) {
     function getThumbnail($data, $width = '', $height = '', $class = '', $alt = '')
     {
          if (empty($alt) && !empty($data->title)) $alt = $data->title;
          $str_w = !empty($width) ? " width='$width'" : '';
          $str_w .= !empty($height) ? " height='$height'" : '';
          return '<img loading="lazy" alt ="' . $alt  . '" class="' . $class . '" data-src="' . convertPathImage($data->thumbnail) . '" src="' . getImageThumb($data->thumbnail, $width, $height) . '"' . $str_w . ' />';
     }
}


if (!function_exists('getThumbnailImg')) {
     function getThumbnailImg($thumb, $width = '', $height = '', $class = '', $alt = '')
     {
          return '<img loading="lazy" alt ="' . $alt  . '" class="' . $class . '" src="' . getImageThumb($thumb, $width, $height) . '" width="' . $width . '" height="' . $height . '"/>';
     }
}

if (!function_exists('getImageThumbsResponsive')) {
     /**
      * Tạo ảnh responsive với nhiều kích thước (widths).
      * Trả về mảng URL ảnh WebP đã resize.
      *
      * @param string $image Đường dẫn ảnh gốc (storage/...)
      * @param array $widths Mảng các chiều rộng ảnh cần tạo
      * @param int $height Chiều cao cố định, nếu null thì auto tỉ lệ
      * @param bool $crop Có crop hay không
      * @return array Mảng URL ảnh đã tạo, key là width
      */
     function getImageThumbsResponsive($image = '', $widths = [400, 800, 1200], $height = null, $crop = true)
     {
          $img_default = asset("assets/default.png");

          if (empty($image) || !file_exists(public_path($image))) {
               return [$img_default];
          }

          $image = trim($image);
          $imageOrigin = public_path($image);
          $ext = pathinfo($image, PATHINFO_EXTENSION);

          $urls = [];

          foreach ($widths as $width) {
               $heightToUse = $height ?? 0; // Nếu height null thì sẽ để 0 cho Intervention tự tỉ lệ
               $sizeText = $heightToUse > 0 ? "-{$width}x{$heightToUse}" : "-{$width}w";

               $newImage = str_replace(".$ext", "$sizeText.webp", $image);
               $newImage = str_replace("storage", "", $newImage);
               $newImage = str_replace(['///', '//'], '/', ($crop ? "storage/crop/" : 'storage/resize/') . $newImage);
               $pathWebp = public_path($newImage);

               try {
                    // Tạo file nếu chưa tồn tại hoặc ảnh gốc mới hơn
                    if (!file_exists($pathWebp) || filemtime($imageOrigin) > filemtime($pathWebp)) {
                         if (!is_dir(dirname($pathWebp))) {
                              mkdir(dirname($pathWebp), 0755, true);
                         }

                         Image::configure(['driver' => 'gd']);

                         $imageObj = Image::make($imageOrigin);

                         if ($crop && $heightToUse > 0) {
                              $imageObj = $imageObj->fit($width, $heightToUse);
                         } else {
                              // Resize theo chiều rộng, giữ tỉ lệ
                              $imageObj = $imageObj->resize($width, $heightToUse ?: null, function ($constraint) {
                                   $constraint->aspectRatio();
                                   $constraint->upsize();
                              });
                         }

                         $imageObj->encode('webp', 80)->save($pathWebp);
                    }

                    $urls[$width] = convertPathImage($newImage);
               } catch (Exception $e) {
                    $urls[$width] = $img_default;
               }
          }

          return $urls;
     }
}

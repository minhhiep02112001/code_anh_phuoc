<?php

namespace App\Http\Controllers\Admin\FileManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends \UniSharp\LaravelFilemanager\Controllers\ItemsController
{
    public function getItems()
    {
        $currentPage = (int) request()->get('page', 1);
        $currentPage = $currentPage < 1 ? 1 : $currentPage;

        $perPage = $this->helper->getPaginationPerPage();
        
        $search = request()->input('search');
        $items = [];

        if (!empty($search)) {
            $basePath = $this->lfm->path('working_dir');
            $basePath = str_replace(['//'], '/', "photos/{$basePath}");
            $items = $this->getFoldersRecursively($basePath, $search);
        } else {
            $items = array_merge($this->lfm->folders(), $this->lfm->files());
        }

        $formattedItems = array_map(function ($item) {
            if ($item instanceof \UniSharp\LaravelFilemanager\LfmItem) {
                return [
                    'name' => $item->name ?? 'N/A',
                    'url' => $item->url ?? '',
                    'is_file' => $item->is_file ?? false,
                    'is_image' => $item->is_image ?? false,
                    'thumb_url' => $item->thumb_url ?? asset('vendor/laravel-filemanager/img/folder.png'),
                    'time' => $item->time ?? time(),
                    'icon' => $item->is_file
                        ? ($item->is_image ? 'fa-image' : 'fa-file-o')
                        : 'fa-folder-o',
                ];
            }
            return $item;
        }, array_slice($items, ($currentPage - 1) * $perPage, $perPage));

        $data = [
            'items' => $formattedItems,
            'paginator' => [
                'current_page' => $currentPage,
                'total' => count($items),
                'per_page' => $perPage,
            ],
            'display' => $this->helper->getDisplayMode(),
            'working_dir' => $this->lfm->path('working_dir'),
        ];

        return $data;
    }

    public function getFoldersRecursively($basePath, $keyword = null, $maxDepth = 5, $currentDepth = 1)
    {
        $type = !empty(request()->input('type')) && request()->input('type') == 'file' ? 'file' : 'image';
        $folder_type = $type  == 'file' ? config("lfm.folder_categories.file") : config("lfm.folder_categories.image");

        $basePath = "/{$folder_type['folder_name']}/" . str_replace([$folder_type['folder_name'], '//'], '', $basePath);
        $basePath = str_replace('//', '/', $basePath);

        $results = [];
        $folders = Storage::disk('public')->directories($basePath);
        $files = Storage::disk('public')->files($basePath);

        foreach ($folders as $folder) {
            $folderName = basename($folder);

            if (!$keyword || stripos($folderName, $keyword) !== false) {
                $results[] = [
                    'name' => $folderName,
                    'url' => str_replace([$folder_type['folder_name'], '//'], '', $folder),
                    'time' => filemtime(Storage::disk('public')->path($folder)),
                    'icon' => 'fa-folder-o',
                    'is_file' => false,
                    'is_image' => false,
                    'thumb_url' => asset('vendor/laravel-filemanager/img/folder.png'),
                ];
            }

            if ($currentDepth < $maxDepth) {
                $subFolders = $this->getFoldersRecursively($folder, $keyword, $maxDepth, $currentDepth + 1);
                $results = array_merge($results, $subFolders);
            }
        }

        foreach ($files as $file) {
            $fileName = basename($file);

            if (!$keyword || stripos($fileName, $keyword) !== false) {
                $results[] = [
                    'name' => $fileName,
                    'url' => asset('storage/' . $file),
                    'time' => filemtime(Storage::disk('public')->path($file)),
                    'icon' => 'fa-file-o',
                    'is_file' => true,
                    'is_image' => $this->isImage($file),
                    'thumb_url' => $this->isImage($file) ? asset('storage/' . $file) : asset('vendor/laravel-filemanager/img/file.png'),
                ];
            }
        }

        return $results;
    }

    private function isImage($filePath)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

        return in_array($extension, $imageExtensions);
    }
}

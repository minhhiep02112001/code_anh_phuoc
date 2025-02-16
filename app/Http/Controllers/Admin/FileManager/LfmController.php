<?php

namespace App\Http\Controllers\Admin\FileManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LfmController extends \UniSharp\LaravelFilemanager\Controllers\LfmController
{
    function show()
    {
        return view('admin.filemanager.index')->withHelper($this->helper);
    }
}

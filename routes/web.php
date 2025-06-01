<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ResizeImageController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// resize_image

Route::get('storage/images/{type}/{size}/{image_path}', [ResizeImageController::class, 'resize']);

Route::group([
    'prefix' => 'filemanager',
    'middleware' => ['auth.admin']
], function () {
    Route::get('/', [\App\Http\Controllers\Admin\FileManager\LfmController::class, 'show'])->name('unisharp.lfm.show');
    Route::get('/crop', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getCrop'])->name(' unisharp.lfm.getCrop');
    Route::get('/cropimage', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getCropimage'])->name('unisharp.lfm.getCropimage');
    Route::get('/cropnewimage', [\UniSharp\LaravelFilemanager\Controllers\CropController::class, 'getNewCropimage'])->name('unisharp.lfm.getCropnewimage');
    Route::get('/delete', [\UniSharp\LaravelFilemanager\Controllers\DeleteController::class, 'getDelete'])->name('unisharp.lfm.getDelete');
    Route::get('/domove', [\UniSharp\LaravelFilemanager\Controllers\ItemsController::class, 'domove'])->name('unisharp.lfm.domove');
    Route::get('/doresize', [\UniSharp\LaravelFilemanager\Controllers\ResizeController::class, 'performResize'])->name('unisharp.lfm.performResize');
    Route::get('/download', [\UniSharp\LaravelFilemanager\Controllers\DownloadController::class, 'getDownload'])->name('unisharp.lfm.getDownload');
    Route::get('/errors', [\UniSharp\LaravelFilemanager\Controllers\LfmController::class, 'getErrors'])->name('unisharp.lfm.getErrors');
    Route::get('/folders', [\UniSharp\LaravelFilemanager\Controllers\FolderController::class, 'getFolders'])->name('unisharp.lfm.getFolders');
    Route::get('/jsonitems', [\App\Http\Controllers\Admin\FileManager\ItemsController::class, 'getItems'])->name('unisharp.lfm.getItems');
    Route::get('/move', [\UniSharp\LaravelFilemanager\Controllers\ItemsController::class, 'move'])->name('unisharp.lfm.move');
    Route::get('/newfolder', [\UniSharp\LaravelFilemanager\Controllers\FolderController::class, 'getAddfolder'])->name('unisharp.lfm.getAddfolder');
    Route::get('/rename', [\UniSharp\LaravelFilemanager\Controllers\RenameController::class, 'getRename'])->name('unisharp.lfm.getRename');
    Route::get('/resize', [\UniSharp\LaravelFilemanager\Controllers\ResizeController::class, 'getResize'])->name('unisharp.lfm.getResize');
    Route::any('/upload', [\UniSharp\LaravelFilemanager\Controllers\UploadController::class, 'upload'])->name('unisharp.lfm.upload');
});


Route::group([
    // 'middleware' => ['']
], function () {
    Route::post('upload-file', [App\Http\Controllers\UploadFileController::class, 'upload'])->name('upload.file');
});
Route::any('admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => [
    'auth.admin'
]], function () {
    Route::any("clear-cache", function () {
        Cache::flush();
        Cache::store(env("CONFIG_CACHE_MODEL", "file"))->flush();
        \ResponseCache::clear();
        return redirect()->back();
    })->name('clear.cache');

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('category/product', [App\Http\Controllers\Admin\CategoryController::class, 'product']);
    Route::get('toplist', [App\Http\Controllers\Admin\PostController::class, 'topList'])->name('toplist');
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
     Route::resource('banner', App\Http\Controllers\Admin\BannerController::class);
    Route::resource('comment', App\Http\Controllers\Admin\CommentController::class);
    Route::resource('drag', App\Http\Controllers\Admin\DragController::class);
    Route::resource('crawler', App\Http\Controllers\Admin\CrawlerController::class);
    Route::resource('post', App\Http\Controllers\Admin\PostController::class);
    Route::resource('menu', App\Http\Controllers\Admin\MenuController::class);
    Route::resource('redirect', App\Http\Controllers\Admin\RedirectController::class);
    Route::resource('page', App\Http\Controllers\Admin\PageController::class);
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('crawler', App\Http\Controllers\Admin\CrawlerController::class);
    Route::resource('config-page', App\Http\Controllers\Admin\ConfigPageController::class);

    Route::post('config-page-detail', [App\Http\Controllers\Admin\ConfigPageController::class, 'create_detail'])->name('config-page-detail.create');
    Route::get('config-page-detail/{id}', [App\Http\Controllers\Admin\ConfigPageController::class, 'show_detail'])->name('config-page-detail.show');
    Route::put('config-page-detail/{id}', [App\Http\Controllers\Admin\ConfigPageController::class, 'update_detail'])->name('config-page-detail.update');
    Route::delete('config-page-detail/{id}', [App\Http\Controllers\Admin\ConfigPageController::class, 'delete_detail'])->name('config-page-detail.delete');

    Route::post('crawler/import', [App\Http\Controllers\Admin\CrawlerController::class, 'import'])->name('crawler.import');


    Route::any('setting', [App\Http\Controllers\Admin\SettingController::class, 'setting'])->name('setting');
    Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
        Route::post('/update-multiple-menu', [\App\Http\Controllers\Admin\MenuController::class, 'updateMultiple']);
        Route::get('/config_page', [App\Http\Controllers\Admin\ConfigPageController::class, 'ajax_load_data']);
          Route::get('/crawler', [App\Http\Controllers\Admin\CrawlerController::class, 'ajax_load_data']);
        Route::get('/role', [App\Http\Controllers\Admin\RoleController::class, 'ajax_load_data']);
        Route::get('/banner', [App\Http\Controllers\Admin\BannerController::class, 'ajax_load_data']);
        Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'ajax_load_data']);
        Route::get('/redirect', [App\Http\Controllers\Admin\RedirectController::class, 'ajax_load_data']);
        Route::get('/page', [App\Http\Controllers\Admin\PageController::class, 'ajax_load_data']);
        Route::get('/comment', [App\Http\Controllers\Admin\CommentController::class, 'ajax_load_data']);
        Route::get('/post', [App\Http\Controllers\Admin\PostController::class, 'ajax_load_data']);
        Route::get('/menu', [App\Http\Controllers\Admin\MenuController::class, 'ajax_load_data']);
        Route::get('/drag', [App\Http\Controllers\Admin\DragController::class, 'ajax_load_data']);
    });
    Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

 

Route::get('/rss', [App\Http\Controllers\FeedController::class, 'feed_rss'])->name('google-news');
Route::get('/feeds/pinterestxxx.xml', [App\Http\Controllers\FeedController::class, 'pinterestxxx'])->name('pinterestxxx');
Route::get('/feeds/rssxxx.xml', [App\Http\Controllers\FeedController::class, 'rssxxx'])->name('rssxxx');

Route::domain('{slug}.' . env('DOMAIN'))->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'post'])->name('post');
    // ->middleware('cacheResponse:600');
    // Route::get('/menu.html', [\App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
    Route::get('/site_map.xml', [\App\Http\Controllers\HomeController::class, 'sitemapBrand']);
});

Route::group([
    'middleware' => ['redirect_301']
], function () {
    Route::get('/',  [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home')->middleware('cacheResponse:300');
    // Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
      Route::get('/{slug}-post.html', [App\Http\Controllers\HomeController::class, 'post'])->name('post')->where(['slug' => '[a-z0-9-_]+', 'id' => '[0-9]+']);
    //   Route::get('/{slug}-menu.html', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu')->where(['slug' => '[a-z0-9-_]+', 'id' => '[0-9]+']);
    Route::get('/{slug}.html', [App\Http\Controllers\HomeController::class, 'page'])->name('page')->where(['slug' => '[a-z0-9-_]+']);
    // Route::get('/{slug}.html', [App\Http\Controllers\HomeController::class, 'page'])->name('page')->where(['slug' => '[a-z0-9-_]+'])->middleware('cacheResponse:2592000');
    // Route::get('/{slug}.php', [App\Http\Controllers\HomeController::class, 'redirect301'])->name('redirect301')->where(['slug' => '[a-z0-9-_]+']);
    Route::get('{slug}', [App\Http\Controllers\HomeController::class, 'redirect301'])->name('redirect_301')->where(['slug' => '[a-z0-9-_]+']);
});

// <!-- Google tag (gtag.js) -->
// <script async src="https://www.googletagmanager.com/gtag/js?id=G-DB1DK8FTX7"></script>
// <script>
//   window.dataLayer = window.dataLayer || [];
//   function gtag(){dataLayer.push(arguments);}
//   gtag('js', new Date());

//   gtag('config', 'G-DB1DK8FTX7');
// </script>

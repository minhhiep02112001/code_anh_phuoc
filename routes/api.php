<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('upload', [App\Http\Controllers\UploadFileController::class, 'upload'])->middleware('verify.token');
    
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/profile.html', [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('/order.html', [App\Http\Controllers\CartController::class, 'order'])->name('order');
});

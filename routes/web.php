<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FollowController;
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
Route::resource('product', ProductController::class);
Route::resource('image', ImageController::class);
Route::resource('review', ReviewController::class);
Route::resource('follow', FollowController::class);
Route::get('add_image/{pid}/{uid}', [ImageController::class, 'add_image_interface']);
Route::get('add_review/{pid}/{uid}', [ProductController::class, 'add_review']);
Route::post('store_review', [ProductController::class, 'store_review']);
Route::get('store_like/{pid}/{uid}/{rid}', [ProductController::class, 'store_like']);
Route::get('store_dislike/{pid}/{uid}/{rid}', [ProductController::class, 'store_dislike']);
Route::get('show_reviews/{uid}', [FollowController::class, 'show_reviews']);
Route::get('follow_delete/{fid}', [FollowController::class, 'follow_delete']);
Route::get('/', [ProductController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('document', function(){
    return view('pages/document');
});

require __DIR__.'/auth.php';

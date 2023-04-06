<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
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

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/thanks', function () {
    return view('shop.thanks');
})->name('thanks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/',[ShopController::class,'index'])->name('shop.index');

Route::get('/detail/:shop_id/{id}',[ShopController::class,'detail'])->name('shop.detail');

Route::get('/mypage',[ShopController::class,'mypage'])->name('mypage');

Route::post('/done',[ReserveController::class,'reserve'])->name('reserve.done');

Route::get('/mypage/edit/{id}',[ReserveController::class,'edit'])->name('reserve.edit');

Route::post('/mypage/update/{id}',[ReserveController::class,'update'])->name('reserve.update');

Route::post('/mypage/delete/{id}',[ReserveController::class,'delete'])->name('reserve.delete');

Route::get('/like/{shop}',[LikeController::class,'likes'])->name('like');

Route::get('/unlike/{shop}',[LikeController::class,'unlikes'])->name('unlike');

Route::get('/mypage/unlike/{like}',[LikeController::class,'likeDelete'])->name('mypage.likeDelete');




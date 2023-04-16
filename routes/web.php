<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EvaluationController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/mypage',[ShopController::class,'mypage'])->name('mypage');
    Route::post('/done',[ReserveController::class,'reserve'])->name('reserve.done');
    Route::get('/mypage/edit/{id}',[ReserveController::class,'edit'])->name('reserve.edit');
    Route::post('/mypage/update/{id}',[ReserveController::class,'update'])->name('reserve.update');
    Route::post('/mypage/delete/{id}',[ReserveController::class,'delete'])->name('reserve.delete');
    Route::get('/like/{shop}',[LikeController::class,'likes'])->name('like');
    Route::get('/unlike/{shop}',[LikeController::class,'unlikes'])->name('unlike');
    Route::get('/mypage/unlike/{like}',[LikeController::class,'likeDelete'])->name('mypage.likeDelete');
    Route::post('/mypage/eva',[EvaluationController::class,'add'])->name('eva.add');
});

Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/show',[AdminController::class,'show'])->name('admin.show');
    Route::post('/admin/show',[AdminController::class,'add'])->name('admin.add');
    Route::get('/admin/edit/{id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}',[AdminController::class,'update'])->name('admin.update');
    Route::post('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
});

Route::group(['middleware' => 'auth.manager'], function () {
    Route::get('/manager',[ManagerController::class,'index'])->name('manager.index');
    Route::get('/manager/edit/{id}',[ManagerController::class,'edit'])->name('manager.edit');
    Route::post('/manager/update/{id}',[ManagerController::class,'update'])->name('manager.update');
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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

Route::post('/done',[ShopController::class,'reserve'])->name('shop.reserve');

Route::get('/mypage',[ShopController::class,'mypage'])->name('mypage');


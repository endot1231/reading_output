<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('history', [HomeController::class,'history'])->name('history');

Route::resource('output',OutputController::class);

Route::post('mypage/{id}',[MyPageController::class,'update'])->name('mypage.update');
Route::resource('mypage',MyPageController::class)->except(['update']);

Auth::routes();
Route::get('/logout', [LoginController::class,'logout'])->name('logout');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Users\MenuController;
use App\Http\Controllers\Admin\TheloaiController;
use App\Http\Controllers\Admin\TruyenController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ #Pagessss
route::get('403',[MainController::class,'error4403'])->name('403');
route::get('/', [MainController::class, 'trangchu']);
route::get('theloai/{slug}', [MainController::class, 'theloai']);
route::get('detail/{slug}', [MainController::class, 'detail']);
route::get('truyen-hot', [MainController::class, 'truyenhot']);
route::get('truyen-anime', [MainController::class, 'anime']);
route::get('doctruyen/{slug}/{slug1}', [MainController::class, 'doctruyen']);
route::get('search', [MainController::class, 'seacrh']);
route::get('search-chitiet', [MainController::class, 'seacrhchitiet']);

#CUstumer 
route::get('dang-ki', [MainController::class,'dangki']);
route::get('dang-nhap', [MainController::class,'dangnhap']);
route::get('add-customer', [CustomerController::class,'store']);
route::get('log-customer', [CustomerController::class,'create']);
route::get('logout-cus', [CustomerController::class,'logout']);

 

#Adnin
#
#
#
Route::get('admin/users/login', [LoginController::class, 'index']);
Route::get('wp-admin', [LoginController::class, 'index'])->name('login');
route::post('admin/users/login/store', [LoginController::class, 'store']);
route::get('admin/themchapter', [ChapterController::class, 'store']);
route::middleware(['auth'])->group(function () {
    route::get('admin/view/chapter/edit/{id}', [ChapterController::class, 'edit']);
    route::get('admin/updatechap', [ChapterController::class, 'update']);
    route::delete('admin/chapter/del/{id}', [ChapterController::class, 'destroy'])->middleware('per:administrator|admin');


    route::prefix('admin')->group(function () {
        route::get('/logout', [LoginController::class, 'logout']);
        route::get('/', [MainController::class, 'index'])->name('admin');
        route::get('/main', [MainController::class, 'index']);
        #theloai
        Route::resource('theloai', TheloaiController::class);
        #truyen
        Route::resource('truyen', TruyenController::class);
        Route::resource('view/chapter/{slug}', ChapterController::class)->middleware('per:administrator|admin|quanly');
        #chapter
        route::get('view/chapter/add', [ChapterController::class, 'create']);
    });


});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

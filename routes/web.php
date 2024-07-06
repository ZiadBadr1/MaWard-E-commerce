<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\SessionController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Client\ClientController;
use App\Http\Controllers\Admin\Occasion\OccasionController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Slider\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['guest:admin']
],function (){
    Route::get('login',[SessionController::class,'login'])->name('login');
    Route::post('login',[SessionController::class,'checkLogin'])->name('check-login');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::post('logout',[SessionController::class,'logout'])->name('logout');
});


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('slider',SliderController::class);
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('category',CategoryController::class);
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('brand',BrandController::class);
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('occasion',OccasionController::class);
});


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('product',ProductController::class);
    Route::delete('product/images/{image}',[ProductController::class,'deleteImage'])->name('product.images.delete');
});


Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('order',OrderController::class);
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin/',
    'middleware' => ['auth:admin']
],function (){
    Route::resource('clients',ClientController::class);
});
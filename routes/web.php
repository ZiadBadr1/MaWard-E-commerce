<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\SessionController;
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
    'middleware' => ['guest']
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


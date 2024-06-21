<?php

use App\Http\Controllers\Api\Brand\BrandController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Occasion\OccasionController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Slider\SliderController;
use App\Http\Controllers\Api\User\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::group([
    'middleware' => 'api',
    'prefix' => 'user/auth'
], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'sliders'
], function () {
    Route::get('/', [SliderController::class, 'index']);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'categories'
], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'brands'
], function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{id}', [BrandController::class, 'show']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'occasions'
], function () {
    Route::get('/', [OccasionController::class, 'index']);
    Route::get('/{id}', [OccasionController::class, 'show']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'products'
], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
});


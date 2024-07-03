<?php

use App\Http\Controllers\Api\Brand\BrandController;
use App\Http\Controllers\Api\Cart\CartController;
use App\Http\Controllers\Api\CartItem\CartItemController;
use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Image\ImageController;
use App\Http\Controllers\Api\Occasion\OccasionController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\Product\FavoriteProductController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Slider\SliderController;
use App\Http\Controllers\Api\User\AuthController;
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
});


Route::group([
    'middleware' => ['api','auth:user'],
    'prefix' => 'user/auth'
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
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
    Route::get('/', [ProductController::class, 'index'])->middleware('auth:user');
    Route::get('/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');;
    Route::get('/search/{query}', [ProductController::class, 'search']);
    Route::get('/filter/', [ProductController::class, 'filter']);
});

Route::group([
    'middleware' => ['api','auth:user'],
    'prefix' => 'favorite'
], function () {
    Route::get('/', [FavoriteProductController::class, 'index']);
    Route::get('/{product}', [FavoriteProductController::class, 'store']);
});

Route::group([
    'middleware' => ['api','auth:user'],
    'prefix' => 'cart'
], function () {
    Route::get('',[CartController::class, 'show']);
    Route::post('/items', [CartItemController::class, 'store']);
    Route::patch('/items/{id}/increment', [CartItemController::class, 'increment']);
    Route::patch('/items/{id}/decrement', [CartItemController::class, 'decrement']);
    Route::delete('/items/{id}', [CartItemController::class, 'destroy']);
});



Route::group([
    'middleware' => ['api','auth:user'],
    'prefix' => 'order'
], function () {
    Route::get('/all', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
    Route::get('/{id}', [OrderController::class, 'show']);
});

Route::group([
    'prefix' => "checkout"
], function () {
    Route::get('/success', [OrderController::class, 'success'])->name('payment.success');
    Route::get('/cancel', [OrderController::class, 'cancel'])->name('payment.cancel');
});


Route::group([
    'middleware' => ['api','auth:user'],
    'prefix' => 'image'
], function () {
    Route::post('/send', [ImageController::class, 'store']);
});

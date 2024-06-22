<?php

namespace App\Http\Controllers\Api\Product;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteProductController extends Controller
{
    public function index()
    {
        $user = Auth::guard('user')->user();
        $favoriteProducts = $user->favoriteProducts()->with(['category', 'brand', 'occasion', 'images'])->get();


        return ApiResponse::sendResponse(200,'This is all Favorite  Products', ProductResource::collection($favoriteProducts));

    }

    public function store(Product $product)
    {
        $user = Auth::guard('user')->user();


        if ($user->favoriteProducts()->where('product_id', $product->id)->exists()) {
            $user->favoriteProducts()->detach($product);
            return ApiResponse::sendResponse(200,'Product removed from favorites',[]);
        } else {
            $user->favoriteProducts()->attach($product);
            return ApiResponse::sendResponse(200,'Product added to favorites',new ProductResource($product));
        }
    }
}

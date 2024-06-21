<?php

namespace App\Http\Controllers\Api\Product;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand', 'occasion', 'images'])->paginate(10);

        return ApiResponse::sendResponse(200,'This is all Products', new ProductResourceCollection($products));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'occasion', 'images'])->find($id);
        if(isset($product))
            return ApiResponse::sendResponse(200,'This is Product', new ProductResource($product));
        else
            return ApiResponse::sendResponse(404,'This Product Not Found',[]);
    }
}

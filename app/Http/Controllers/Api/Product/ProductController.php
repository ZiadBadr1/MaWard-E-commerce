<?php

namespace App\Http\Controllers\Api\Product;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\ProductFilterRequest;
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

    public function search(string $query)
    {
        $products = Product::with(['category', 'brand', 'occasion', 'images'])
            ->where('name', 'like', '%' . $query . '%')
            ->paginate(10);
        return ApiResponse::sendResponse(200,'This is all Products', new ProductResourceCollection($products));
    }

    public function filter(ProductFilterRequest $request)
    {
        $attributes = $request->validated();
        $sortBy = $attributes['sort_by'] ?? 'name';
        $order = $attributes['order_by'] ?? 'asc';
        $color = $attributes['color']?? null;

        $productsQuery = Product::with(['category', 'brand', 'occasion', 'images']);

        if (isset($color)) {
            $productsQuery->where('color', $color);
        }

        switch (isset($sortBy)) {
            case 'price':
                $productsQuery->orderBy('price', $order);
                break;
            case 'name':
            default:
                $productsQuery->orderBy('name',$order);
                break;
        }

        $products = $productsQuery->paginate(10);

        return ApiResponse::sendResponse(200, 'Filtered Products', new ProductResourceCollection($products));
    }
}

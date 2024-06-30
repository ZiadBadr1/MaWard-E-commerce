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

        $productsQuery = Product::with(['category', 'brand', 'occasion', 'images']);

        $this->applyFilters($productsQuery, $attributes);

        $this->applySorting($productsQuery, $attributes);

        $products = $productsQuery->paginate(10);

        return ApiResponse::sendResponse(200, 'Filtered Products', new ProductResourceCollection($products));
    }

    private function applyFilters($query, $attributes)
    {
        if (!empty($attributes['color'])) {
            $query->where('color', $attributes['color']);
        }

        if (!empty($attributes['category'])) {
            $query->where('category_id', $attributes['category']);
        }

        if (!empty($attributes['brand'])) {
            $query->where('brand_id', $attributes['brand']);
        }

        if (!empty($attributes['occasion'])) {
            $query->where('occasion_id', $attributes['occasion']);
        }
    }

    private function applySorting($query, $attributes)
    {
        $sortBy = $attributes['sort_by'] ?? 'name';
        $order = $attributes['order_by'] ?? 'asc';

        switch ($sortBy) {
            case 'price':
                $query->orderBy('price', $order);
                break;
            case 'name':
            default:
                $query->orderBy('name', $order);
                break;
        }
    }
}

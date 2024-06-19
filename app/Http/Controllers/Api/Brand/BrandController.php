<?php

namespace App\Http\Controllers\Api\Brand;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();

        return ApiResponse::sendResponse(200,'This is all Brands', BrandResource::collection($brands));
    }

    public function show($id)
    {
        $brand = Brand::find($id);
        if(isset($brand))
            return ApiResponse::sendResponse(200,'This is Brand', new BrandResource($brand));
        else
            return ApiResponse::sendResponse(404,'This Brand Not Found',[]);
    }
}

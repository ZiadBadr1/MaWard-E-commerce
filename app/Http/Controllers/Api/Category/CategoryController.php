<?php

namespace App\Http\Controllers\Api\Category;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return ApiResponse::sendResponse(200,'This is all Categories', CategoryResource::collection($categories));
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(isset($category))
            return ApiResponse::sendResponse(200,'This is Category', new CategoryResource($category));
        else
            return ApiResponse::sendResponse(404,'This Category Not Found',[]);
    }
}

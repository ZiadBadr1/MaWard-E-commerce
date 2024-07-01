<?php

namespace App\Http\Controllers\Api\Image;

use App\Actions\Images\StoreImageAction;
use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(['image'=> ['required', 'image', 'mimes:jpg,jpeg,png']]);

        $path = (new StoreImageAction())->execute($validated['image'],'admin/uploaded');

        return ApiResponse::sendResponse(200,'This is Image Path',['image_path' =>"Storage/" . $path]);
    }
}

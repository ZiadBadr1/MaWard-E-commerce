<?php

namespace App\Http\Controllers\Api\Occasion;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\OccasionResource;
use App\Models\Occasion;
use Illuminate\Http\Request;

class OccasionController extends Controller
{
    public function index()
    {
        $occasions = Occasion::get();

        return ApiResponse::sendResponse(200,'This is all Occasions', OccasionResource::collection($occasions));
    }

    public function show($id)
    {
        $occasion = Occasion::find($id);
        if(isset($occasion))
            return ApiResponse::sendResponse(200,'This is Occasion', new OccasionResource($occasion));
        else
            return ApiResponse::sendResponse(404,'This Occasion Not Found',[]);
    }
}

<?php

namespace App\Http\Controllers\Api\Slider;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return ApiResponse::sendResponse(200,'This is All Sliders' , SliderResource::collection($sliders));
    }
}

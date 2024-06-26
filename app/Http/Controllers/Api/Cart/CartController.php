<?php

namespace App\Http\Controllers\Api\Cart;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $user = auth()->guard('user')->user();
        $cart = $user->cart()->with(['cartItems.product','cartItems.product.images'])->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        return ApiResponse::sendResponse(200,'This is all products in your cart',new CartResource($cart));
    }
}

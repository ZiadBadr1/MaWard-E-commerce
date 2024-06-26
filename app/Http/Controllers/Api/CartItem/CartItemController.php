<?php

namespace App\Http\Controllers\Api\CartItem;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Resources\CartItemResource;
use App\Service\CartService;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(StoreCartItemRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();

        try {
            $cartItem = $this->cartService->addItemToCart($user, $data['product_id'], $data['quantity'] ?? 1);
            $cartItem->load('product');

            return ApiResponse::sendResponse(200, 'Product added successfully to your cart', new CartItemResource($cartItem));
        } catch (\Exception $e) {
            return ApiResponse::sendResponse(500, 'Error adding product to cart', []);
        }
    }

    public function increment($id)
    {
        try {
            $cartItem = $this->cartService->incrementItemQuantity($id);

            if (!$cartItem) {
                return ApiResponse::sendResponse(404, 'Product not found', []);
            }

            $cartItem->load('product');
            return ApiResponse::sendResponse(200, 'Product incremented successfully', new CartItemResource($cartItem));
        } catch (\Exception $e) {
            return ApiResponse::sendResponse(500, 'Error incrementing product quantity', []);
        }
    }

    public function decrement($id)
    {
        try {
            $cartItem = $this->cartService->decrementItemQuantity($id);

            if (!$cartItem) {
                return ApiResponse::sendResponse(404, 'Product not found or already deleted', []);
            }

            $cartItem->load('product');
            return ApiResponse::sendResponse(200, 'Product decremented successfully', new CartItemResource($cartItem));
        } catch (\Exception $e) {
            return ApiResponse::sendResponse(500, 'Error decrementing product quantity', []);
        }
    }

    public function destroy($id)
    {
        try {
            $success = $this->cartService->removeItemFromCart($id);

            if (!$success) {
                return ApiResponse::sendResponse(404, 'Product not found', []);
            }

            return ApiResponse::sendResponse(200, 'Product deleted successfully', []);
        } catch (\Exception $e) {
            return ApiResponse::sendResponse(500, 'Error deleting product from cart', []);
        }
    }
}


<?php

namespace App\Service;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartService
{
    public function addItemToCart($user, $productId, $quantity = 1): CartItem
    {
        $cart = $user->cart()->firstOrCreate();

        return $cart->cartItems()->updateOrCreate(
            ['product_id' => $productId],
            ['quantity' =>  $quantity]
        );
    }

    public function incrementItemQuantity($cartItemId): ?CartItem
    {
        $cartItem = CartItem::find($cartItemId);
        if (!$cartItem) {
            return null;
        }

        $cartItem->increment('quantity');
        return $cartItem;
    }

    public function decrementItemQuantity($cartItemId): ?CartItem
    {
        $cartItem = CartItem::find($cartItemId);

        if (!$cartItem) {
            return null;
        }

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            return $cartItem;
        }

        $cartItem->delete();
        return null;
    }

    public function removeItemFromCart($cartItemId): bool
    {
        $cartItem = CartItem::find($cartItemId);
        if (!$cartItem) {
            return false;
        }

        $cartItem->delete();
        return true;
    }
}

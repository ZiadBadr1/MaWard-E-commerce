<?php

namespace App\Service;

use App\Actions\Stock\UpdateStockQtyAction;
use App\Models\Cart;
use App\Models\Order;
use Stripe\StripeClient;

class StripeServices
{
    public function pay(Order $order)
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        $totalAmount = $order->total_amount;

        if ($totalAmount > 0) {

            $session = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => "USD",
                        'product_data' => [
                            'name' => 'Order #' . $order->id,
                        ],
                        'unit_amount' => $totalAmount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['orderId' => $order->id]),
                'cancel_url' => route('payment.cancel', ['orderId' => $order->id]),
            ]);

            return response($session->url);
        }

        return false;
    }

    public function success($orderId): bool
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update(['payment_status' => "Payed"]);
            UpdateStockQtyAction::execute($order->id);
            $cart = Cart::where('user_id', $order->user_id)->first();
            $cart?->cartItems()->delete();
            return true;
        }

        return false;
    }
}
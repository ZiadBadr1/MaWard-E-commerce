<?php

namespace App\Actions\Stock;

use App\Models\Order;
use App\Models\OrderDetail;
use Exception;

class UpdateStockQtyAction
{
    public static function execute($orderID): void
    {
        $order = Order::find($orderID);
        throw_if(!$order, new Exception('Order not found'));

        $orderDetails = OrderDetail::where('order_id', $order->id)->with('product')->get();

        foreach ($orderDetails  as $orderDetail)
        {
            $orderDetail->product->decrement('quantity',$orderDetail->quantity);
        }
    }
}
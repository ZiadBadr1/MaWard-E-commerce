<?php

namespace App\Service\Admin;

use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{
    public function getAll(?string $status = null): LengthAwarePaginator
    {
        $query = Order::query();

        if ($status) {
            $query->where('status', $status);
        }
        return $query->paginate(10);
    }


    public function update(array $attributes, Order $order): Order
    {
        $order->update($attributes);
        return $order;
    }

//    public function delete(Order $order): void
//    {
//        $order->delete();
//    }
}
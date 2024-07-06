<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;
use App\Service\Admin\OrderService;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {}


    public function index()
    {
        $status = request('status');
        return view('admin.order.index', [
            'orders' => $this->orderService->getAll($status),
            'all' => $this->orderService->getAll()->count(),
            'pending' => $this->orderService->getAll('pending')->count(),
            'shipped' => $this->orderService->getAll('shipped')->count(),
            'delivered' => $this->orderService->getAll('delivered')->count(),
            'cancelled' => $this->orderService->getAll('cancelled')->count(),
        ]);
    }

    public function show(Order $order)
    {
        $order->load('orderDetails'); // Assuming you have an orderDetails relationship in your Order model
        $totalAmount = $order->orderDetails->sum('price'); // Assuming 'price' is the field for the order item price
        return view('admin.order.show', compact('order', 'totalAmount'));
    }

    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'order' => $order,
        ]);
    }

    public function update(UpdateRequest $request, Order $order)
    {
        $this->orderService->update($request->validated(), $order);
        return redirect()->back()->with('success', 'Order Updated Successfully');
    }

//    public function destroy(Order $order)
//    {
//        $this->orderService->delete($order);
//        return redirect()->back()->with('success', 'Order Deleted Successfully');
//    }
}

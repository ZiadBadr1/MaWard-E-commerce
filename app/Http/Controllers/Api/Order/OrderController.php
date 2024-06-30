<?php

namespace App\Http\Controllers\Api\Order;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Service\OrderService;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(CreateOrderRequest $request)
    {
        $order = $this->orderService->createOrder($request->validated());

        return ApiResponse::sendResponse(201, 'Order created successfully', new OrderResource($order));
    }

    public function show($id)
    {
        $order = $this->orderService->getOrder($id);
        if($order == null)
        {
            return ApiResponse::sendResponse(404, 'Order Not Found', []);
        }
        return ApiResponse::sendResponse(200, 'Order retrieved successfully', new OrderResource($order));
    }
}

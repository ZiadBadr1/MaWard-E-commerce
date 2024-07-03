<?php

namespace App\Http\Controllers\Api\Order;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Service\OrderService;
use App\Service\StripeServices;
use Illuminate\Http\Request;
use Spatie\FlareClient\Api;

class OrderController extends Controller
{

    public function __construct(protected OrderService $orderService ,protected StripeServices $stripeServices)
    {}

    public function index()
    {
        $user = auth()->guard('user')->user();
        $orders = $this->orderService->getOrders($user);

        if ($orders) {
            return ApiResponse::sendResponse(200,'This is Your orders',$orders);
        }
        return ApiResponse::sendResponse(200,"you don't have any orders",$orders);
    }
    public function store(CreateOrderRequest $request)
    {
        $payment_method = $request->validated(['payment_method']);
        $order = $this->orderService->createOrder($request->validated());
        if(!$order)
        {
            return ApiResponse::sendResponse(404, 'Your Cart is Empty',[]);
        }
        if($payment_method === "stripe") {
            $url = $this->stripeServices->pay($order);
        }
        return ApiResponse::sendResponse(201, 'Order created successfully', $url ??[]);
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

    function success(Request $request)
    {
        $orderId = $request->input('orderId');

        $flag = $this->stripeServices->success($orderId);
        if ($flag) {
            return  ApiResponse::sendResponse(200,"Your Payment Done Successfully",null);
        }
        return  ApiResponse::sendResponse(500,"Payment successful but cart clearing failed",null);
    }

    public function cancel()
    {
        return  ApiResponse::sendResponse(200,"Your Payment Was Canceled",null);
    }
}

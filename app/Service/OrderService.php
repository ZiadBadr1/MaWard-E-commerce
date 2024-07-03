<?php


namespace App\Service;


use App\Actions\Stock\UpdateStockQtyAction;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Actions\Images\StoreImageAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Order_C;
use LaravelIdea\Helper\App\Models\_IH_Order_QB;
use Illuminate\Support\Facades\DB;


class  OrderService
{
    protected StoreImageAction $storeImageAction;

    public function __construct(StoreImageAction $storeImageAction)
    {
        $this->storeImageAction = $storeImageAction;
    }

    public function getOrders(User $user)
    {
        return Order::where('user_id',$user->id)->get();
    }
    public function createOrder($data)
    {
        $cart = Cart::where('user_id', auth()->guard('user')->id())->with('cartItems')->firstOrFail();
        if(count($cart->cartItems)===0)
        {
            return null;
        }
        return DB::transaction(function () use ($data) {
            $order = $this->createOrderRecord($data);
            $cart = Cart::where('user_id', auth()->guard('user')->id())->with('cartItems')->firstOrFail();
            $this->createOrderDetails($order->id, $cart->cartItems->load('product'));
            UpdateStockQtyAction::execute($order->id);
            if ($data['payment_method'] !== 'stripe') {
                $cart->cartItems()->delete();
            }

            return $order->load('orderDetails');
        });
    }

    protected function createOrderRecord($data)
    {
        $cart = Cart::where('user_id', auth()->guard('user')->id())->with('cartItems')->firstOrFail();
        $totalAmount = $cart->cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });


        return Order::create([
            'user_id' => auth()->guard('user')->id(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'payment_method' => $data['payment_method'],
            'attachment' => $this->handleAttachment($data['attachment'] ?? null),
            'total_amount' => $totalAmount,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);
    }

    protected function createOrderDetails($orderId, Collection $cartItems): void
    {
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $orderId,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->quantity * $item->product->price,
            ]);
        }
    }


    protected function handleAttachment($attachment): bool|string|null
    {
        if ($attachment) {
            return $this->storeImageAction->execute($attachment, 'admin/order/attachments');
        }

        return null;
    }


    public function getOrder($orderId): Model|Order|Collection|array|Builder|_IH_Order_C|_IH_Order_QB|null
    {
        $order = Order::find($orderId);
        if ($order) {
            return Order::with(['orderDetails.product', 'orderDetails.product.images'])->findOrFail($orderId);
        }
        return null;
    }
}

<?php


namespace App\Service;


use App\Models\Order;
use App\Models\OrderDetail;
use App\Actions\Images\StoreImageAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Order_C;
use LaravelIdea\Helper\App\Models\_IH_Order_QB;

class OrderService
{
    protected StoreImageAction $storeImageAction;

    public function __construct(StoreImageAction $storeImageAction)
    {
        $this->storeImageAction = $storeImageAction;
    }

    public function createOrder($data)
    {
        $order = $this->createOrderRecord($data);
        $this->createOrderDetails($order->id, $data['order_details']);

        return $order->load('orderDetails');
    }

    protected function createOrderRecord($data)
    {
        return Order::create([
            'user_id' => auth()->guard('user')->id(),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'payment_method' => $data['payment_method'],
            'attachment' => $this->handleAttachment($data['attachment'] ?? null),
            'total_amount' => $data['total_amount'],
            'status' => 'pending',
        ]);
    }

    protected function createOrderDetails($orderId, $orderDetails): void
    {
        foreach ($orderDetails as $detail) {
            OrderDetail::create([
                'order_id' => $orderId,
                'product_id' => $detail['product_id'],
                'quantity' => $detail['quantity'],
                'price' => $detail['price'],
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
        if($order)
        {
        return Order::with(['orderDetails.product','orderDetails.product.images'])->findOrFail($orderId);
        }
        return null;
    }
}

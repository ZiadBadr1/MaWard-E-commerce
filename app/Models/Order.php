<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    const STATUSES = [
        'pending',
        'shipped',
        'delivered',
        'cancelled',
        'refunded',
        'failed',
    ];

    const PAYMENT_METHODS = [
        'stripe',
        'cash_on_delivery',
        'E-Wallet'
    ];

    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone', 'address', 'payment_method', 'attachment', 'total_amount', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function attachment(): ?string
    {
        return $this->attachment ? asset('storage/'.$this->attachment) : null ;
    }
}

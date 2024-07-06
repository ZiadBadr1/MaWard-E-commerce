<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'payment_method' => ['required'],
            'attachment' => ['nullable'],
            'total_amount' => ['required', 'numeric'],
            'status' => ['required',Rule::in(Order::STATUSES)],
            'payment_status' => ['required',Rule::in(Order::PAYMENT_STATUS)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

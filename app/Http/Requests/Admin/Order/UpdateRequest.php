<?php

namespace App\Http\Requests\Admin\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required',Rule::in(Order::STATUSES)],
            'payment_status' => ['required',Rule::in(Order::PAYMENT_STATUS)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

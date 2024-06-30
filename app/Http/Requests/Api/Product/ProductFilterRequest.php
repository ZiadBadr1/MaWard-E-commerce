<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sort_by' => ['sometimes', 'in:name,price'],
            'order_by' => ['sometimes', 'in:asc,desc'],
            'color' => ['sometimes', 'string'],
            'category' => ['sometimes', 'integer', 'exists:categories,id'],
            'brand' => ['sometimes', 'integer', 'exists:brands,id'],
            'occasion' => ['sometimes', 'integer', 'exists:occasions,id'],
        ];
    }
}

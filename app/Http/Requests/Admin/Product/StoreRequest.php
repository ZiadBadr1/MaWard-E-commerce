<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
            'color' => ['required'],
            'special_text' => ['required'],
            'special_text_price' => ['nullable', 'numeric'],
            'special_image' => ['required'],
            'special_image_price' => ['nullable', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],
            'occasion_id' => ['required', 'exists:occasions,id'],
            'images' => ['required', 'array'],  // Ensuring that images input is an array
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg'] // Validating each image in the array
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

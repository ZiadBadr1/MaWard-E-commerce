<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required'],
            'description' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'numeric'],
            'quantity' => ['sometimes', 'required', 'integer'],
            'color' => ['sometimes', 'required'],
            'special_text' => ['sometimes', 'required'],
            'special_text_price' => ['nullable', 'numeric'],
            'special_image' => ['sometimes', 'required'],
            'special_image_price' => ['nullable', 'numeric'],
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],
            'brand_id' => ['sometimes', 'required', 'exists:brands,id'],
            'occasion_id' => ['sometimes', 'required', 'exists:occasions,id'],
            'images' => ['nullable', 'array'],  // Images are optional and can be an array
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'] // Validate each image if provided
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

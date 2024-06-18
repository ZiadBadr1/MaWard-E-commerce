<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:categories,name'],
            'icon' => ['required','image','mimes:jpg,png,jpeg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

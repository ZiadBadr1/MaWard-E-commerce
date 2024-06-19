<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:brands,name'],
            'icon' => ['required','image','mimes:jpg,png,jpeg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

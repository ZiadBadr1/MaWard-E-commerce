<?php

namespace App\Http\Requests\Admin\Occasion;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:occasions,name'],
            'icon' => ['required','image','mimes:png,jpg,jpeg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

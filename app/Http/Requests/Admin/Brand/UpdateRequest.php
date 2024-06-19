<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:brands,name,'.$this->brand->id],
            'icon' => ['required','image','mimes:png,jpg,jpeg'],

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

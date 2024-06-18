<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:categories,name,'.$this->category->id],
            'icon' => ['required','image','mimes:png,jpg,jpeg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

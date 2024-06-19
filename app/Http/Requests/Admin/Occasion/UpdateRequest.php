<?php

namespace App\Http\Requests\Admin\Occasion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','unique:occasions,name,'.$this->occasion->id],
            'icon' => ['nullable','image','mimes:png,jpg,jpeg'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Domains\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'string','uuid'],
            'name' => ['required', 'unique:categories,name,'.$this->id,'max:255'],
            'description' => ['nullable', 'min:3', 'max:255'],
        ];
    }
}

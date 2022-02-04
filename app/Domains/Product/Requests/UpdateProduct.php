<?php

namespace App\Domains\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => ['required', 'string','unique:products,name,'.$this->id,'max:255'],
            'slug' => ['required', 'string','max:255'],
            'price' => ['required', 'numeric'],
            'description' => ['nullable', 'max:255'],
        ];
    }
}

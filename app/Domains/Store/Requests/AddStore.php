<?php

namespace App\Domains\Store\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStore extends FormRequest
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
            'name' => ['required', 'unique:stores','max:255'],
            'address' => ['nullable', 'max:255'],
            'url' => ['nullable', 'url', 'max:255'],
        ];
    }
}

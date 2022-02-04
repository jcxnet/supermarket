<?php

namespace App\Domains\Contact\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddContact extends FormRequest
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
            'name' => ['required', 'string','max:255'],
            'email' => ['required', 'email','unique:contacts','max:255'],
            'phone' => ['nullable', 'max:255'],
            'position' => ['nullable', 'max:255'],
        ];
    }
}

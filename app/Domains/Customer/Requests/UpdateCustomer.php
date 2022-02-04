<?php

namespace App\Domains\Customer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
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
            'id' => ['required', 'string', 'uuid'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email','unique:customers,email,'.$this->id,'max:255'],
        ];
    }
}

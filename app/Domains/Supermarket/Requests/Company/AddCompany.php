<?php

namespace App\Domains\Supermarket\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class AddCompany extends FormRequest
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
            'name' => ['required', 'unique:companies','max:255'],
            'cif' => ['required', 'unique:companies','min:9', 'max:9'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'street' => 'required',
            'number' => 'required|numeric',
            'district' => 'required',
            'zip_code' => 'required:size:10',
            'city' => 'required',
            'state_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'street.required' => 'A rua é obrigatória',
            'number.required' => 'O número é obrigatório',
            'number.numeric' => 'Deve ser um número',
            'district.required' => 'O bairro é obrigatório',
            'zip_code.required' => 'O CEP é obrigatório',
            'zip_code.size' => 'Deve possuir exatamente 10 caracteres',
            'city.required' => 'A cidade é obrigatória',
            'state_id.required' => 'O estado é obrigatório',
        ];
    }
}

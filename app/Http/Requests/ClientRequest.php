<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\DB;

class ClientRequest extends FormRequest
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
            'cpf' => 'required|size:14|unique:clients',
            'rg' => 'required|size:10|unique:clients',
            'name' => 'required|unique:clients',
            'birth_date' => 'required|date',
            'email' => 'required|email|unique:clients',
            'telephone' => 'required|size:14|unique:clients',
            'type' => 'required',
            'department' => 'required',
            'street' => 'required',
            'number' => 'required|numeric',
            'district' => 'required',
            'zip_code' => 'required|size:10',
            'city' => 'required',
            'state_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.size' => 'Deve possuir 14 caracteres',
            'cpf.unique' => 'Este CPF já está cadastrado',
            'rg.required' => 'O RG é obrigatório',
            'rg.size' => 'Deve possuir 10 carcteres',
            'rg.unique' => 'Este RG já está cadastrado',
            'name.required' => 'O nome do é obrigatório',
            'name:unique' => 'Este nome já está cadastrado',
            'birth_date.required' => 'A data de nascimento é obrigatória',
            'birth_date.date' => 'A data de nascimento deve ser no formato data',
            'street.required' => 'A rua é obrigatória',
            'number.required' => 'O número é obrigatório',
            'number.numeric' => 'Deve ser um número',
            'district.required' => 'O bairro é obrigatório',
            'zip_code.required' => 'O CEP é obrigatório',
            'zip_code.size' => 'Deve possuir exatamente 10 caracteres',
            'city.required' => 'A cidade é obrigatória',
            'state_id.required' => 'O estado é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' =>  'Deve possuir o formato email',
            'email.unique' => 'Este e-mail já está cadastrado',
            'telephone.required' => 'O telefone é obrigatório',
            'telephone.size' => 'Deve possuir 14 caracteres',
            'telephone.unique' => 'Este telefone já está cadastrado',
            'type.required' => 'O tipo é obrigatório',
            'department.required' => 'O departamento é obrigatório',

        ];
    }
}

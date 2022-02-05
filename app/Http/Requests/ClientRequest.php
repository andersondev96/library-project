<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'cpf' => 'required|size:14',
            'rg' => 'required|size:10',
            'name' => 'required',
            'birth_date' => 'required|date',
            'email' => 'required|email',
            'telephone' => 'required|size:14',
            'type' => 'required',
            'department' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.size' => 'Deve possuir 14 caracteres',
            'rg.required' => 'O RG é obrigatório',
            'rg.size' => 'Deve possuir 10 carcteres',
            'name.required' => 'O nome do é obrigatório',
            'birth_date.required' => 'A data de nascimento é obrigatória',
            'birth_date.date' => 'A data de nascimento deve ser no formato data',
            'email.required' => 'O email é obrigatório',
            'email.size' =>  'Deve possuir o formato email',
            'telephone.required' => 'O telefone é obrigatório',
            'telephone.size' => 'Deve possuir 14 caracteres',
            'type.required' => 'O tipo é obrigatório',
            'department.required' => 'O departamento é obrigatório',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'isbn' => 'required|size:14',
            'title' => 'required',
            'author' => 'required',
            'publishing_company' => 'required',
            'publication_place' => 'required',
            'publication_date' => 'required|date',
            'publisher_number' => 'required|numeric',
            'available_quantity' => 'required|numeric',
        ];
    }


    public function messages()
{
    return [
        'isbn.required' => 'O ISBN é obrigatório',
        'isbn.size' => 'O ISBN deve possuir exatamente 14 caracteres',
        'title.required' => 'O título é obrigatório',
        'author.required' => 'O nome do autor é obrigatório',
        'publishing_company.required' => 'O nome da editora é obrigatório',
        'publication_place.required' => 'O local de lançamento é obrigatório',
        'publication_date.required' => 'A data de lançamento é obrigatória',
        'publisher_number.required' => 'O número da edição é obrigatório',
        'publisher_number.numeric' => 'O número da edição deve ser um valor inteiro',
        'available_quantity.required' => 'A quantidade de exemplares é obrigatório',
        'available_quantity.numeric' => 'A quantidade de exemplares deve ser um valor inteiro',
    ];
}
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'books_id' => ['required'],
            'client_id' => ['required'],
            'delivery_date' => ['required'],
        ];
    }

    public function messages() {
        return [
            'books_id.required' => 'O título do livro é obrigatório',

            'client_id.required' => 'O nome do cliente é obrigatório',

            'delivery_date.required' => 'A data de devolução é obrigatória',
            ];
    }
}
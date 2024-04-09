<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:50|min:5',
            'preco' => 'required|decimal:2',
            'ingredientes' => 'required|max:50',
            'imagem' => 'required',
        ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            //nome
            'nome.required' => 'O campo do nome é obrigatório',
            'nome.max' => 'O campo do nome deve conter, no máximo, 120 caracteres',
            'nome.min' => 'O campo do nome deve conter, no mínimo, 5 caracteres',

            //preco
            'preco.required' => 'O campo do preço é obrigatório',
            'preco.decimal' => 'O campo preço aceita apenas números decimais',

            //ingredientes
            'ingredientes.required' => 'O campo do ingredientes é obrigatório',
            'ingredientes.max' => 'O campo ingredientes deve conter, no máximo, 50 caracteres',

            //imagem
            'imagem.required' => 'O campo do imagem é obrigatório',
        ];
    }
}
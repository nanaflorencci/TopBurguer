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
            'telefone' => 'required|max:11|min:11|unique:clientes,telefone',
            'email' => 'required|unique:clientes,email|max:50',
            'cpf' => 'required|unique:clientes,cpf|max:11|min:11',
            'endereco' => 'required|unique:clientes,cpf|max:11|min:11',
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

            //telefone
            'celular.required' => 'O campo do celular é obrigatório',
            'celular.max' => 'O campo do celular deve conter, no máximo 11, caracteres',
            'celular.min' => 'O campo do celular deve conter, no mínimo, 11 caracteres',
            'celular.unique' => 'Celular já cadastrado. Informe outro, por favor',

            //email
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O email deve conter 120 caracteres',
            'email.unique' => 'Email já cadastrado. Informe outro, por favor',

            //cpf
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.max' => 'O campo cpf deve ter, no máximo, 11 caracteres',
            'cpf.min' => 'O campo cpf deve ter, no mínimo, 11 caracteres',
            'cpf.unique' => 'Cpf já cadastrado. Informe outro, por favor',

            //endereco
            'endereco.required' => 'O campo endereço é obrigatório',
            'endereco.max' => 'O campo endereço deve ter, no máximo, 11 caracteres',
            'endereco.min' => 'O campo endereço deve ter, no mínimo, 11 caracteres',
            'endereco.unique' => 'Endereço já cadastrado. Informe outro, por favor',
        ];
    }
}
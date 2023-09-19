<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'unique:empresas,nome'],
            'cnpj' => ['required', 'string', 'unique:empresas,cnpj'],
            'url' => ['nullable', 'string'],
            'email' => ['required', 'email', 'unique:empresas,email'],
            'telefone' => ['nullable', 'string'],
            'logo' => ['nullable', 'string'],
            'latitude' => ['nullable', 'string'],
            'longitute' => ['nullable', 'string'],
            'status' => ['required'],
        ];
    }
}

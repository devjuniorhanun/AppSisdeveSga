<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class VariedadeCulturaStoreRequest extends FormRequest
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
            'empresa_id' => ['required'],
            'cultura_id' => ['required'],
            'nome' => ['required', 'string', 'unique:variedade_culturas,nome'],
            'tecnologia' => ['nullable', 'string'],
            'ciclo' => ['nullable', 'string'],
            'qnt_estoque' => ['nullable', 'numeric', 'between:-99999999.99,99999999.99'],
            'status' => ['required'],
        ];
    }
}

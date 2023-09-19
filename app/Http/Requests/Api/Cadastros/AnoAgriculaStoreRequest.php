<?php

namespace App\Http\Requests\Api\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class AnoAgriculaStoreRequest extends FormRequest
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
            'nome' => ['required', 'string', 'unique:ano_agriculas,nome'],
            'data_abertura' => ['nullable', 'date'],
            'data_fechamento' => ['nullable', 'date'],
            'status' => ['required'],
        ];
    }
}

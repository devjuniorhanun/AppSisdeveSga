<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SafraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'empresa_id' => $this->empresa_id,
            'ano_agricula_id' => $this->ano_agricula_id,
            'id' => $this->id,
            'nome' => $this->nome,
            'data_abertura' => $this->data_abertura,
            'data_fechamento' => $this->data_fechamento,
            'status' => $this->status,
        ];
    }
}

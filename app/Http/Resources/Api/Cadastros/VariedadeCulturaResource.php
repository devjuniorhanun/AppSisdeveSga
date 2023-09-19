<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariedadeCulturaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'empresa_id' => $this->empresa_id,
            'cultura_id' => $this->cultura_id,
            'id' => $this->id,
            'nome' => $this->nome,
            'tecnologia' => $this->tecnologia,
            'ciclo' => $this->ciclo,
            'qnt_estoque' => $this->qnt_estoque,
            'status' => $this->status,
        ];
    }
}

<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CulturaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'empresa_id' => $this->empresa_id,
            'id' => $this->id,
            'nome' => $this->nome,
            'status' => $this->status,
        ];
    }
}

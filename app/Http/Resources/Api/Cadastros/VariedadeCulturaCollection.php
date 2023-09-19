<?php

namespace App\Http\Resources\Api\Cadastros;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VariedadeCulturaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}

<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\VariedadeCulturaStoreRequest;
use App\Http\Requests\Api\Cadastros\VariedadeCulturaUpdateRequest;
use App\Http\Resources\Api\Cadastros\VariedadeCulturaCollection;
use App\Http\Resources\Api\Cadastros\VariedadeCulturaResource;
use App\Models\Api\Cadastros\VariedadeCultura;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VariedadeCulturaController extends Controller
{
    public function index(Request $request): VariedadeCulturaCollection
    {
        $variedadeCulturas = VariedadeCultura::all();

        return new VariedadeCulturaCollection($variedadeCulturas);
    }

    public function store(VariedadeCulturaStoreRequest $request): VariedadeCulturaResource
    {
        $variedadeCultura = VariedadeCultura::create($request->validated());

        return new VariedadeCulturaResource($variedadeCultura);
    }

    public function show(Request $request, VariedadeCultura $variedadeCultura): VariedadeCulturaResource
    {
        return new VariedadeCulturaResource($variedadeCultura);
    }

    public function update(VariedadeCulturaUpdateRequest $request, VariedadeCultura $variedadeCultura): VariedadeCulturaResource
    {
        $variedadeCultura->update($request->validated());

        return new VariedadeCulturaResource($variedadeCultura);
    }

    public function destroy(Request $request, VariedadeCultura $variedadeCultura): Response
    {
        $variedadeCultura->delete();

        return response()->noContent();
    }
}

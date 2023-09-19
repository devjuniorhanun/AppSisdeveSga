<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\CulturaStoreRequest;
use App\Http\Requests\Api\Cadastros\CulturaUpdateRequest;
use App\Http\Resources\Api\Cadastros\CulturaCollection;
use App\Http\Resources\Api\Cadastros\CulturaResource;
use App\Models\Api\Cadastros\Cultura;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CulturaController extends Controller
{
    public function index(Request $request): CulturaCollection
    {
        $culturas = Cultura::all();

        return new CulturaCollection($culturas);
    }

    public function store(CulturaStoreRequest $request): CulturaResource
    {
        $cultura = Cultura::create($request->validated());

        return new CulturaResource($cultura);
    }

    public function show(Request $request, Cultura $cultura): CulturaResource
    {
        return new CulturaResource($cultura);
    }

    public function update(CulturaUpdateRequest $request, Cultura $cultura): CulturaResource
    {
        $cultura->update($request->validated());

        return new CulturaResource($cultura);
    }

    public function destroy(Request $request, Cultura $cultura): Response
    {
        $cultura->delete();

        return response()->noContent();
    }
}

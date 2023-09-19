<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\AnoAgriculaStoreRequest;
use App\Http\Requests\Api\Cadastros\AnoAgriculaUpdateRequest;
use App\Http\Resources\Api\Cadastros\AnoAgriculaCollection;
use App\Http\Resources\Api\Cadastros\AnoAgriculaResource;
use App\Models\Api\Cadastros\AnoAgricula;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnoAgriculaController extends Controller
{
    public function index(Request $request): AnoAgriculaCollection
    {
        $anoAgriculas = AnoAgricula::all();

        return new AnoAgriculaCollection($anoAgriculas);
    }

    public function store(AnoAgriculaStoreRequest $request): AnoAgriculaResource
    {
        $anoAgricula = AnoAgricula::create($request->validated());

        return new AnoAgriculaResource($anoAgricula);
    }

    public function show(Request $request, AnoAgricula $anoAgricula): AnoAgriculaResource
    {
        return new AnoAgriculaResource($anoAgricula);
    }

    public function update(AnoAgriculaUpdateRequest $request, AnoAgricula $anoAgricula): AnoAgriculaResource
    {
        $anoAgricula->update($request->validated());

        return new AnoAgriculaResource($anoAgricula);
    }

    public function destroy(Request $request, AnoAgricula $anoAgricula): Response
    {
        $anoAgricula->delete();

        return response()->noContent();
    }
}

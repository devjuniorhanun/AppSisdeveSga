<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\EmpresaStoreRequest;
use App\Http\Requests\Api\Cadastros\EmpresaUpdateRequest;
use App\Http\Resources\Api\Cadastros\EmpresaCollection;
use App\Http\Resources\Api\Cadastros\EmpresaResource;
use App\Models\Api\Cadastros\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    public function index(Request $request): EmpresaCollection
    {
        $empresas = Empresa::all();

        return new EmpresaCollection($empresas);
    }

    public function store(EmpresaStoreRequest $request): EmpresaResource
    {
        $empresa = Empresa::create($request->validated());

        return new EmpresaResource($empresa);
    }

    public function show(Request $request, Empresa $empresa): EmpresaResource
    {
        return new EmpresaResource($empresa);
    }

    public function update(EmpresaUpdateRequest $request, Empresa $empresa): EmpresaResource
    {
        $empresa->update($request->validated());

        return new EmpresaResource($empresa);
    }

    public function destroy(Request $request, Empresa $empresa): Response
    {
        $empresa->delete();

        return response()->noContent();
    }
}

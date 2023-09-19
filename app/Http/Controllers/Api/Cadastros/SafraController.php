<?php

namespace App\Http\Controllers\Api\Cadastros;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cadastros\SafraStoreRequest;
use App\Http\Requests\Api\Cadastros\SafraUpdateRequest;
use App\Http\Resources\Api\Cadastros\SafraCollection;
use App\Http\Resources\Api\Cadastros\SafraResource;
use App\Models\Api\Cadastros\Safra;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SafraController extends Controller
{
    public function index(Request $request): SafraCollection
    {
        $safras = Safra::all();

        return new SafraCollection($safras);
    }

    public function store(SafraStoreRequest $request): SafraResource
    {
        $safra = Safra::create($request->validated());

        return new SafraResource($safra);
    }

    public function show(Request $request, Safra $safra): SafraResource
    {
        return new SafraResource($safra);
    }

    public function update(SafraUpdateRequest $request, Safra $safra): SafraResource
    {
        $safra->update($request->validated());

        return new SafraResource($safra);
    }

    public function destroy(Request $request, Safra $safra): Response
    {
        $safra->delete();

        return response()->noContent();
    }
}

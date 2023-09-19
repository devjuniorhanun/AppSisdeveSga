<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('empresa', App\Http\Controllers\Api\Cadastros\EmpresaController::class);


Route::apiResource('ano-agricula', App\Http\Controllers\Api\Cadastros\AnoAgriculaController::class);


Route::apiResource('safra', App\Http\Controllers\Api\Cadastros\SafraController::class);


Route::apiResource('cultura', App\Http\Controllers\Api\Cadastros\CulturaController::class);


Route::apiResource('variedade-cultura', App\Http\Controllers\Api\Cadastros\VariedadeCulturaController::class);

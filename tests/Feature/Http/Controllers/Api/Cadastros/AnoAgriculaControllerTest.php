<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\AnoAgricula;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\AnoAgriculaController
 */
class AnoAgriculaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $anoAgriculas = AnoAgricula::factory()->count(3)->create();

        $response = $this->get(route('ano-agricula.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\AnoAgriculaController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\AnoAgriculaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $empresa = Empresa::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('ano-agricula.store'), [
            'empresa_id' => $empresa->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $anoAgriculas = AnoAgricula::query()
            ->where('empresa_id', $empresa->id)
            ->where('nome', $nome)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $anoAgriculas);
        $anoAgricula = $anoAgriculas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $anoAgricula = AnoAgricula::factory()->create();

        $response = $this->get(route('ano-agricula.show', $anoAgricula));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\AnoAgriculaController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\AnoAgriculaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $anoAgricula = AnoAgricula::factory()->create();
        $empresa = Empresa::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('ano-agricula.update', $anoAgricula), [
            'empresa_id' => $empresa->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $anoAgricula->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($empresa->id, $anoAgricula->empresa_id);
        $this->assertEquals($nome, $anoAgricula->nome);
        $this->assertEquals($status, $anoAgricula->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $anoAgricula = AnoAgricula::factory()->create();

        $response = $this->delete(route('ano-agricula.destroy', $anoAgricula));

        $response->assertNoContent();

        $this->assertSoftDeleted($anoAgricula);
    }
}

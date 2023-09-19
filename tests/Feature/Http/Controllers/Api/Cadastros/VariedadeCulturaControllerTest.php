<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\Cultura;
use App\Models\Empresa;
use App\Models\VariedadeCultura;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\VariedadeCulturaController
 */
class VariedadeCulturaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $variedadeCulturas = VariedadeCultura::factory()->count(3)->create();

        $response = $this->get(route('variedade-cultura.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\VariedadeCulturaController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\VariedadeCulturaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $empresa = Empresa::factory()->create();
        $cultura = Cultura::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->post(route('variedade-cultura.store'), [
            'empresa_id' => $empresa->id,
            'cultura_id' => $cultura->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $variedadeCulturas = VariedadeCultura::query()
            ->where('empresa_id', $empresa->id)
            ->where('cultura_id', $cultura->id)
            ->where('nome', $nome)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $variedadeCulturas);
        $variedadeCultura = $variedadeCulturas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $variedadeCultura = VariedadeCultura::factory()->create();

        $response = $this->get(route('variedade-cultura.show', $variedadeCultura));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\VariedadeCulturaController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\VariedadeCulturaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $variedadeCultura = VariedadeCultura::factory()->create();
        $empresa = Empresa::factory()->create();
        $cultura = Cultura::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('variedade-cultura.update', $variedadeCultura), [
            'empresa_id' => $empresa->id,
            'cultura_id' => $cultura->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $variedadeCultura->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($empresa->id, $variedadeCultura->empresa_id);
        $this->assertEquals($cultura->id, $variedadeCultura->cultura_id);
        $this->assertEquals($nome, $variedadeCultura->nome);
        $this->assertEquals($status, $variedadeCultura->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $variedadeCultura = VariedadeCultura::factory()->create();

        $response = $this->delete(route('variedade-cultura.destroy', $variedadeCultura));

        $response->assertNoContent();

        $this->assertSoftDeleted($variedadeCultura);
    }
}

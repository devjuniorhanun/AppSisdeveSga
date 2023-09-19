<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\Cultura;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\CulturaController
 */
class CulturaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $culturas = Cultura::factory()->count(3)->create();

        $response = $this->get(route('cultura.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\CulturaController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\CulturaStoreRequest::class
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

        $response = $this->post(route('cultura.store'), [
            'empresa_id' => $empresa->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $culturas = Cultura::query()
            ->where('empresa_id', $empresa->id)
            ->where('nome', $nome)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $culturas);
        $cultura = $culturas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $cultura = Cultura::factory()->create();

        $response = $this->get(route('cultura.show', $cultura));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\CulturaController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\CulturaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $cultura = Cultura::factory()->create();
        $empresa = Empresa::factory()->create();
        $nome = $this->faker->word;
        $status = $this->faker->boolean;

        $response = $this->put(route('cultura.update', $cultura), [
            'empresa_id' => $empresa->id,
            'nome' => $nome,
            'status' => $status,
        ]);

        $cultura->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($empresa->id, $cultura->empresa_id);
        $this->assertEquals($nome, $cultura->nome);
        $this->assertEquals($status, $cultura->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $cultura = Cultura::factory()->create();

        $response = $this->delete(route('cultura.destroy', $cultura));

        $response->assertNoContent();

        $this->assertSoftDeleted($cultura);
    }
}

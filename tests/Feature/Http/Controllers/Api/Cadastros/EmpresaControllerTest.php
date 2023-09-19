<?php

namespace Tests\Feature\Http\Controllers\Api\Cadastros;

use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\Cadastros\EmpresaController
 */
class EmpresaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected(): void
    {
        $empresas = Empresa::factory()->count(3)->create();

        $response = $this->get(route('empresa.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\EmpresaController::class,
            'store',
            \App\Http\Requests\Api\Cadastros\EmpresaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves(): void
    {
        $nome = $this->faker->word;
        $cnpj = $this->faker->word;
        $email = $this->faker->safeEmail;
        $status = $this->faker->boolean;

        $response = $this->post(route('empresa.store'), [
            'nome' => $nome,
            'cnpj' => $cnpj,
            'email' => $email,
            'status' => $status,
        ]);

        $empresas = Empresa::query()
            ->where('nome', $nome)
            ->where('cnpj', $cnpj)
            ->where('email', $email)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $empresas);
        $empresa = $empresas->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->get(route('empresa.show', $empresa));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\Cadastros\EmpresaController::class,
            'update',
            \App\Http\Requests\Api\Cadastros\EmpresaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $empresa = Empresa::factory()->create();
        $nome = $this->faker->word;
        $cnpj = $this->faker->word;
        $email = $this->faker->safeEmail;
        $status = $this->faker->boolean;

        $response = $this->put(route('empresa.update', $empresa), [
            'nome' => $nome,
            'cnpj' => $cnpj,
            'email' => $email,
            'status' => $status,
        ]);

        $empresa->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($nome, $empresa->nome);
        $this->assertEquals($cnpj, $empresa->cnpj);
        $this->assertEquals($email, $empresa->email);
        $this->assertEquals($status, $empresa->status);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with(): void
    {
        $empresa = Empresa::factory()->create();

        $response = $this->delete(route('empresa.destroy', $empresa));

        $response->assertNoContent();

        $this->assertSoftDeleted($empresa);
    }
}

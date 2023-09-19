<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\Cultura;
use App\Models\Api\Cadastros\Empresa;
use App\Models\Api\Cadastros\VariedadeCultura;

class VariedadeCulturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VariedadeCultura::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'cultura_id' => Cultura::factory(),
            'nome' => $this->faker->word,
            'tecnologia' => $this->faker->word,
            'ciclo' => $this->faker->word,
            'qnt_estoque' => $this->faker->randomFloat(2, 0, 99999999.99),
            'status' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\AnoAgricula;
use App\Models\Api\Cadastros\Empresa;

class AnoAgriculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AnoAgricula::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'nome' => $this->faker->word,
            'data_abertura' => $this->faker->date(),
            'data_fechamento' => $this->faker->date(),
            'status' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\AnoAgricula;
use App\Models\Api\Cadastros\Empresa;
use App\Models\Api\Cadastros\Safra;

class SafraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Safra::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'ano_agricula_id' => AnoAgricula::factory(),
            'nome' => $this->faker->word,
            'data_abertura' => $this->faker->date(),
            'data_fechamento' => $this->faker->date(),
            'status' => $this->faker->boolean,
        ];
    }
}

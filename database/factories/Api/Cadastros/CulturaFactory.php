<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\Cultura;
use App\Models\Api\Cadastros\Empresa;

class CulturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cultura::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'empresa_id' => Empresa::factory(),
            'nome' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}

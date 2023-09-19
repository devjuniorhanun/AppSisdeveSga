<?php

namespace Database\Factories\Api\Cadastros;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Api\Cadastros\Empresa;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'cnpj' => $this->faker->word,
            'url' => $this->faker->url,
            'email' => $this->faker->safeEmail,
            'telefone' => $this->faker->word,
            'logo' => $this->faker->word,
            'latitude' => $this->faker->latitude,
            'longitute' => $this->faker->word,
            'status' => $this->faker->boolean,
        ];
    }
}

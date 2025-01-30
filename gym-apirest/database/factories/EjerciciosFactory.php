<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TipoMusculo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ejercicios>
 */
class EjerciciosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->sentence(3),
            'id_tipo_musculo' => TipoMusculo::factory(),
            'descripcion' => $this->faker->optional()->paragraph,
        ];
    }
}

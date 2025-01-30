<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TablasEntrenamiento>
 */
class TablasEntrenamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'semana' => $this->faker->numberBetween(1, 52),
            'nombre' => $this->faker->sentence(3),
            'num_ejercicios' => $this->faker->numberBetween(5, 20),
            'num_dias' => $this->faker->numberBetween(1, 7),
        ];
    }
}

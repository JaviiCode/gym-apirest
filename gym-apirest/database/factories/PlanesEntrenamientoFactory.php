<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuarios;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanesEntrenamiento>
 */
class PlanesEntrenamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_entrenador' => Usuarios::factory(),
            'id_cliente' => Usuarios::factory(),
            'nombre' => $this->faker->sentence(3),
            'fecha_inicio' => $this->faker->date,
            'fecha_fin' => $this->faker->date,
        ];
    }
}

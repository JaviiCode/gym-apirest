<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PlanesEntrenamiento;
use App\Models\TablasEntrenamiento;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanesTablaEntrenamiento>
 */
class PlanesTablaEntrenamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_plan' => PlanesEntrenamiento::factory(),
            'id_tabla' => TablasEntrenamiento::factory(),
        ];
    }
}

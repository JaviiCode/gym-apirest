<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ejercicios;
use App\Models\TablasEntrenamiento;
use App\Models\TipoSerie;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Series>
 */
class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'repeticiones_min' => $this->faker->numberBetween(5, 10),
            'repeticiones_max' => $this->faker->numberBetween(10, 15),
            'peso' => $this->faker->randomFloat(2, 10, 100),
            'duracion' => $this->faker->randomFloat(2, 30, 120),
            'descanso' => $this->faker->randomFloat(2, 30, 90),
            'id_ejercicio' => Ejercicios::factory(),
            'id_tabla' => TablasEntrenamiento::factory(),
            'id_tipo_serie' => TipoSerie::factory(),
        ];
    }
}

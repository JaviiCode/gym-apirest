<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuarios;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanesNutricionales>
 */
class PlanesNutricionalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_nutricionista' => Usuarios::inRandomOrder()->first()->id_usuario,
            'id_cliente' => Usuarios::inRandomOrder()->first()->id_usuario,
            'nombre' => $this->faker->word(),
            'recomendaciones_dieta' => $this->faker->paragraph(),
            'porcentaje_carbohidratos' => $this->faker->randomFloat(2, 30, 70),
            'porcentaje_proteinas' => $this->faker->randomFloat(2, 10, 40),
            'porcentaje_grasas' => $this->faker->randomFloat(2, 10, 40),
            'porcentaje_fibra' => $this->faker->randomFloat(2, 5, 15),
            'fecha_inicio' => $this->faker->date(),
            'fecha_fin' => $this->faker->date()
        ];
    }
}

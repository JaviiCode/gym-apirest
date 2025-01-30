<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuarios;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerfilesUsuario>
 */
class PerfilesUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido1' => $this->faker->lastName,
            'apellido2' => $this->faker->optional()->lastName,
            'edad' => $this->faker->numberBetween(18, 80),
            'direccion' => $this->faker->optional()->address,
            'telefono' => $this->faker->optional()->phoneNumber,
            'foto' => $this->faker->optional()->imageUrl(),
            'fecha_nacimiento' => $this->faker->date,
            'id_usuario' => Usuarios::factory(),
        ];
    }
}

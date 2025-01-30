<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tipousuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuarios>
 */
class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'token' => $this->faker->uuid,
            'clave' => bcrypt('password'),
            'id_tipo_usuario' => Tipousuario::factory(),
            'fecha_registro' => $this->faker->date,
        ];
    }
}

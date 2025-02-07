<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;
class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("tipousuario")->insert([
            "id_tipo_usuario" => 1,
            "tipo_usuario" => "administrador",
            "descripcion" => "El administrador"
        ]);
        DB::table("tipousuario")->insert([
            "id_tipo_usuario" => 2,
            "tipo_usuario" => "gestor",
            "descripcion" => "El gestor"
        ]);
        DB::table("tipousuario")->insert([
            "id_tipo_usuario" => 3,
            "tipo_usuario" => "entrenador",
            "descripcion" => "El coach"
        ]);
        DB::table("tipousuario")->insert([
            "id_tipo_usuario" => 4,
            "tipo_usuario" => "nutricionista",
            "descripcion" => "Comida"
        ]);
        DB::table("tipousuario")->insert([
            "id_tipo_usuario" => 5,
            "tipo_usuario" => "cliente",
            "descripcion" => "Usuario común"
        ]);
    }
}

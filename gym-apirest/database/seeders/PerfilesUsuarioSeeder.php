<?php

namespace Database\Seeders;

use App\Models\PerfilesUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilesUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PerfilesUsuario::factory()->count(10)->create();
    }
}

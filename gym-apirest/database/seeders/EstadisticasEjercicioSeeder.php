<?php

namespace Database\Seeders;

use App\Models\EstadisticasEjercicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadisticasEjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EstadisticasEjercicio::factory()->count(10)->create();
    }
}

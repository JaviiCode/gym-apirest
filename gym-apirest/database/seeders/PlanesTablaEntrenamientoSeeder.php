<?php

namespace Database\Seeders;

use App\Models\PlanesTablaEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class PlanesTablaEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanesTablaEntrenamiento::factory()->count(10)->create();
    }
}

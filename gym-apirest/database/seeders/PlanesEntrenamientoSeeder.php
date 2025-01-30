<?php

namespace Database\Seeders;

use App\Models\PlanesEntrenamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanesEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanesEntrenamiento::factory()->count(10)->create();
    }
}

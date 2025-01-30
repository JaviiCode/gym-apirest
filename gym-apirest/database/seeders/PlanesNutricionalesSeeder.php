<?php

namespace Database\Seeders;

use App\Models\PlanesNutricionales;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanesNutricionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlanesNutricionales::factory()->count(10)->create();
    }
}

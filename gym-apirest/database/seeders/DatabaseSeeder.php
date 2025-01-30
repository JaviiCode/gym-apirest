<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //llamadas a seeders - calls to seeders
        $this->call([
            TipoUsuarioSeeder::class,
            UsuariosSeeder::class,
            PerfilesUsuarioSeeder::class,
            SuscripcionesSeeder::class,
            PlanesEntrenamientoSeeder::class,
            TablasEntrenamientoSeeder::class,
            TipoMusculoSeeder::class,
            EjerciciosSeeder::class,
            TipoSerieSeeder::class,
            SeriesSeeder::class,
            EstadisticasEjercicioSeeder::class,
            EstadisticasClienteSeeder::class,
            PlanesTablaEntrenamientoSeeder::class,

        ]);


        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

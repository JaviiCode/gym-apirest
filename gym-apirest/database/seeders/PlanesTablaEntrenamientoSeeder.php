<?php

namespace Database\Seeders;

use App\Models\PlanesEntrenamiento;
use App\Models\PlanesNutricionales;
use App\Models\PlanesTablaEntrenamiento;
use App\Models\Series;
use App\Models\TablasEntrenamiento;
use App\Models\Usuarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class PlanesTablaEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 2; $i++) {
            $usuario = Usuarios::find($i);
            $planEntrenamiento = PlanesEntrenamiento::find(1);
            $planEntrenamiento->id_cliente=$i;
            $tablasEntrenamiento = TablasEntrenamiento::find(1);
            $planEntrenamiento->tablasEntrenamiento()->sync(1);
            $planNutricional = PlanesNutricionales::find(1);
            $planNutricional->id_cliente=$i;
            $series = Series::find(1);
            $series->id_tabla = 1;
            $usuario->save();
            $planEntrenamiento->save();
            $tablasEntrenamiento->save();
            $planNutricional->save();
            $series->save();
        }
    }
}

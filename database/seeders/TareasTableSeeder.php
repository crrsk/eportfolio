<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Seeder;

class TareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tarea::create([
            
            'criterios_evaluacion_id' => 1,
            'fecha_apertura' => now(),
            'fecha_cierre' => now()->addDays(7),
            'activo' => true,
            'observaciones' => 'Tarea de prueba 1',
        ]);

        Tarea::create([
            'criterios_evaluacion_id' => 1,
            'fecha_apertura' => now(),
            'fecha_cierre' => now()->addDays(10),
            'activo' => true,
            'observaciones' => 'Tarea de prueba 2',
        ]);
    }
}

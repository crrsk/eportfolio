<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'nombre' => 'administrador',
                'descripcion' => 'Acceso total al sistema'
            ],
            [
                'nombre' => 'docente',
                'descripcion' => 'Puede crear y editar contenido'
            ],
            [
                'nombre' => 'alumno',
                'descripcion' => 'Acceso básico al sistema'
            ]
        ]);
    }
}

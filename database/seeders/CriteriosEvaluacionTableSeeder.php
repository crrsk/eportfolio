<?php

namespace Database\Seeders;

use App\Models\CriterioEvaluacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriosEvaluacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
     {
        CriterioEvaluacion::truncate();
        foreach (self::$criterios_evaluacion as $criterio) {
            $c = new CriterioEvaluacion;
            $c->resultado_aprendizaje_id = $criterio['resultado_aprendizaje_id'];
            $c->codigo = $criterio['codigo'];
            $c->descripcion = $criterio['descripcion'];
            $c->peso_porcentaje = $criterio['peso_porcentaje'];
            $c->orden = $criterio['orden'];
            $c->save();
        }
        $this->command->info('Tabla catálogo inicializada con datos!');
    }
    private static $criterios_evaluacion = [
            // Resultado de Aprendizaje 1: Seleccionar arquitecturas y tecnologías de programación web
            [
                'resultado_aprendizaje_id' => 1, // Este ID se refiere al Resultado de Aprendizaje 1
                'codigo' => 'RA001_CE001',
                'descripcion' => 'Caracterizar y diferenciar los modelos de ejecución de código en el servidor y en el cliente web.',
                'peso_porcentaje' => 20,
                'orden' => 1,
            ],
            [
                'resultado_aprendizaje_id' => 1,
                'codigo' => 'RA001_CE002',
                'descripcion' => 'Reconocer las ventajas de la generación dinámica de páginas web.',
                'peso_porcentaje' => 25,
                'orden' => 2,
            ],
            [
                'resultado_aprendizaje_id' => 1,
                'codigo' => 'RA001_CE003',
                'descripcion' => 'Identificar los mecanismos de ejecución de código en servidores web.',
                'peso_porcentaje' => 20,
                'orden' => 3,
            ],
            [
                'resultado_aprendizaje_id' => 1,
                'codigo' => 'RA001_CE004',
                'descripcion' => 'Reconocer las funcionalidades que aportan los servidores de aplicaciones y su integración con los servidores web.',
                'peso_porcentaje' => 15,
                'orden' => 4,
            ],

            // Resultado de Aprendizaje 2: Escribir sentencias ejecutables por un servidor web
            [
                'resultado_aprendizaje_id' => 2, // Este ID se refiere al Resultado de Aprendizaje 2
                'codigo' => 'RA002_CE001',
                'descripcion' => 'Escribir sentencias ejecutables por un servidor web reconociendo y aplicando procedimientos de integración del código en lenguajes de marcas.',
                'peso_porcentaje' => 30,
                'orden' => 1,
            ],
            [
                'resultado_aprendizaje_id' => 2,
                'codigo' => 'RA002_CE002',
                'descripcion' => 'Utilizar las etiquetas adecuadas para la inclusión de código en un lenguaje de marcas.',
                'peso_porcentaje' => 20,
                'orden' => 2,
            ],
            [
                'resultado_aprendizaje_id' => 2,
                'codigo' => 'RA002_CE003',
                'descripcion' => 'Escribir sentencias simples y comprobar sus efectos en el documento resultante.',
                'peso_porcentaje' => 25,
                'orden' => 3,
            ],

            // Resultado de Aprendizaje 3: Escribir bloques de sentencias embebidos en lenguajes de marcas
            [
                'resultado_aprendizaje_id' => 3, // Este ID se refiere al Resultado de Aprendizaje 3
                'codigo' => 'RA003_CE001',
                'descripcion' => 'Crear bloques de sentencias usando estructuras de programación adecuadas como bucles y decisiones.',
                'peso_porcentaje' => 35,
                'orden' => 1,
            ],
            [
                'resultado_aprendizaje_id' => 3,
                'codigo' => 'RA003_CE002',
                'descripcion' => 'Utilizar matrices para almacenar y recuperar conjuntos de datos en un lenguaje de marcas.',
                'peso_porcentaje' => 25,
                'orden' => 2,
            ],
            [
                'resultado_aprendizaje_id' => 3,
                'codigo' => 'RA003_CE003',
                'descripcion' => 'Crear y utilizar funciones dentro de los bloques de sentencias embebidos.',
                'peso_porcentaje' => 20,
                'orden' => 3,
            ],
            [
                'resultado_aprendizaje_id' => 3,
                'codigo' => 'RA003_CE004',
                'descripcion' => 'Recuperar información introducida en formularios web y procesarla en el servidor.',
                'peso_porcentaje' => 20,
                'orden' => 4,
            ],
        ];

}

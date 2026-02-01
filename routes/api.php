<?php

use App\Http\Controllers\API\AsignacionRevisionController;
use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\ComentarioController;
use App\Http\Controllers\API\CriterioEvaluacionController;
use App\Http\Controllers\API\CriterioTareaController;
use App\Http\Controllers\API\FamiliaProfesionalController;
use App\Http\Controllers\API\ModuloFormativoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Tqdev\PhpCrudApi\Config\Config;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use App\Http\Controllers\API\EvidenciasController;
use App\Http\Controllers\API\TareaController;
use App\Http\Controllers\API\EvaluacionController;
use App\Http\Controllers\API\EvaluacionesEvidenciasController;
use App\Http\Controllers\API\MatriculaController;
use App\Http\Controllers\API\ResultadoAprendizajeController;
use App\Http\Controllers\CriteriosEvaluacionController;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


// Rutas /api/v1

Route::prefix('v1')->group(function () {

    //Rutas API Resource AsignacionRevision

    Route::apiResource('evidencias.asignaciones-revision', AsignacionRevisionController::class)
        ->parameters([
            'evidencias' => 'evidencia',
            'asignaciones-revision' => 'asignacionRevision'
        ]
    );

    Route::get('users/{id}/asignaciones-revision', [AsignacionRevisionController::class, 'getShow']);

    //Rutas API Resource CicloFormativo

    Route::apiResource('familias-profesionales.ciclos-formativos', CicloController::class)
        ->parameters([
            'familias-profesionales' => 'familiaProfesional',
            'ciclos-formativos' => 'ciclo'
        ]
    );

    //Rutas API Resource Comentarios

    Route::apiResource('evidencias.comentarios', ComentarioController::class)->parameters([
        'evidencias' => 'evidencia',
        'comentarios' => 'comentario'
        ]
    );

    //Rutas API Resource CriterioEvaluacion

    Route::apiResource('resultados-aprendizaje.criterios-evaluacion', CriterioEvaluacionController::class)
        ->parameters([
            'resultados-aprendizaje' => 'resultadoAprendizaje',
            'criterios-evaluacion' => 'criterioEvaluacion'
        ]
    );

    //Rutas API Resource EvaluacionEvidencia

    Route::apiResource('evidencias.evaluaciones-evidencias', EvaluacionesEvidenciasController::class)->parameters([
        'evaluaciones-evidencias' => 'evaluacionEvidencia'
        ]
    );

    //Rutas API Resource Evidencias

    Route::apiResource('tareas.evidencias', EvidenciasController::class)
        ->parameters([
            'tareas' => 'tarea',
            'evidencias' => 'evidencia'
        ]
    );

    //Rutas API Resource FamiliaProfesional

    Route::apiResource('familias-profesionales', FamiliaProfesionalController::class)
        ->parameters([
            'familias-profesionales' => 'familiaProfesional'
        ]
    );

    //Rutas API Resource Matriculas
    Route::get('modulos-formativos/{moduloFormativo}/matriculas', [MatriculaController::class, 'index']);
    Route::post('modulos-formativos/{moduloFormativo}/matriculas', [MatriculaController::class, 'store']);
    Route::get('modulos-matriculados', [MatriculaController::class, 'getModulosMatriculados'])->middleware('auth:sanctum');
    Route::post('matriculas', [MatriculaController::class, 'storeGeneral']);
    Route::get('modulos-formativos/{moduloFormativo}/matriculas/{matricula}', [MatriculaController::class, 'show']);
    Route::put('modulos-formativos/{moduloFormativo}/matriculas/{matricula}', [MatriculaController::class, 'update']);
    Route::delete('modulos-formativos/{moduloFormativo}/matriculas/{matricula}', [MatriculaController::class, 'destroy']);

    //Rutas API Resource ModuloFormativo

    Route::apiResource('ciclos-formativos.modulos-formativos', ModuloFormativoController::class)
        ->parameters([
            'ciclos-formativos' => 'cicloFormativo',
            'modulos-formativos' => 'moduloFormativo'
        ]
    );
    Route::get('modulos-impartidos', [ModuloFormativoController::class, 'index'])->middleware('auth:sanctum');
    //Rutas API Resource ResultadoAprendizaje
    Route::apiResource('modulos-formativos.resultados-aprendizaje', ResultadoAprendizajeController::class)
        ->parameters([
            'modulos-formativos' => 'moduloFormativo',
            'resultados-aprendizaje' => 'resultadoAprendizaje'
        ]
    );
    //Rutas API Resource Tareas
    Route::post('tareas', [TareaController::class, 'store']);
    Route::get('criterios-evaluacion/{criterioId}/tareas', [TareaController::class, 'index']);
    Route::get('resultados-aprendizaje/{resultadoId}/tareas', [TareaController::class, 'getTareasPorResultado']);
    Route::get('criterios-evaluacion/{criterioId}/tareas/{id}', [TareaController::class, 'show']);
    Route::put('tareas/{id}', [TareaController::class, 'update']);
    Route::delete('tareas/{id}', [TareaController::class, 'destroy']);




    Route::apiResource('criterios_tareas', CriterioTareaController::class)->parameters([
        'criterios_tareas' => 'criterioTarea'
        ]
    );
});


// Rutas PHP-CRUD-API



Route::any('/{any}', function (ServerRequestInterface $request) {
    $config = new Config([
        'address' => env('DB_HOST', 'mariadb'),
        'database' => env('DB_DATABASE', 'eportfolio'),
        'username' => env('DB_USERNAME', 'eportfolio'),
        'password' => env('DB_PASSWORD', 'eportfolio'),
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);

    try {
        $records = json_decode($response->getBody()->getContents())->records;
        $response = response()->json($records, 200, $headers = ['X-Total-Count' => count($records)]);
    } catch (\Throwable $th) {
    }
    return $response;
})->where('any', '.*');

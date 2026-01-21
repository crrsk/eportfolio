<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EvidenciasController;
use App\Http\Controllers\API\TareaController;
use App\Http\Controllers\API\EvaluacionController;
use App\Http\Controllers\API\EvaluacionesEvidenciasController;
use App\Http\Controllers\CriteriosEvaluacionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {


    Route::apiResource('tareas', TareaController::class)->parameters([
        'tareas' => 'tarea'
    ]);

    Route::apiResource('tareas.evidencias', EvidenciasController::class)
    ->parameters([
        'tareas' => 'tarea',
        'evidencias' => 'evidencia'
    ]);

    Route::apiResource('criterios-evaluacion.tareas', TareaController::class)->parameters([
        'criterios-evaluacion' => 'criterioEvaluacion',
        'tareas' => 'tarea'
    ]);

    Route::apiResource('evidencias.evaluaciones-evidencias', EvaluacionesEvidenciasController::class)->parameters([
        'evaluaciones-evidencias' => 'evaluacionEvidencia'
    ]);



});

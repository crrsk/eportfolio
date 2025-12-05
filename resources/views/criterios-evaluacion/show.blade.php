@extends('landed.master')
    @section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src='/landed/images/logo.png' style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Criterio de Evaluacion ID: </strong>{{ $criterioEvaluacion->resultado_aprendizaje_id}}</h3>
            <h4><strong>Codigo: </strong>
                <a href="http://github.com/2DAW-CarlosIII/{{ $criterioEvaluacion->codigo}}">
                    http://github.com/2DAW-CarlosIII/{{ $criterioEvaluacion->codigo }}
                </a>
            </h4>
            <h4><strong>Codigo: </strong>{{ $criterioEvaluacion->codigo}}</h4>
            <p><strong>Descripcion: </strong>{{ $criterioEvaluacion->descripcion }}</p>
            <p><strong>Peso Porcentaje: </strong>{{ $criterioEvaluacion->peso_porcentaje }}</p>
            <p><strong>Orden: </strong>{{ $criterioEvaluacion->orden }}</p>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CriteriosEvaluacionController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar criterio de evaluacion del alumno.
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CriteriosEvaluacionController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>
    @endsection

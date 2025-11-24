@extends('landed.master')
    @section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $familiaProfesional['nombre'] }}</h3>
            <h4><strong>Dominio: </strong>
                <a href="http://github.com/2DAW-CarlosIII/{{ $familiaProfesional['dominio'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $familiaProfesional['dominio'] }}
                </a>
            </h4>
            <h4><strong>Docente: </strong>{{ $familiaProfesional['docente_id'] }}</h4>
            <p><strong>Alumno: </strong>
                <ul>
                    @foreach ($familiaProfesional['alumno'] as $indice => $alumno)
                        <li>{{ $indice }}: {{ $alumno }}</li>
                    @endforeach
                </ul>
            </p>
            <p><strong>Calificacion: </strong>
                @if($familiaProfesional['alumno']['calificacion'] >= 5)
                    Alumno aprobado
                @else
                    Alumno suspenso
                @endif
            </p>

            @if($familiaProfesional['alumno']['calificacion'] >= 5)
                <a class="btn btn-danger" href="#">Suspender alumno</a>
            @else
                <a class="btn btn-primary" href="#">Aprobar alumno</a>
            @endif
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar calificacion del alumno.
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>
    @endsection

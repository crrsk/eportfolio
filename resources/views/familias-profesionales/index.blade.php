@extends('landed.master')
@section('content')
    <div class="row">
        @foreach ($familias_profesionales as $familiaProfesional)
            <div class="col-4 col-6-medium col-12-small">
                <section class="box">
                    <a href="#" class="image featured">
                        @if ($familiaProfesional->imagen)
                            <img width="300" style="height:300px" src="{{ Storage::url($familiaProfesional->imagen) }}"
                                alt="imagen" class="img-thumbnail">
                        @else
                            <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
                        @endif

                    </a>
                    <header>
                        <h3>{{ $familiaProfesional->nombre }}</h3>
                    </header>
                    <p>
                        <a href="http://github.com/2DAW-CarlosIII/{{ $familiaProfesional->codigo }}">
                            http://github.com/2DAW-CarlosIII/{{ $familiaProfesional->codigo }}
                        </a>
                    </p>
                    <footer>
                        <ul class="actions">
                            <li><a href="{{ action([App\Http\Controllers\FamiliasProfesionalesController::class, 'getShow'], ['id' => $familiaProfesional->id]) }}"
                                    class="button alt">Más info</a></li>
                        </ul>
                    </footer>
                </section>
            </div>
        @endforeach
    </div>
@endsection

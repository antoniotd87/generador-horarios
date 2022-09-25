@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5>Horarios</h5>
        </div>
        <div><a href="{{ route('horario.generador') }}" class="btn btn-sm btn-primary">Generar Horarios</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <h6>Horario Por Grupo</h6>
            <ul class="list-group ">
                @foreach ($grupos as $grupo)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>Grupo: {{ $grupo->grupo }}</div>
                            <div><a href="{{ route('horario.grupo', ['grupo' => $grupo->id]) }}"
                                    class="btn btn-sm btn-primary">Ver Horario</a></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h6>Horario Por Maestro</h6>
            <ul class="list-group ">
                @foreach ($maestros as $maestro)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>{{ $maestro->docente }}</div>
                            <div><a href="{{ route('horario.maestro', ['maestro' => $maestro->id]) }}"
                                    class="btn btn-sm btn-primary">Ver Horario</a></div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

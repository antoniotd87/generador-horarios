@extends('layouts.app')

@section('template_title')
    {{ $grupo->name ?? 'Show Grupo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Grupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Grupo:</strong>
                            {{ $grupo->grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $grupo->semestre->semestre }}
                        </div>
                        <div>
                            <strong>Jefe De Grupo:</strong>
                            {{ $grupo->jefe_de_grupo }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $grupo->total }}
                        </div>
                        <p>Lista de materias del grupo</p>
                        <ul class="list-group">
                            @foreach ($grupo->materiaGrupos as $materiaAsignada)
                                @php
                                    $docente = $grupo
                                        ->clases()
                                        ->where('materia_id', $materiaAsignada->materia_id)
                                        ->first();
                                @endphp
                                <li class="list-group-item">{{ $materiaAsignada->materia->materia }} <strong>Impartido
                                        por:</strong> {{ $docente ? $docente->maestro->docente : 'No especificado aun.' }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

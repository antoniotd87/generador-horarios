@extends('layouts.app')

@section('template_title')
    {{ $materiaGrupo->name ?? 'Show Materia Grupo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Materia Grupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materia-grupos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Materia Id:</strong>
                            {{ $materiaGrupo->materia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo Id:</strong>
                            {{ $materiaGrupo->grupo_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

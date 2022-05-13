@extends('layouts.app')

@section('template_title')
    {{ $horario->name ?? 'Show Horario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Horario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('horarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Maestro Id:</strong>
                            {{ $horario->maestro_id }}
                        </div>
                        <div class="form-group">
                            <strong>Materia Id:</strong>
                            {{ $horario->materia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Grupo Id:</strong>
                            {{ $horario->grupo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Id:</strong>
                            {{ $horario->hora_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dia Id:</strong>
                            {{ $horario->dia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

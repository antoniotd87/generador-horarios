@extends('layouts.app')

@section('template_title')
    {{ $horarioDisponible->name ?? 'Show Horario Disponible' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Horario Disponible</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('horario-disponibles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Maestro Id:</strong>
                            {{ $horarioDisponible->maestro_id }}
                        </div>
                        <div class="form-group">
                            <strong>Dia Id:</strong>
                            {{ $horarioDisponible->dia_id }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Id:</strong>
                            {{ $horarioDisponible->hora_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $materia->name ?? 'Show Materia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Materia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('materias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $materia->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Materia:</strong>
                            {{ $materia->materia }}
                        </div>
                        <div class="form-group">
                            <strong>Creditos:</strong>
                            {{ $materia->creditos }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{ $materia->carrera }}
                        </div>
                        <div class="form-group">
                            <strong>Horas:</strong>
                            {{ $materia->horas }}
                        </div>
                        <div class="form-group">
                            <strong>Semestre Id:</strong>
                            {{ $materia->semestre_id }}
                        </div>
                        <div class="form-group">
                            <strong>Especialidad:</strong>
                            {{ $materia->especialidad }}
                        </div>

                        grupos de la materia
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

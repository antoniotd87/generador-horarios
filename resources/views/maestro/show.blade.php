@extends('layouts.app')

@section('template_title')
    {{ $maestro->name ?? 'Show Maestro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Maestro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('maestros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Uid:</strong>
                            {{ $maestro->uid }}
                        </div>
                        <div class="form-group">
                            <strong>Docente:</strong>
                            {{ $maestro->docente }}
                        </div>
                        <div class="form-group">
                            <strong>Grado De Estudios:</strong>
                            {{ $maestro->grado_de_estudios }}
                        </div>
                        <div class="form-group">
                            <strong>Division:</strong>
                            {{ $maestro->division }}
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-5">
                                @livewire('clase', ['maestro' => $maestro], key($maestro->id))
                            </div>
                            <div class="col-md-7">
                                @livewire('horario-disponible', ['maestro' => $maestro], key($maestro->id))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

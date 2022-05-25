@extends('layouts.app')

@section('template_title')
    {{ $aula->name ?? 'Show Aula' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Aula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aulas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Aula:</strong>
                            {{ $aula->aula }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('template_title')
    {{ $semestre->name ?? 'Show Semestre' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Semestre</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('semestres.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Semestre:</strong>
                            {{ $semestre->semestre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

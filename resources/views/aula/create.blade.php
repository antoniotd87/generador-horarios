@extends('layouts.app')

@section('template_title')
    Create Aula
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Aula</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aulas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('aula.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

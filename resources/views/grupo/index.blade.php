@extends('layouts.app')

@section('template_title')
    Grupo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Grupo') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Grupo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Grupo</th>
                                        <th>Semestre</th>
                                        <th>Jefe de grupo</th>
                                        <th>Total de Alumnos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $grupo->grupo }}</td>
                                            <td>{{ $grupo->semestre->semestre }}</td>
                                            <td>{{ $grupo->jefe_de_grupo }}</td>
                                            <td>{{ $grupo->total }}</td>
                                            <td>
                                                <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('grupos.show', $grupo->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Ver Informacion</a>
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('grupos.edit', $grupo->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Editar</a>
                                                    <form action="{{ route('grupos.destroy', ['grupo' => $grupo->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    </form>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $grupos->links() !!}
            </div>
        </div>
    </div>
@endsection

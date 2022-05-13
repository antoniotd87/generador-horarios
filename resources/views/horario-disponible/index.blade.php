@extends('layouts.app')

@section('template_title')
    Horario Disponible
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Horario Disponible') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('horario-disponibles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>Maestro Id</th>
										<th>Dia Id</th>
										<th>Hora Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($horarioDisponibles as $horarioDisponible)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $horarioDisponible->maestro_id }}</td>
											<td>{{ $horarioDisponible->dia_id }}</td>
											<td>{{ $horarioDisponible->hora_id }}</td>

                                            <td>
                                                <form action="{{ route('horario-disponibles.destroy',$horarioDisponible->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('horario-disponibles.show',$horarioDisponible->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('horario-disponibles.edit',$horarioDisponible->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $horarioDisponibles->links() !!}
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5>Horario del docente: {{ $maestro->docente }}</h5>
        </div>
        <div>
            <a href="{{ route('descargar.horario.maestro', ['maestro' => $maestro->id]) }}"
                class="btn btn-sm btn-primary" target="_blank">Descargar Horario</a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Hora</th>
                        @foreach ($dias as $dia)
                            <th scope="col" class="text-center">{{ $dia->dia }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horas as $hora)
                        <tr>
                            @php
                                $hourStart = \Carbon\Carbon::parse(substr($hora->hora, 0, -3))->format('g:i A');
                                $hourEnd = \Carbon\Carbon::parse(substr($hora->hora, 0, -3))
                                    ->addHour()
                                    ->format('g:i A');
                            @endphp
                            <th scope="row" class="text-center">{{ $hourStart . ' - ' . $hourEnd }}</th>
                            @foreach ($dias as $dia)
                                @php
                                    $claseAsignada = false;
                                    $clase = '';
                                @endphp
                                @foreach ($maestro->horarios as $horario)
                                    @if ($horario->dia_id == $dia->id && $horario->hora_id == $hora->id)
                                        @php
                                            $claseAsignada = true;
                                            $clase = $horario;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($claseAsignada)
                                    <th scope="col" class="text-center">
                                        <div>
                                            <p class="m-0">{{ $clase->materia->materia }}</p>
                                            <span>Grupo: {{ $clase->grupo->grupo }}</span>
                                            <span>{{ $clase->aula->aula }}</span>
                                        </div>
                                    </th>
                                @else
                                    <th scope="col" class="text-center "></th>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

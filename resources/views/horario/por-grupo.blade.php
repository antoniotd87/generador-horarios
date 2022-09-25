@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h5>Horario del grupo {{ $grupo->grupo }}</h5>
        </div>
        <div><a href="{{ route('descargar.horario.grupo', ['grupo' => $grupo->id]) }}" class="btn btn-sm btn-primary"
                target="_blank">Descargar Horario</a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
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

                                @foreach ($grupo->horario as $horario)
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
                                            <h6 class="m-0"><strong>{{ $clase->materia->materia }}</strong></h6>
                                            <span class="m-0">{{ $clase->maestro->docente }}</span>
                                            <span class="m-0">{{ $clase->aula->aula }}</span>
                                        </div>
                                    </th>
                                @else
                                    <th scope="col" class="text-center"></th>
                                @endif
                            @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

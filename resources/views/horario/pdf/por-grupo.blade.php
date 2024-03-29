<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div>
    <h3 style="font-size: 21px;" class="text-center">Horario del grupo {{ $grupo->grupo }}</h3>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center" style="font-size: 11px; padding: 0; margin: 0;">Hora</th>
            @foreach ($dias as $dia)
                <th scope="col" class="text-center" style="width: 180px; font-size: 11px; padding: 0; margin: 0;">
                    {{ $dia->dia }}</th>
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

                <th scope="row" class="text-center" style="font-size: 9px;padding: 03px; margin: 0;">
                    {{ $hourStart }} A {{ $hourEnd }}</th>
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
                        <th scope="col" class="text-center" style="width: 180px; padding: 0; margin: 0;">
                            <div style="padding: 0px 10px; margin: 0;">
                                <p style="font-size: 10px;padding: 0; margin: 0;">{{ $clase->materia->materia }}</p>
                                <p style="font-size: 8px;padding: 0; margin: 0;">{{ $clase->maestro->docente }}</p>
                                <p style="font-size: 7px;padding: 0; margin: 0;">{{ $clase->aula->aula }}</p>
                            </div>
                        </th>
                    @else
                        <th scope="col" class="text-center" style="width: 180px; padding: 0; margin: 0;"></th>
                    @endif
                @endforeach

            </tr>
        @endforeach
    </tbody>
</table>

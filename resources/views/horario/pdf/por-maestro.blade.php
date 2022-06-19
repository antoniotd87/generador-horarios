<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>


<p style="font-size: 15px; text-align: center;margin: 0;">TECNOLOGICO DE ESTUDIOS SUPERIORES DE SAN FELIPE DEL
    PROGRESO</p>
<p style="font-size: 9px; text-align: center">Organismo Publico Descentralizado del Gobierno del Estado de Mexico
</p>
<p style="font-size: 11px; text-align: center; margin: 0;">"2022. Año del Quincentenario de la Fundacion de Toluca
    de Lerdo, Capital del Estado de Mexico"</p>
<p style="font-size: 13px; text-align: center; margin: 0;">EL PRESENTE HORARIO CORRESPONDE AL SEMESTRE MARZO-JUNIO
    2022</p>
<br>
<table style="width: 100%">
    <tbody>
        <tr>
            <td colspan="2" style="text-align: center">
                <p style="margin: 0; font-size: 14px;"> PROFESOR (A): {{ $maestro->docente }}</p>
            </td>
            <td colspan="1" style=" text-align: right">
                <p style="margin: 0; font-size: 8px;">Edicion 3</p>
                <p style="margin: 0; font-size: 8px;">Codigo:</p>
                <p style="margin: 0; font-size: 8px;">FECHA: 8 de Febredo de 2022</p>
                <p style="margin: 0; font-size: 10px; padding: 0; border: 1px solid #000000; width: auto;">AREA: <span
                        style="margin:0;border-left: 1px solid #000000;padding: 4px 6px">DIVISION DE INGENIERIA
                        INFORMATICA</span></p>
            </td>
        </tr>
    </tbody>
</table>
<table style="width: 100%; font-size: 12px" border="1">
    <thead>
        <tr>
            <th>NO.</th>
            <th>MATERIA</th>
            <th>GRUPO</th>
            <th>HORAS</th>
            @foreach ($dias as $dia)
                <th>{{ Str::upper($dia->dia) }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($maestro->clases as $clase)
            <tr style="text-align: center">
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>
                    {{ $clase->materia->materia }}
                </td>
                <td>
                    {{ $clase->grupo->grupo }}
                </td>
                <td>
                    {{ $clase->materia->horas }}
                </td>
                @foreach ($dias as $dia)
                    @php
                        $horasClase = '';
                        $inicio = false;
                        $horainicio = false;
                        $horafin = false;
                        $horaf = '';
                    @endphp
                    <td>
                        @foreach ($maestro->horarios()->where('dia_id', $dia->id)->orderby('hora_id', 'ASC')->get()
    as $horario)
                            @if ($clase->materia_id == $horario->materia_id && $clase->grupo_id == $horario->grupo_id)
                                @php
                                    if (!$inicio) {
                                        $horainicio = $horario->hora->hora;
                                        $inicio = true;
                                    } else {
                                        $horafin = $horario->hora->hora;
                                    }
                                @endphp
                            @endif
                        @endforeach
                        @if ($inicio)
                            @php

                                foreach ($horas as $hora) {
                                    if ($hora->id == $horario->hora_id + 1) {
                                        $horaf = $hora->hora;
                                    }
                                }
                            @endphp
                            <p>{{ $horainicio . ' - ' . $horaf }}</p>
                        @endif
                        @php
                            $horasClase = '';
                            $inicio = false;
                            $horainicio = false;
                            $horafin = false;
                            $horaf = '';
                        @endphp
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
{{-- <table class="table">
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
                <th scope="row" class="text-center">{{ $hora->hora }}</th>
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
</table> --}}

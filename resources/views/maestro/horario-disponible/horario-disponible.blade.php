<div>
    <div class="d-flex justify-content-between">
        <div>
            <h4>Horario Disponible</h4>
        </div>
        <div>
            @if (session()->has('message'))
                <div wire:poll.2s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                    {{ session('message') }} </div>
            @endif
        </div>
    </div>
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
                    <th scope="row" class="text-center">{{ $hora->hora }}</th>
                    @foreach ($dias as $dia)
                        @php
                            $disponible = false;
                        @endphp
                        @foreach ($horarioDisponibles as $item)
                            @if ($item->dia_id == $dia->id && $item->hora_id == $hora->id)
                                @php
                                    $disponible = true;
                                @endphp
                            @endif
                        @endforeach
                        @if ($disponible)
                            <th scope="col" class="text-center"><span class="badge badge-success"
                                    wire:click="cambiarDisponibilidad({{ $dia }},{{ $hora }})">Disponible</span>
                            </th>
                        @else
                            <th scope="col" class="text-center"><span class="badge badge-danger"
                                    wire:click="cambiarDisponibilidad({{ $dia }},{{ $hora }})">No
                                    Disponible</span></th>
                        @endif
                    @endforeach

                </tr>
            @endforeach

        </tbody>
    </table>
    <style>
        span:hover {
            cursor: pointer;
        }

    </style>
</div>

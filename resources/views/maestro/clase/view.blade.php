<div>
    <div class="d-flex justify-content-between">
        <div>
            <h4>Clases Asignadas</h4>
        </div>
        <div>
            @if (session()->has('message'))
                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                    {{ session('message') }} </div>
            @endif
            <a class="btn btn-sm btn-info" href="{{ route('clases.create', ['maestro' => $maestro->id]) }}">
                <i class="fa fa-plus"></i> Agregar Clase
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead class="thead">
                <tr>
                    <td>#</td>
                    <th>Materia</th>
                    <th>Grupo</th>
                    <td>ACTIONS</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($clases as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->materia->materia }}</td>
                        <td>{{ $row->grupo->grupo }}</td>
                        <td class="d-flex justify-content-around">


                            <a class="btn btn-sm btn-warning px-1"
                                href="{{ route('clases.edit', ['clase' => $row->id, 'maestro' => $maestro->id]) }}"><i
                                    class="fa fa-edit"></i>
                                Editar </a>
                            <a class="btn btn-sm btn-danger px-1"
                                onclick="confirm('Desea eliminar esta clase? \nEsto no se puede revertir!')||event.stopImmediatePropagation()"
                                wire:click="destroy({{ $row->id }})"><i class="fa fa-trash"></i>
                                Eliminar
                            </a>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{ $clases->links() }}
    </div>
</div>

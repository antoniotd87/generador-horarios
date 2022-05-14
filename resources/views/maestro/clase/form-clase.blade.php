<div>
    <div class="form-group">
        <label for="">Semestre</label>
        <select class="form-control" wire:model='semestreSeleccionado'>
            <option value="">Seleccione...</option>
            @foreach ($semestres as $item)
                <option value="{{ $item->id }}" {{ $clase->grupo->semestre_id == $item->id ?'selected':'' }}>{{ $item->semestre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Grupo</label>
        <select name="grupo_id" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($grupos as $item)
                <option value="{{ $item->id }}" {{ $clase->grupo_id == $item->id ?'selected':'' }}>{{ $item->grupo }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Materias</label>
        <select name="materia_id" class="form-control">
            <option value="">Seleccione...</option>
            @foreach ($materias as $item)
                <option value="{{ $item->id }}" {{ $clase->materia_id == $item->id ?'selected':'' }}>{{ $item->materia }}</option>
            @endforeach
        </select>
    </div>
</div>

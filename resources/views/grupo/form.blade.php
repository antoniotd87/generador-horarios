<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('grupo') }}
            {{ Form::text('grupo', $grupo->grupo, ['class' => 'form-control' . ($errors->has('grupo') ? ' is-invalid' : ''), 'placeholder' => 'Grupo']) }}
            {!! $errors->first('grupo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Semestre') }}
            <select name="semestre_id" class="form-control">
                <option value="">Seleccione</option>
                @foreach ($semestres as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $grupo->semestre_id ? 'selected' : '' }}>
                        {{ $item->semestre }}</option>
                @endforeach
            </select>
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

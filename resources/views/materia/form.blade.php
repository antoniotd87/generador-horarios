<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $materia->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('materia') }}
            {{ Form::text('materia', $materia->materia, ['class' => 'form-control' . ($errors->has('materia') ? ' is-invalid' : ''), 'placeholder' => 'Materia']) }}
            {!! $errors->first('materia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('creditos') }}
            {{ Form::text('creditos', $materia->creditos, ['class' => 'form-control' . ($errors->has('creditos') ? ' is-invalid' : ''), 'placeholder' => 'Creditos']) }}
            {!! $errors->first('creditos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('carrera') }}
            {{ Form::text('carrera', $materia->carrera, ['class' => 'form-control' . ($errors->has('carrera') ? ' is-invalid' : ''), 'placeholder' => 'Carrera']) }}
            {!! $errors->first('carrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horas') }}
            {{ Form::text('horas', $materia->horas, ['class' => 'form-control' . ($errors->has('horas') ? ' is-invalid' : ''), 'placeholder' => 'Horas']) }}
            {!! $errors->first('horas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semestre') }}
            <select name="semestre_id" class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($semestres as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $materia->semestre_id ? 'selected' : '' }}>
                        {{ $item->semestre }}</option>
                @endforeach
            </select>
            {!! $errors->first('semestre_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('especialidad') }}
            {{ Form::text('especialidad', $materia->especialidad, ['class' => 'form-control' . ($errors->has('especialidad') ? ' is-invalid' : ''), 'placeholder' => 'Especialidad']) }}
            {!! $errors->first('especialidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('maestro_id') }}
            {{ Form::text('maestro_id', $horarioDisponible->maestro_id, ['class' => 'form-control' . ($errors->has('maestro_id') ? ' is-invalid' : ''), 'placeholder' => 'Maestro Id']) }}
            {!! $errors->first('maestro_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dia_id') }}
            {{ Form::text('dia_id', $horarioDisponible->dia_id, ['class' => 'form-control' . ($errors->has('dia_id') ? ' is-invalid' : ''), 'placeholder' => 'Dia Id']) }}
            {!! $errors->first('dia_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_id') }}
            {{ Form::text('hora_id', $horarioDisponible->hora_id, ['class' => 'form-control' . ($errors->has('hora_id') ? ' is-invalid' : ''), 'placeholder' => 'Hora Id']) }}
            {!! $errors->first('hora_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
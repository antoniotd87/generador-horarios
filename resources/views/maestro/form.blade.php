<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('UID') }}
            {{ Form::text('uid', $maestro->uid, ['class' => 'form-control' . ($errors->has('uid') ? ' is-invalid' : ''), 'placeholder' => 'Uid']) }}
            {!! $errors->first('uid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('docente') }}
            {{ Form::text('docente', $maestro->docente, ['class' => 'form-control' . ($errors->has('docente') ? ' is-invalid' : ''), 'placeholder' => 'Docente']) }}
            {!! $errors->first('docente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('grado_de_estudios') }}
            {{ Form::text('grado_de_estudios', $maestro->grado_de_estudios, ['class' => 'form-control' . ($errors->has('grado_de_estudios') ? ' is-invalid' : ''), 'placeholder' => 'Grado De Estudios']) }}
            {!! $errors->first('grado_de_estudios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('división') }}
            {{ Form::text('division', $maestro->division, ['class' => 'form-control' . ($errors->has('division') ? ' is-invalid' : ''), 'placeholder' => 'Division']) }}
            {!! $errors->first('division', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

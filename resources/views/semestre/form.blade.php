<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('semestre') }}
            {{ Form::text('semestre', $semestre->semestre, ['class' => 'form-control' . ($errors->has('semestre') ? ' is-invalid' : ''), 'placeholder' => 'Semestre']) }}
            {!! $errors->first('semestre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
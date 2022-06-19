<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('maestro') }}
            <input type="hidden" name="maestro_id" value="{{ $maestro->id }}">
            <input type="text" class="form-control" disabled value="{{ $maestro->docente }}">
        </div>
        @livewire('form-clase', ['clase'=>$clase])

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</div>

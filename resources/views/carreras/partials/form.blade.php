<div class="row">

    <div class="form-group col-md-6 col-12 {{ $errors->has('clave')? 'has-error':'' }}">
        {!! Form::label('clave','Clave') !!}
        {!!
            Form::text('clave',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Clave',
            ])
         !!}

        @if($errors->has('clave'))
            <span class="help-block">
                <strong>{{ $errors->first('instructor') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group  col-md-6 col-12 {{ $errors->has('nombre')? 'has-error':'' }}">
        {!! Form::label('nombre','Nombre') !!}
        {!!
            Form::text('nombre',
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Nombre',
            ])
         !!}

        @if($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <button type="submit" id="btnEnviar" class="btn btn-danger">
        Guardar
    </button>
</div>


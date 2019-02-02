<div class="row">

    <div class="form-group col-md-6 col-12 {{ $errors->has('name')? 'has-error':'' }}">
        {!! Form::label('name','Usuario') !!}
        {!!
            Form::text('name',
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Nombre',
            ])
         !!}

        @if($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group  col-md-6 col-12 {{ $errors->has('nombre')? 'has-error':'' }}">
        {!! Form::label('email','Correo') !!}
        {!!
            Form::text('email',
            null,
            [
                'required',
                'class' => 'form-control',
                'placeholder' => 'Correo',
            ])
         !!}

        @if($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group">
    <button type="submit" id="btnEnviar" class="btn btn-danger">
        Guardar
    </button>
</div>

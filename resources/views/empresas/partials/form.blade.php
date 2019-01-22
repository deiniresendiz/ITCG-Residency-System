
<div class="form-group {{ $errors->has('nombre')? 'has-error':'' }}">
    {!! Form::label('nombre','Nombre') !!}
    {!!
        Form::text('nombre',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('nombre') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('descripcion')? 'has-error':'' }}">
    {!! Form::label('descripcion','Descripcion') !!}
    {!!
        Form::textarea('descripcion',
        null,
        [
            'class' => 'form-control',
            'placeholder' => 'Descripcion',
            'maxlength' => 5000,
            'autocomplete' => 'off'
        ])
     !!}

    @if($errors->has('descripcion'))
        <span class="help-block">
            <strong>{{ $errors->first('descripcion') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('estado_id') ? 'has-error': '' }}">
    {!! Form::label('estado_id','Estado') !!}

    {!!
        Form::select('estado_id',
            $state,
            null,
            [
                'placeholder' => 'Selecciona un estado',
                'required',
                'class' => 'form-control',
                'id' => 'stateEmpresa'
            ]
        )
     !!}

    @if($errors->has('estado_id'))
        <span class="help-block">
            <strong>{{ $errors->first('estado_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{$errors->has('ciudad_id') ? 'has-error': '' }}">
    {!! Form::label('ciudad_id','Ciudad') !!}

    {!!
        Form::select('ciudad_id',
            ['placeholder' => 'Selecciona un estado'],
            null,
            [

                'required',
                'class' => 'form-control',
                'id' => 'townEmpresa'
            ]
        )
     !!}

    @if($errors->has('ciudad_id'))
        <span class="help-block">
            <strong>{{ $errors->first('ciudad_id') }}</strong>
        </span>
    @endif
</div>


<div class="form-group {{ $errors->has('domicilio')? 'has-error':'' }}">
    {!! Form::label('domicilio','Domicilio') !!}
    {!!
        Form::text('domicilio',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('domicilio'))
        <span class="help-block">
            <strong>{{ $errors->first('domicilio') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('telefono')? 'has-error':'' }}">
    {!! Form::label('telefono','Telefono') !!}
    {!!
        Form::text('telefono',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('telefono'))
        <span class="help-block">
            <strong>{{ $errors->first('telefono') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('contacto')? 'has-error':'' }}">
    {!! Form::label('contacto','Contracto') !!}
    {!!
        Form::text('contacto',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('contacto'))
        <span class="help-block">
            <strong>{{ $errors->first('contacto') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('imagen') ? 'has-error': '' }}">
    {!! Form::label('imagen','Imagen') !!}

    {!!
        Form::file('imagen',
            [
                'class' => 'form-control',
            ]
        )
     !!}

    @if($errors->has('image'))
        <span class="help-block">
            <strong>{{ $errors->first('imagen') }}</strong>
        </span>
    @endif

</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">
        Guardar
    </button>
</div>


@section('script')
    <script type="text/javascript" >
        jQuery(function ($) {
            $('#townEmpresa').select2({
                placeholder:'Seleccione una Categoria',
                tags:true,
                tokenSeparators:[',']
            });
        });

    </script>
@endsection

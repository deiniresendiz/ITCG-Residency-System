
<div class="form-group {{ $errors->has('puesto')? 'has-error':'' }}">
    {!! Form::label('puesto','Puesto') !!}
    {!!
        Form::text('puesto',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('puesto'))
        <span class="help-block">
            <strong>{{ $errors->first('puesto') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('empresa_id') ? 'has-error': '' }}">
    {!! Form::label('empresa_id','Empresa') !!}

    {!!
        Form::select('empresa_id',
            $empresas,
            null,
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('empresa_id'))
        <span class="help-block">
            <strong>{{ $errors->first('empresa_id') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('area_id') ? 'has-error': '' }}">
    {!! Form::label('area_id','Area Profesional') !!}

    {!!
        Form::select('area_id',
            $areas,
            null,
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('area_id'))
        <span class="help-block">
            <strong>{{ $errors->first('area_id') }}</strong>
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
                'id' => 'stateTraajos'
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
                'id' => 'townTrabajos'
            ]
        )
     !!}

    @if($errors->has('ciudad_id'))
        <span class="help-block">
            <strong>{{ $errors->first('ciudad_id') }}</strong>
        </span>
    @endif
</div>


<div class="form-group {{ $errors->has('tipo')? 'has-error':'' }}">
    {!! Form::label('tipo','Tipo') !!}
    {!!
        Form::text('tipo',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('tipo'))
        <span class="help-block">
            <strong>{{ $errors->first('tipo') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('fecha') ? 'has-error': '' }}">
    {!! Form::label('fecha','Fecha') !!}
    {!!
        Form::date('fecha',
            ($trabajo->fecha? $trabajo->fecha : date('Y-m-d')),
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('fecha'))
        <span class="help-block">
            <strong>{{ $errors->first('fecha') }}</strong>
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
<div class="form-group {{ $errors->has('requisitos')? 'has-error':'' }}">
    {!! Form::label('requisitos','Requisitos') !!}
    {!!
        Form::textarea('requisitos',
        null,
        [
            'class' => 'form-control',
            'placeholder' => 'Requisitos',
            'maxlength' => 5000,
            'autocomplete' => 'off'
        ])
     !!}

    @if($errors->has('requisitos'))
        <span class="help-block">
            <strong>{{ $errors->first('requisitos') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('contracto')? 'has-error':'' }}">
    {!! Form::label('contracto','Contracto') !!}
    {!!
        Form::text('contracto',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('contracto'))
        <span class="help-block">
            <strong>{{ $errors->first('contracto') }}</strong>
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
<div class="form-group {{ $errors->has('email')? 'has-error':'' }}">
    {!! Form::label('email','Email') !!}
    {!!
        Form::text('email',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('domicilio')? 'has-error':'' }}">
    {!! Form::label('domicilio','Domiclio') !!}
    {!!
        Form::text('domicilio',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('domicilio'))
        <span class="help-block">
            <strong>{{ $errors->first('domicilio') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('sueldo')? 'has-error':'' }}">
    {!! Form::label('sueldo','Sueldo') !!}
    {!!
        Form::text('sueldo',
        null,
        [
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('sueldo'))
        <span class="help-block">
            <strong>{{ $errors->first('sueldo') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('estado') ? 'has-error': '' }}">
    {!! Form::label('estado','Estado del curso') !!}

    {!!
        Form::select('estado',
            ['Disponible' => 'Disponible', 'Ocupado' => 'Ocupado',],
            null,
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('estado'))
        <span class="help-block">
            <strong>{{ $errors->first('estado') }}</strong>
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
            $('#townTrabajos').select2({
                placeholder:'Seleccione una ciudad',
                tags:true,
                tokenSeparators:[','],
                disabled: true
            });
            $('#stateTraajos').select2({
                placeholder:'Seleccione un Estado',
            });
            $('#area_id').select2({
                placeholder:'Seleccione el Area Profesional',
            });
            $('#empresa_id').select2({
                placeholder:'Seleccione una empresa',
            });
        });

    </script>
@endsection


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
            'required',
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
<div class="form-group {{ $errors->has('instructor')? 'has-error':'' }}">
    {!! Form::label('instructor','Instructor') !!}
    {!!
        Form::text('instructor',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('instructor'))
        <span class="help-block">
            <strong>{{ $errors->first('instructor') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('lugar')? 'has-error':'' }}">
    {!! Form::label('lugar','Lugar') !!}
    {!!
        Form::text('lugar',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('lugar'))
        <span class="help-block">
            <strong>{{ $errors->first('lugar') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('fecha_inicio') ? 'has-error': '' }}">
    {!! Form::label('fecha_inicio','Fecha de inicio') !!}
    {!!
        Form::date('fecha_inicio',
            ($curso->fecha_inicio? $curso->fecha_inicio : date('Y-m-d')),
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('fecha_inicio'))
        <span class="help-block">
            <strong>{{ $errors->first('fecha_inicio') }}</strong>
        </span>
    @endif

</div>
<div class="form-group {{$errors->has('fecha_final') ? 'has-error': '' }}">
    {!! Form::label('fecha_final','Fecha de terminacion') !!}
    {!!
        Form::date('fecha_final',
            ($curso->fecha_final? $curso->fecha_final : date('Y-m-d')),
            [
                'required',
                'class' => 'form-control'
            ]
        )
     !!}

    @if($errors->has('fecha_final'))
        <span class="help-block">
            <strong>{{ $errors->first('fecha_final') }}</strong>
        </span>
    @endif

</div>
<div class="form-group {{ $errors->has('precio')? 'has-error':'' }}">
    {!! Form::label('precio','Precio') !!}
    {!!
        Form::text('precio',
        null,
        [
            'required',
            'class' => 'form-control'
        ])
     !!}

    @if($errors->has('nombre'))
        <span class="help-block">
            <strong>{{ $errors->first('precio') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{$errors->has('estado') ? 'has-error': '' }}">
    {!! Form::label('estado','Estado del curso') !!}

    {!!
        Form::select('estado',
            ['Activo' => 'Activo', 'Terminado' => 'Terminado',],
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


<span class="mr-3 text-danger ">Campos requeridos *</span>
<div class="row">
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('puesto')? 'has-error':'' }}">
        {!! Form::label('puesto','Puesto *') !!}
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('empresa_id') ? 'has-error': '' }}">
        {!! Form::label('empresa_id','Empresa *') !!}

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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('area_id') ? 'has-error': '' }}">
        {!! Form::label('area_id','Area Profesional *') !!}

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

    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('estado_id') ? 'has-error': '' }}">
        {!! Form::label('estado_id','Estado *') !!}

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

    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('ciudad_id') ? 'has-error': '' }}">
        {!! Form::label('ciudad_id','Ciudad *') !!}

        {!!
            Form::select('ciudad_id',
                $town,
                null,
                [
                    'placeholder' => 'Selecciona una Ciudad',
                    'required',
                    'class' => 'form-control',
                    'id' => 'townTrabajos',
                    'min' => '4'
                ]
            )
         !!}

        @if($errors->has('ciudad_id'))
            <span class="help-block">
                <strong>{{ $errors->first('ciudad_id') }}</strong>
            </span>
        @endif
    </div>


    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('domicilio')? 'has-error':'' }}">
        {!! Form::label('domicilio','Domiclio *') !!}
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('tipo')? 'has-error':'' }}">
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('contracto')? 'has-error':'' }}">
        {!! Form::label('contracto','Contracto *') !!}
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('telefono')? 'has-error':'' }}">
        {!! Form::label('telefono','Telefono *') !!}
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('email')? 'has-error':'' }}">
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

    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('sueldo')? 'has-error':'' }}">
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('estado') ? 'has-error': '' }}">
        {!! Form::label('estado','Estado del Empleao *') !!}

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

</div>

<div class="row">
    <div class="form-group col-12 col-sm-6 {{ $errors->has('descripcion')? 'has-error':'' }}">
        {!! Form::label('descripcion','Descripcion *') !!}
        {!!
            Form::textarea('descripcion',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Descripcion',
                'maxlength' => 5000,
                'autocomplete' => 'off',
                'rows' => '3'
            ])
         !!}

        @if($errors->has('descripcion'))
            <span class="help-block">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-12 col-sm-6 {{ $errors->has('requisitos')? 'has-error':'' }}">
        {!! Form::label('requisitos','Requisitos *') !!}
        {!!
            Form::textarea('requisitos',
            null,
            [
                'class' => 'form-control',
                'placeholder' => 'Requisitos',
                'maxlength' => 5000,
                'autocomplete' => 'off',
                'rows' => '3'
            ])
         !!}

        @if($errors->has('requisitos'))
            <span class="help-block">
                <strong>{{ $errors->first('requisitos') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">

    <div class="form-group col-12 col-sm-6 {{$errors->has('fecha') ? 'has-error': '' }}">
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
    <div class="form-group col-12 col-sm-6 {{$errors->has('imagen') ? 'has-error': '' }}">
        {!! Form::label('imagen','Imagen') !!}

        {!!
            Form::file('imagen',
                [
                    'class' => 'form-control-file',
                    'id' => 'image',
                    'onchange' => 'return fileValidation()'
                ]
            )
         !!}

        @if($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('imagen') }}</strong>
            </span>
        @endif

    </div>
</div>
@if($trabajo->estado_id)
    <input type="text" value="{{ $trabajo->estado_id->estado_id }}" hidden id="id_estado">
@endif
<div class="form-group">
    <button type="submit" class="btn btn-danger">
        Guardar
    </button>
</div>

<script type="application/javascript">
    function fileValidation(){
        var fileInput = document.getElementById('image');
        var filePath = fileInput.value;
        var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Por favor, Solo subir imagenes con extension .jpeg/.jpg/.png/.gif');
            fileInput.value = '';
            return false;
        }else{
            //Image preview
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }
</script>



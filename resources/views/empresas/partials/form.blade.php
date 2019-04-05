<span class="mr-3 text-danger ">Campos requeridos *</span>
<div class="form-group {{ $errors->has('nombre')? 'has-error':'' }}">
    {!! Form::label('nombre','Nombre *') !!}
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
<div class="row">
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
                    'id' => 'townEmpresa',
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
        {!! Form::label('domicilio','Domicilio *') !!}
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

    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('contacto')? 'has-error':'' }}">
        {!! Form::label('contacto','Contracto *') !!}
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('imagen') ? 'has-error': '' }}">
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
@if($empresa->estado_id)
    <input type="text" value="{{ $empresa->estado_id->estado_id }}" hidden id="id_estado">
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



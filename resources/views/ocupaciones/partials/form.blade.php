<span class="mr-3 text-danger ">Campos requeridos *</span>
<div class="row">
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
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('antiguedad')? 'has-error':'' }}">
        {!! Form::label('antiguedad','Antiguedad') !!}
        {!!
            Form::text('antiguedad',
            null,
            [
                'class' => 'form-control'
            ])
         !!}

        @if($errors->has('antiguedad'))
            <span class="help-block">
                <strong>{{ $errors->first('antiguedad') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-12 col-sm-12 {{ $errors->has('descripcion')? 'has-error':'' }}">
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

</div>

<div class="form-group">
    <button type="submit" class="btn btn-danger">
        Guardar
    </button>
</div>




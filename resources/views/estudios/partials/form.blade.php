<span class="mr-3 text-danger ">Campos requeridos *</span>
<div class="row">
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('posgrado_id') ? 'has-error': '' }}">
        {!! Form::label('posgrado_id','Posgrado *') !!}

        {!!
            Form::select('posgrado_id',
                $prosgrados,
                null,
                [
                    'required',
                    'class' => 'form-control'
                ]
            )
         !!}

        @if($errors->has('posgrado_id'))
            <span class="help-block">
                <strong>{{ $errors->first('posgrado_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-12 col-sm-6 col-lg-4 {{ $errors->has('instituto')? 'has-error':'' }}">
        {!! Form::label('instituto','Instituto *') !!}
        {!!
            Form::text('instituto',
            null,
            [
                'required',
                'class' => 'form-control'
            ])
         !!}

        @if($errors->has('instituto'))
            <span class="help-block">
                <strong>{{ $errors->first('instituto') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col-12 col-sm-6 col-lg-4 {{$errors->has('nivel') ? 'has-error': '' }}">
        {!! Form::label('nivel','Nivel *') !!}

        {!!
            Form::select('nivel',
                ['Diplomado' => 'Diplomado', 'Maestria' => 'Maestria', 'Doctorado' => 'Doctorado'],
                null,
                [
                    'required',
                    'class' => 'form-control'
                ]
            )
         !!}

        @if($errors->has('nivel'))
            <span class="help-block">
                <strong>{{ $errors->first('nivel') }}</strong>
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
    <div class="form-group col-md-6 col-12 col-xl-6 {{$errors->has('fecha_inicio') ? 'has-error': '' }}">
        {!! Form::label('fecha_inicio','Fecha de Inicio *') !!}
        {!!
            Form::date('fecha_inicio',
                ($estudio->fecha_inicio? $estudio->fecha_inicio : date('Y-m-d')),
                [
                    'class' => 'form-control',

                ]
            )
         !!}

        @if($errors->has('fecha_inicio'))
            <span class="help-block">
            <strong>{{ $errors->first('fecha_inicio') }}</strong>
        </span>
        @endif

    </div>
    <div class="form-group col-md-6 col-12  col-xl-6 {{$errors->has('fecha_final') ? 'has-error': '' }}">
        {!! Form::label('fecha_final','Fecha de Terminacion *') !!}
        {!!
            Form::date('fecha_final',
                ($estudio->fecha_final? $estudio->fecha_final : date('Y-m-d')),
                [
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

</div>

<div class="form-group">
    <button type="submit" class="btn btn-danger">
        Guardar
    </button>
</div>




@extends('layouts.admin')

@section('content')
    <h1>{{ $user->name }}</h1>
    <div class="container border">
        {!!
            Form::model(
                $user,
                [
                    'route' => ['admin.update', $user,$id],
                    'files' => 'true',
                    'method' => 'PUT',
                ]
            )
         !!}

        <div class="row">

            <div class="form-group col-md-6 col-12 {{ $errors->has('name')? 'has-error':'' }}">
                {!! Form::label('name','Nombre') !!}
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
            <div class="form-group col-md-6 col-12 {{ $errors->has('pass')? 'has-error':'' }}">
                {!! Form::label('pass','Contaseña') !!}
                {!!
                    Form::text('pass',
                    null,
                    [
                        'class' => 'form-control',
                        'placeholder' => '*********'
                    ])
                 !!}

                @if($errors->has('pass'))
                    <span class="help-block">
                <strong>{{ $errors->first('pass') }}</strong>
            </span>
                @endif
                <br>
                <button id="btnPass" type="button" class="btn btn-warning">
                    Nueva Contaseña
                </button>
            </div>
            <div class="form-group  col-md-6 col-12 {{ $errors->has('isRoot')? 'has-error':'' }}">
                {!! Form::label('isRoot','Super Usuario') !!}
                {!!
                    Form::checkbox('isRoot',
                    '1')
                 !!}

                @if($errors->has('isRoot'))
                    <span class="help-block">
                <strong>{{ $errors->first('isRoot') }}</strong>
            </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <button type="submit" id="btnEnviar" class="btn btn-danger">
                Guardar
            </button>
        </div>



        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript" >
        jQuery(function ($) {
            $('#btnPass').click( () =>{
                let passText = "";
                for (let i = 0; i <5; i ++){
                    passText += Math.floor((Math.random() * 9) +1);
                }
                Swal.fire({
                    title: 'Esta Seguro de Cambiar La Contaseña?',
                    text: "Esta Opcion No Es Reversible!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Cambiar!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Nueva Contaseña: ' + passText,
                            'Se Cambio Correctamente.',
                            'success'
                        );
                        $('#pass').val(passText);
                        $.get(`pass/${passText}`, () =>{});
                    }
                });

            });
        });

    </script>
@endsection

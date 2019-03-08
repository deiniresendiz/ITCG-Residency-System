@extends('layouts.admin')

@section('content')
    <br>
    @if($egresado == null)
        <div class="container border">
            <h2>Datos de Acceso</h2>
            {!!
                Form::model(
                    $user,
                    [
                        'route' => ['account.update',$id],
                        'files' => 'true',
                        'method' => 'PUT',
                    ]
                )
             !!}

            @include('account.partials.user')

            {!! Form::close() !!}
        </div>
    @endif

    <br>

    <div class="container border w-50 ml-0">
        <h2>Cambio de Contaseña</h2>
        <hr>

        @include('account.partials.password')

    </div>

    @if($egresado != null)
        <div class="container border">
            <h2>Datos personales</h2>
            {!!
            Form::model(
                $egresado,
                [
                    'route' => ['account.update',$id],
                    'files' => 'true',
                    'method' => 'PUT',
                ]
            )
         !!}
            <hr>

            @include('egresados.partials.form')
            {!! Form::close() !!}
        </div>
    @endif



@endsection


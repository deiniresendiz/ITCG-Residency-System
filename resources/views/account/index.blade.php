@extends('layouts.admin')

@section('content')
    <br>
    <div class="container border">
        <h2>Datos de Acceso</h2>
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

        @include('account.partials.user')

        {!! Form::close() !!}
    </div>
    <br>
    <div class="container border w-50 ml-0">
        <h2>Cambio de Contaseña</h2>
        <hr>

        @include('account.partials.password')

    </div>

@endsection


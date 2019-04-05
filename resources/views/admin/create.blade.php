@extends('layouts.admin')


@section('content')
    <br>
    <br>
    <div class="container">
        <h1>Nuevo Administrador</h1>
        {!!
            Form::model(
                $user = new \App\User(),
                [
                    'route' => 'admin.store',
                    'files' => 'true'
                ]
            )
         !!}

        @include('admin.partials.form')

        {!! Form::close() !!}
    </div>
@endsection

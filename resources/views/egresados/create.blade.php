@extends('layouts.admin')

@section('content')
    <div class="container">
    <h1>Nuevo Egresado</h1>
        <hr>
    {!!
        Form::model(
            $egresado = new \App\Egresados(),
            [
                'route' => 'egresados.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

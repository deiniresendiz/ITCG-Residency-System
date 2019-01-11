@extends('layouts.admin')

@section('content')
    <h1>Nuevo Egresado</h1>
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
@endsection

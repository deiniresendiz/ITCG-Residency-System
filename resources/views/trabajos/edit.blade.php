@extends('layouts.admin')


@section('content')
    <h1>Modificar Trabajo</h1>
    {!!
        Form::model(
            $trabajo,
            [
                'route' => ['trabajos.update', $trabajo,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
@endsection

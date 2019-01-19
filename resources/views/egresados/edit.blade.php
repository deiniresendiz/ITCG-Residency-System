@extends('layouts.admin')

@section('content')
    <h1>Modificar Egresado</h1>
    {!!
        Form::model(
            $egresado,
            [
                'route' => ['egresados.update',$id,$egresado],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
@endsection

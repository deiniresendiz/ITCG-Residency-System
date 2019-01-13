@extends('layouts.admin')

@section('content')
    <h1>Editar {{ $curso->nombre }}</h1>
    {!!
        Form::model(
            $curso,
            [
                'route' => ['cursos.update', $curso,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('cursos.partials.form')

    {!! Form::close() !!}
@endsection

@extends('layouts.app')


@section('content')
    <h1>Nuevo Curso</h1>
    {!!
        Form::model(
            $curso = new \App\Cursos(),
            [
                'route' => 'cursos.store',
                'riles' => 'true'
            ]
        )
     !!}

    @include('cursos.partials.form')

    {!! Form::close() !!}
@endsection

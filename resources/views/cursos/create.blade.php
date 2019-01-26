@extends('layouts.admin')


@section('content')
    <h1>Nuevo Curso</h1>
    <div class="container">
    {!!
        Form::model(
            $curso = new \App\Cursos(),
            [
                'route' => 'cursos.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('cursos.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

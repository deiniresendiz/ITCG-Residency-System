@extends('layouts.admin')


@section('content')
    <div class="container">
    <h1>Nuevo Curso</h1>
        <hr>
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

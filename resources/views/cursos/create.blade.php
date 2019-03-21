@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-chalkboard-teacher"></i> Nuevo Curso/Taller</h1>
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

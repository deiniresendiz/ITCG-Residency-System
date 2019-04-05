@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/cursos">Cursos/Talleres</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Cursos/Talleres</li>
@endsection
@section('content')
    <br>
    <div class="container">
        <br>
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

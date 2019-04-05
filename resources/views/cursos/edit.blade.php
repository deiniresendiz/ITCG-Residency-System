@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/cursos">Cursos/Talleres</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Cursos/Talleres</li>
@endsection
@section('content')
    <br>
    <div class="container">
        <br>
        <h1>{{ $curso->nombre }}</h1>
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
    </div>
@endsection

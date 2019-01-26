@extends('layouts.admin')

@section('content')
    <h1>Editar {{ $curso->nombre }}</h1>
    <div class="container">
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

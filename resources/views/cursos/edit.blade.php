@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
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

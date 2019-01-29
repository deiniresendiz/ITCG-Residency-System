@extends('layouts.admin')

@section('content')
    <h1>Editar {{ $carrera->nombre }}</h1>
    <div class="container">
        {!!
            Form::model(
                $carrera,
                [
                    'route' => ['carreras.update', $carrera,$id],
                    'files' => 'true',
                    'method' => 'PUT'
                ]
            )
         !!}

        @include('carreras.partials.form')

        {!! Form::close() !!}
    </div>
@endsection

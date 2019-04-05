@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <br>
        <h1> {{ $carrera->nombre }}</h1>
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

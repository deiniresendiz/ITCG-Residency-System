@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
        <br>
        <h1>Nueva Carrera</h1>
        <hr>
        {!!
            Form::model(
                $carrera = new \App\Carreras(),
                [
                    'route' => 'carreras.store',
                    'files' => 'true'
                ]
            )
         !!}

        @include('carreras.partials.form')

        {!! Form::close() !!}
    </div>
@endsection

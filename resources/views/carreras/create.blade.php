@extends('layouts.admin')


@section('content')

    <div class="container">
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

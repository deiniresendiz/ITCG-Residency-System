@extends('layouts.admin')


@section('content')
    <h1>Publicar Nuevo Empleo</h1>
    <hr>
    {!!
        Form::model(
            $trabajo= new \App\BolsaTrabajo(),
            [
                'route' => 'trabajos.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
@endsection

@extends('layouts.admin')


@section('content')
    <h1>Nuevo Trabajo</h1>
    {!!
        Form::model(
            $trabajo= new \App\BolsaTrabajo(),
            [
                'route' => 'trabajos.store',
                'riles' => 'true'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
@endsection

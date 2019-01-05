@extends('layouts.app')


@section('content')
    <h1>Nuevo Trabajo</h1>
    {!!
        Form::model(
            $trabajo= new \App\Cursos(),
            [
                'route' => 'trabajos.store',
                'riles' => 'true'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
@endsection

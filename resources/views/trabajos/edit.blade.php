@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/trabajos">Trabajos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Trabajo</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $trabajo->puesto }}</h1>
    {!!
        Form::model(
            $trabajo,
            [
                'route' => ['trabajos.update', $trabajo,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Egresado</li>
            </ol>
        </nav>
        <br>
    </div>
    <div class="container">
    <h1>Nuevo Egresado</h1>
        <hr>
    {!!
        Form::model(
            $egresado = new \App\Egresados(),
            [
                'route' => 'egresados.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

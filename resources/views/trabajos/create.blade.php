@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/trabajos">Trabajos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Trabajo</li>
            </ol>
        </nav>
    </div>
    <div class="container">
    <h1>
        <i class="fas fa-briefcase"></i>
        Publicar Nuevo Empleo</h1>

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
    </div>
@endsection

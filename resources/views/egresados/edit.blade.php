@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificando Egresado</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <h1>
            <i class="fas fa-user-edit"></i> Modificar Egresado
        </h1>
    {!!
        Form::model(
            $egresado,
            [
                'route' => ['egresados.update',$id,$egresado],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

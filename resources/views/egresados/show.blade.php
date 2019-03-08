@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mostar Egresado</li>
            </ol>
        </nav>
        <br>
        <h1>
            <i class="fas fa-user-graduate"></i> Egresado
            <a href="{{ route('egresados.edit',$egresado) }}">
                <i class="fas fa-user-edit"></i>
            </a>
        </h1>
        <hr>
    </div>

    <div class="container">
        @if($egresado->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($egresado->imagen) }}" class="img-thumbnail align-content-center w-25" target="_blank" >
                    <img src="{{ asset($egresado->imagen) }}" alt="cartel del curso">
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">No° Control:</dt>
            <dd class="col-sm-3">{{ $egresado->no_control }}</dd>
            <dt class="col-sm-2">Nombre:</dt>
            <dd class="col-sm-5">{{ $egresado->nombre }}</dd>
            <dt class="col-sm-2">Carrera:</dt>
            <dd class="col-sm-3">{{ $egresado->carreras($egresado->carrera_id)->nombre }}</dd>
            <dt class="col-sm-2">Curp:</dt>
            <dd class="col-sm-5">{{ $egresado->curp }}</dd>
            <dt class="col-sm-2">Sexo:</dt>
            <dd class="col-sm-3">{{ $egresado->sexo }}</dd>
            <dt class="col-sm-2">Fecha de Nacimiento:</dt>
            <dd class="col-sm-5">{{ date_format($egresado->nacimiento,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Estado Civil:</dt>
            <dd class="col-sm-3">{{ $egresado->estado_civil }}</dd>
            <dt class="col-sm-2">Fecha de Egresado:</dt>
            <dd class="col-sm-5">{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Ciudad:</dt>
            <dd class="col-sm-3">{{ $egresado->ciudad->nombre }}</dd>
            <dt class="col-sm-2">Curp:</dt>
            <dd class="col-sm-5">{{ $egresado->telefono }}</dd>
            <dt class="col-sm-2">Celular:</dt>
            <dd class="col-sm-3">{{ $egresado->celular }}</dd>
            <dt class="col-sm-2">Correo:</dt>
            <dd class="col-sm-5">{{ $egresado->email }}</dd>
            <dt class="col-sm-2">Promedio:</dt>
            <dd class="col-sm-3">{{ $egresado->promedio }}</dd>
        </dl>
    </div>


@endsection


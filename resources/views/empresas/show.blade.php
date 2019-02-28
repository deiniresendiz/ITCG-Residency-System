@extends('layouts.admin')

@section('content')
    <br>
    <h1>
        <i class="fas fa-user-graduate"></i> Egresado
    </h1>
    <hr>
    <div class="container">
        @if($empresa->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($empresa->imagen) }}" class="img-thumbnail align-content-center w-25" target="_blank" >
                    <img src="{{ asset($empresa->imagen) }}" alt="cartel del curso">
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">Nombre:</dt>
            <dd class="col-sm-3">{{ $empresa->nombre }}</dd>
            <dt class="col-sm-2">Ciudad:</dt>
            <dd class="col-sm-5">{{ $empresa->ciudad->nombre  }}</dd>
            <dt class="col-sm-2">Carrera:</dt>
            <dd class="col-sm-3">{{ $empresa->carreras($egresado->carrera_id)->nombre }}</dd>
            <dt class="col-sm-2">Domicilio:</dt>
            <dd class="col-sm-5">{{ $empresa->domicilio }}</dd>
            <dt class="col-sm-2">Telefono:</dt>
            <dd class="col-sm-3">{{ $empresa->telefono }}</dd>
            <dt class="col-sm-2">Contracto:</dt>
            <dd class="col-sm-3">{{ $empresa->contacto }}</dd>
            <dt class="col-sm-2">Descripcion:</dt>
            <dd class="col-sm-5">{{ $empresa->descripcion }}</dd>
        </dl>
    </div>

@endsection

@extends('layouts.admin')

@section('content')
    <br>
    <h1>
        <i class="fas fa-user-graduate"></i> Egresado
    </h1>
    <hr>
    <div class="container">
        @if($trabajo->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($trabajo->imagen) }}" class="img-thumbnail align-content-center w-25" target="_blank" >
                    <img src="{{ asset($trabajo->imagen) }}" alt="cartel del curso">
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">Puesto:</dt>
            <dd class="col-sm-3">{{ $trabajo->puesto }}</dd>
            <dt class="col-sm-2">Empresa:</dt>
            <dd class="col-sm-5">{{ $trabajo->empresa->nombre }}</dd>
            <dt class="col-sm-2">Area Profesional:</dt>
            <dd class="col-sm-3">{{ $trabajo->area->nombre }}</dd>
            <dt class="col-sm-2">Tipo:</dt>
            <dd class="col-sm-5">{{ $trabajo->tipo }}</dd>
            <dt class="col-sm-2">Fecha:</dt>
            <dd class="col-sm-5">{{ date_format($trabajo->fecha,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Descripcion:</dt>
            <dd class="col-sm-4">{{ $trabajo->descripcion}}</dd>
            <dt class="col-sm-2">Requisitos:</dt>
            <dd class="col-sm-4">{{ $trabajo->requisitos }}</dd>
            <dt class="col-sm-2">Contracto:</dt>
            <dd class="col-sm-3">{{ $trabajo->contracto }}</dd>
            <dt class="col-sm-2">Telefono:</dt>
            <dd class="col-sm-5">{{ $trabajo->telefono }}</dd>
            <dt class="col-sm-2">Correo:</dt>
            <dd class="col-sm-3">{{ $trabajo->email }}</dd>
            <dt class="col-sm-2">Sueldo:</dt>
            <dd class="col-sm-5">{{ $trabajo->sueldo }}</dd>
            <dt class="col-sm-2">Estado:</dt>
            <dd class="col-sm-3">{{ $trabajo->estado }}</dd>
        </dl>
    </div>

@endsection

@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/trabajos">Trabajos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mostar Trabajo</li>
@endsection
@section('content')
    <br>
    <br>
    <div class="container">
        <h1>
            <i class="fas fa-briefcase"></i> Trabajo
            @if(Auth::user()->isAdmin == 1)
                <a href="{{ route('trabajos.edit',$trabajo) }}">
                    <i class="fas fa-edit"></i>
                </a>
            @endif
            <a class="float-right text-black-50" target="_blank"  href="{{ route('egresado.pdf',$trabajo) }}"><i class="fas fa-print"></i></a>
        </h1>

        <hr>
        @if($trabajo->imagen)
            <div class="d-flex text-center">
                <a href="{{ asset($trabajo->imagen) }}" target="_blank" >
                    <img src="{{ asset($trabajo->imagen) }}" alt="cartel del curso" class="img-thumbnail align-content-center img-fluid w-50" >
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">Puesto:</dt>
            <dd class="col-sm-4">{{ $trabajo->puesto }}</dd>
            <dt class="col-sm-2">Empresa:</dt>
            <dd class="col-sm-4">{{ $trabajo->empresa->nombre }}</dd>
            <dt class="col-sm-2">Descripcion:</dt>
            <dd class="col-sm-10">{{ $trabajo->descripcion}}</dd>
            <dt class="col-sm-2">Requisitos:</dt>
            <dd class="col-sm-10">{{ $trabajo->requisitos }}</dd>
            <dt class="col-sm-2">Area Profesional:</dt>
            <dd class="col-sm-4">{{ $trabajo->area->nombre }}</dd>
            <dt class="col-sm-2">Tipo:</dt>
            <dd class="col-sm-4">{{ $trabajo->tipo }}</dd>
            <dt class="col-sm-2">Fecha:</dt>
            <dd class="col-sm-4">{{ date_format($trabajo->fecha,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Contracto:</dt>
            <dd class="col-sm-4">{{ $trabajo->contracto }}</dd>
            <dt class="col-sm-2">Telefono:</dt>
            <dd class="col-sm-4">{{ $trabajo->telefono }}</dd>
            <dt class="col-sm-2">Correo:</dt>
            <dd class="col-sm-4">{{ $trabajo->email }}</dd>
            <dt class="col-sm-2">Sueldo:</dt>
            <dd class="col-sm-4">{{ $trabajo->sueldo }}</dd>
            <dt class="col-sm-2">Estado:</dt>
            <dd class="col-sm-4">{{ $trabajo->estado }}</dd>
        </dl>
    </div>

@endsection

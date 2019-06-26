@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/empresas">Empresas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mostrar Empresa</li>
@endsection
@section('content')
    <br>

    <div class="container">
        <h1>
            <i class="fas fa-building"></i> Empresa
            <a href="{{ route('empresas.edit',$empresa) }}">
                <i class="fas fa-edit"></i>
            </a>
            <a class="float-right text-black-50" target="_blank"  href="{{ route('imprimirpdf', ['result' => json_encode($empresa),'option' => 6, 'title' => $empresa->nombre]) }}"><i class="fas fa-print"></i></a>
        </h1>
        <hr>
        @if($empresa->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($empresa->imagen) }}" target="_blank" >
                    <img src="{{ asset($empresa->imagen) }}" class="img-thumbnail align-content-center img-fluid"  alt="Logo de la empresa">
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">Nombré:</dt>
            <dd class="col-sm-4">{{ $empresa->nombre }}</dd>
            <dt class="col-sm-2">Ciudad:</dt>
            <dd class="col-sm-4">{{ ($empresa->ciudad != null)?$empresa->ciudad->nombre:null  }}</dd>
            <dt class="col-sm-2">Domicilio:</dt>
            <dd class="col-sm-4">{{ $empresa->domicilio }}</dd>
            <dt class="col-sm-2">Telefono:</dt>
            <dd class="col-sm-4">{{ $empresa->telefono }}</dd>
            <dt class="col-sm-2">Contracto:</dt>
            <dd class="col-sm-4">{{ $empresa->contacto }}</dd>
            <dt class="col-sm-2">Descripción:</dt>
            <dd class="col-sm-4">{{ $empresa->descripcion }}</dd>
        </dl>
    </div>

@endsection

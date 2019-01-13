@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $empresa->nombre }} </h1>
    @if($empresa->imagen)
        <div class="d-flex justify-content-center">
            <a href="{{ asset($empresa->imagen) }}" class="img-thumbnail align-content-center" target="_blank" >
                <img src="{{ asset($empresa->imagen) }}" alt="logo de la empresa">
            </a>
        </div>
    @endif
    <table class="table table-border">
        <tr>
            <th>Nombre</th>
            <td>{{ $empresa->nombre }}</td>
        </tr>
        <tr>
            <th>Descripcion</th>
            <td>{{ $empresa->descripcion }}</td>
        </tr>
        <tr>
            <th>Ciudad</th>
            <td>{{ $empresa->ciudad->nombre }}</td>
        </tr>
        <tr>
            <th>Domicilio</th>
            <td>{{ $empresa->domicilio }}</td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td>{{ $empresa->telefono }}</td>
        </tr>
        <tr>
            <th>Contracto</th>
            <td>{{ $empresa->contacto }}</td>
        </tr>
    </table>
@endsection

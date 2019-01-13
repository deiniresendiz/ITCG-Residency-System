@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $trabajo->puesto }} </h1>
    @if($trabajo->imagen)
        <div class="d-flex justify-content-center">
            <a href="{{ asset($trabajo->imagen) }}" class="img-thumbnail align-content-center" target="_blank" >
                <img src="{{ asset($trabajo->imagen) }}" alt="cartel del curso">
            </a>
        </div>
    @endif
    <table class="table table-border">
        <tr>
            <th>Puesto</th>
            <td>{{ $trabajo->puesto }}</td>
        </tr>
        <tr>
            <th>Empresa</th>
            <td>{{ $trabajo->empresa->nombre }}</td>
        </tr>
        <tr>
            <th>Area Profesional</th>
            <td>{{ $trabajo->area->nombre }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $trabajo->tipo }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ date_format($trabajo->fecha,'d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Descripcion</th>
            <td>{{ $trabajo->descripcion }}</td>
        </tr>
        <tr>
            <th>Requisitos</th>
            <td>{{ $trabajo->requisitos }}</td>
        </tr>
        <tr>
            <th>Contracto</th>
            <td>{{ $trabajo->contracto }}</td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td>{{ $trabajo->telefono }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $trabajo->email }}</td>
        </tr>
        <tr>
            <th>Sueldo</th>
            <td>{{ $trabajo->sueldo }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $trabajo->estado }}</td>
        </tr>
    </table>
@endsection

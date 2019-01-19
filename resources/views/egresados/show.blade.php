@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $egresado->nombre }} </h1>
    @if($egresado->imagen)
        <div class="d-flex justify-content-center">
            <a href="{{ asset($egresado->imagen) }}" class="img-thumbnail align-content-center" target="_blank" >
                <img src="{{ asset($egresado->imagen) }}" alt="cartel del curso">
            </a>
        </div>
    @endif
    <table class="table table-border">
        <tr>
            <th>Nombre</th>
            <td>{{ $egresado->nombre }}</td>
        </tr>
        <tr>
            <th>No° Control</th>
            <td>{{ $egresado->no_control }}</td>
        </tr>
        <tr>
            <th>Carrera</th>
            <td>{{ $egresado->carraras }}</td>
        </tr>
        <tr>
            <th>Curp</th>
            <td>{{ $egresado->curp }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>{{ $egresado->sexo }}</td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td>{{ date_format($egresado->nacimiento,'d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Estado Civil</th>
            <td>{{ $egresado->estado_civil }}</td>
        </tr>
        <tr>
            <th>Fecha de Egresado</th>
            <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Telefono</th>
            <td>{{ $egresado->telefono }}</td>
        </tr>
        <tr>
            <th>Celular</th>
            <td>{{ $egresado->celular }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $egresado->email }}</td>
        </tr>
        <tr>
            <th>Promedio</th>
            <td>{{ $egresado->promedio }}</td>
        </tr>
    </table>
@endsection


@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $curso->nombre }} </h1>
    @if($curso->imagen)
        <div class="d-flex justify-content-center">
            <a href="{{ asset($curso->imagen) }}" class="img-thumbnail align-content-center" target="_blank" >
                <img src="{{ asset($curso->imagen) }}" alt="cartel del curso">
            </a>
        </div>
    @endif
    <table class="table table-border">
        <tr>
            <th>Nombre</th>
            <td>{{ $curso->nombre }}</td>
        </tr>
        <tr>
            <th>Descripcion</th>
            <td>{{ $curso->descripcion }}</td>
        </tr>
        <tr>
            <th>Instructor</th>
            <td>{{ $curso->instructor }}</td>
        </tr>
        <tr>
            <th>Lugar</th>
            <td>{{ $curso->lugar }}</td>
        </tr>
        <tr>
            <th>fecha_inicio</th>
            <td>{{ date_format($curso->fecha_inicio,'d/m/Y') }}</td>
        </tr>
        <tr>
            <th>fecha_final</th>
            <td>{{  date_format($curso->fecha_final,'d/m/Y') }}</td>
        </tr>
        <tr>
            <th>precio</th>
            <td>{{ $curso->precio }}</td>
        </tr>
        <tr>
            <th>estado</th>
            <td>{{ $curso->estado }}</td>
        </tr>
    </table>
@endsection

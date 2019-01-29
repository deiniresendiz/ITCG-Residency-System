@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $carrera->nombre }} </h1>
    <table class="table table-border">
        <tr>
            <th>Clave</th>
            <td>{{ $carrera->clave }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $carrera->nombre }}</td>
        </tr>


    </table>
@endsection

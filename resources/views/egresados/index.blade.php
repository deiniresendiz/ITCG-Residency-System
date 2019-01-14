@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-border">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>No° Control</td>
            <td>Carrera</td>
            <td>Sexo</td>
            <td>Edad</td>
            <td>Fecha de Egreso</td>
            <td>Telefono</td>
            <td colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($egresados as $egrensado)
            <tr>
                <td>{{ $egrensado->nombre }}</td>
                <td>{{ $egrensado->no_control }}</td>
                <td>{{ $egrensado->carrera->nombre }}</td>
                <td>{{ $egrensado->sexo }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($egrensado->nacimiento)->age }}</td>
                <td>{{ $egrensado->fecha_egreso }}</td>
                <td>{{ $egrensado->telefono }}</td>
                <td>
                    <a href="{{ route('egresados.show',$egrensado) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('egresados.edit',$egrensado) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

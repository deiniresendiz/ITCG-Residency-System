@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-border">
        <thead>
        <tr>
            <td>Empresa</td>
            <td>Puesto</td>
            <td>Area</td>
            <td>Ciudad</td>
            <td>Contracto</td>
            <td>Telefono</td>
            <td colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($trabajos as $trabajo)
            <tr>
                <td>{{ $trabajo->empresa->nombre }}</td>
                <td>{{ $trabajo->puesto }}</td>
                <td>{{ $trabajo->area->nombre }}</td>
                <td>{{ $trabajo->ciudad->nombre }}</td>
                <td>{{ $trabajo->contracto }}</td>
                <td>{{ $trabajo->telefono }}</td>
                <td>
                    <a href="{{ route('trabajos.show',$trabajo) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('trabajos.edit',$trabajo) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

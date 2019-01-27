@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-danger">
        <tr>
            <td scope="col">Empresa</td>
            <td scope="col">Puesto</td>
            <td scope="col">Area</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Contracto</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
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

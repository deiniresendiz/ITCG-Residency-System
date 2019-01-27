@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-danger">
        <tr>
            <td scope="col">Nombre</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Domicilio</td>
            <td scope="col">Telefono</td>
            <td scope="col">Contacto</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->ciudad->nombre }}</td>
                <td>{{ $empresa->domicilio }}</td>
                <td>{{ $empresa->telefono}}</td>
                <td>{{ $empresa->contacto }}</td>
                <td>
                    <a href="{{ route('empresas.show',$empresa) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('empresas.edit',$empresa) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

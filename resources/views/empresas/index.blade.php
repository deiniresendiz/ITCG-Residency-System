@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-border">
        <thead>
        <tr>
            <td>Nombre</td>
            <td>Ciudad</td>
            <td>Domicilio</td>
            <td>Telefono</td>
            <td>Contacto</td>
            <td colspan="2">Acciones</td>
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

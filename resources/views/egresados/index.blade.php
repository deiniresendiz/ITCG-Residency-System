@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <div class="container">


    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col" >#</td>
            <td scope="col">No° Control</td>
            <td scope="col" >Nombre</td>
            <td scope="col">Carrera</td>
            <td scope="col">Sexo</td>
            <td scope="col">Edad</td>
            <td scope="col">Fecha de Egreso</td>
            <td scope="col">Promedio</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($egresados as $egresado)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $egresado->no_control }}</td>
                <td>{{ $egresado->nombre }} </td>
                <td>{{ $egresado->carreras($egresado->carrera_id)->nombre }}</td>
                <td>{{ $egresado->sexo }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($egresado->nacimiento)->age }}</td>
                <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
                <td>{{ $egresado->promedio }}</td>
                <td>{{ $egresado->telefono }}</td>
                <td>
                    <a href="{{ route('egresados.show',$egresado) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('egresados.edit',$egresado) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection

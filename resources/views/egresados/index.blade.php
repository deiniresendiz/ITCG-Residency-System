@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <div class="container">


    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-danger">
        <tr>
            <td scope="col" >#</td>
            <td scope="col" >Nombre</td>
            <td scope="col">No° Control</td>
            <td scope="col">Carrera</td>
            <td scope="col">Sexo</td>
            <td scope="col">Edad</td>
            <td scope="col">Fecha de Egreso</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($egresados as $egrensado)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $egrensado->nombre }} </td>
                <td>{{ $egrensado->no_control }}</td>
                <td>{{ $egrensado->carrera_id }}</td>
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
    </div>
@endsection

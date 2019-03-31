@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ocupaciones</li>
            </ol>
        </nav>
    </div>

    <br>
    <div class="container">

        <h1>Ocupaciones
            <a href="{{ route('ocupaciones.create') }}">
                <i class="fas fa-plus"></i>
            </a>
        </h1>
        <span class="float-right">Resultados: {{ $y }}</span>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">Empresa</td>
            <td scope="col">Puesto</td>
            <td scope="col">Atiguedad</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>

        @foreach($ocupaciones as $ocupacion)
            <tr>
                <td>{{ $ocupacion->empresa->nombre }}</td>
                <td>{{ $ocupacion->puesto }}</td>
                <td>{{ $ocupacion->antiguedad }}</td>
                <td>
                    <a href="{{ route('ocupaciones.show',$ocupacion) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('ocupaciones.edit',$ocupacion) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $ocupaciones->render() !!}
        </div>
    </div>
@endsection



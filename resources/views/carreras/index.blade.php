@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">#</td>
            <td scope="col">Clave</td>
            <td scope="col">Nombre</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($carreras as $carrera)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $carrera->clave }}</td>
                <td>{{ $carrera->nombre }}</td>
                <td>
                    <a href="{{ route('carreras.show',$carrera) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('carreras.edit',$carrera) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

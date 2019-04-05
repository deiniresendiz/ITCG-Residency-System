@extends('layouts.admin')

@section('content')
    <br>
    <div class="container" >
        <br>
        <h1>
            <i class="fas fa-university"></i>
            Carreras
            <a href="{{ route('carreras.create') }}">
                <i class="fas fa-plus"></i>
            </a>
        </h1>
    <hr>
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
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('carreras.edit',$carrera) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $carreras->render() !!}
        </div>
    </div>
@endsection

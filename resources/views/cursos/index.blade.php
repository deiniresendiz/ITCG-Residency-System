@extends('layouts.admin')

@section('content')
    <br>
    <h1>{{ $title }}</h1>
    <hr>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
            <tr>
                <td scope="col">Nombre</td>
                <td scope="col">Instructor</td>
                <td scope="col">Lugar</td>
                <td scope="col">Fecha de Inicio</td>
                <td scope="col">Precio</td>
                <td scope="col">Estado</td>
                <td scope="col" colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->instructor }}</td>
                <td>{{ $curso->lugar }}</td>
                <td>{{ date_format($curso->fecha_inicio,'d/m/Y')}}</td>
                <td>{{ $curso->precio }}</td>
                <td>{{ $curso->estado }}</td>
                <td>
                    <a href="{{ route('cursos.show',$curso) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('cursos.edit',$curso) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cursos->links() }}
@endsection

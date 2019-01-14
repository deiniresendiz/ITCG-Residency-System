@extends('layouts.admin')

@section('content')
    <h1>{{ $title }}</h1>
    <table class="table table-border">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Instructor</td>
                <td>Lugar</td>
                <td>Fecha de Inicio</td>
                <td>Precio</td>
                <td>Estado</td>
                <td colspan="2">Acciones</td>
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
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('cursos.edit',$curso) }}">
                        Editar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

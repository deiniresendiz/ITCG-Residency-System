@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Mis Estudios</li>
@endsection
@section('content')
    <br>


    <br>
    <div class="container">

        <h1>Estudios
            <a href="{{ route('estudios.create') }}">
                <i class="fas fa-plus"></i>
            </a>
        </h1>
        <span class="float-right">Resultados: {{ $y }}</span>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">Instituto</td>
            <td scope="col">Posgrado</td>
            <td scope="col">Fecha de terminacion</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>

        @foreach($estudios as $estudio)
            <tr>
                <td>{{ $estudio->instituto }}</td>
                <td>{{ $estudio->posgrado->nombre }}</td>
                <td>{{ date_format($estudio->fecha_final,'d/m/Y') }}</td>
                <td>
                    <a href="{{ route('estudios.show',$estudio) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('estudios.edit',$estudio) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $estudios->render() !!}
        </div>
    </div>
@endsection



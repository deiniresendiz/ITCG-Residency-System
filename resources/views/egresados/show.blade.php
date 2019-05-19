@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mostar Egresado</li>
@endsection
@section('content')
    <br>
    <div class="container">
        <br>
        <h1>
            <i class="fas fa-user-graduate"></i> Egresado
            <a href="{{ route('egresados.edit',$egresado) }}">
                <i class="fas fa-user-edit"></i>
            </a>
            <a class="float-right text-black-50" target="_blank"  href="{{ route('egresado.pdf',$egresado) }}"><i class="fas fa-print"></i></a>
        </h1>

        <hr>
    </div>

    <div class="container">
        @if($egresado->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($egresado->imagen) }}"  target="_blank" >
                    <img src="{{ asset($egresado->imagen) }}" alt="cartel del curso" class="img-thumbnail align-content-center img-fluid" >
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">No° Control:</dt>
            <dd class="col-sm-3">{{ $egresado->no_control }}</dd>
            <dt class="col-sm-2">Nombre:</dt>
            <dd class="col-sm-5">{{ $egresado->nombre }}</dd>
            <dt class="col-sm-2">Carrera:</dt>
            <dd class="col-sm-3">{{ $egresado->carreras($egresado->carrera_id)->nombre }}</dd>
            <dt class="col-sm-2">Curp:</dt>
            <dd class="col-sm-5">{{ $egresado->curp }}</dd>
            <dt class="col-sm-2">Sexo:</dt>
            <dd class="col-sm-3">{{ $egresado->sexo }}</dd>
            <dt class="col-sm-2">Fecha de Nacimiento:</dt>
            <dd class="col-sm-5">{{ date_format($egresado->nacimiento,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Estado Civil:</dt>
            <dd class="col-sm-3">{{ $egresado->estado_civil }}</dd>
            <dt class="col-sm-2">Fecha de Egresado:</dt>
            <dd class="col-sm-5">{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Ciudad:</dt>
            <dd class="col-sm-3">{{ $egresado->ciudad->nombre }}</dd>
            <dt class="col-sm-2">Telefono:</dt>
            <dd class="col-sm-5">{{ $egresado->telefono }}</dd>
            <dt class="col-sm-2">Celular:</dt>
            <dd class="col-sm-3">{{ $egresado->celular }}</dd>
            <dt class="col-sm-2">Correo:</dt>
            <dd class="col-sm-5">{{ $egresado->email }}</dd>
            <dt class="col-sm-2">Promedio:</dt>
            <dd class="col-sm-3">{{ $egresado->promedio }}</dd>
        </dl>
            <br>

        <p class="h3">Estudios</p>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col" >#</td>
            <td scope="col">Postgrado</td>
            <td scope="col" >Instituto</td>
            <td scope="col">Nivel</td>
            <td scope="col">Fecha de Inicio</td>
            <td scope="col">Fecha de Finalizacion</td>
        </tr>
        </thead>
        <tbody>
        @foreach($estudios as $estudio)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $estudio->posgrado->nombre }}</td>
                <td>{{ $estudio->instituto }}</td>
                <td>{{ $estudio->nivel }}</td>
                <td>{{ date_format($estudio->fecha_inicio,'d/m/Y') }}</td>
                <td>{{ date_format($estudio->fecha_final,'d/m/Y') }}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <br>
        <p class="h3">Empleos</p>
        <table class="table table-light table-striped table-hover">
            <thead class="thead-dark bg-primary font-weight-bold text-white">
            <tr>
                <td scope="col" >#</td>
                <td scope="col">Puesto</td>
                <td scope="col" >Empresa</td>
                <td scope="col">Antiguedad</td>
                <td scope="col">Descripcion</td>
            </tr>
            </thead>
            <tbody>
            @foreach($empleos as $empleo)
                <tr>
                    <td>{{ $y++ }}</td>
                    <td>{{ $empleo->puesto }}</td>
                    <td>{{ $empleo->empresa->nombre }}</td>
                    <td>{{ $empleo->antiguedad }}</td>
                    <td>{{ $empleo->descripcion }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


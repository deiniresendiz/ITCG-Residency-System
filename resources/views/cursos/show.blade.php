@extends('layouts.admin')

@section('content')
    <br>
    <h1>
        <i class="fas fa-chalkboard-teacher"></i>  Cursos y Talleres
        <a href="{{ route('cursos.edit',$curso) }}">
            <i class="fas fa-edit"></i>
        </a>
        <a class="float-right text-black-50" target="_blank"  href="{{ route('egresado.pdf',$curso) }}"><i class="fas fa-print"></i></a>
    </h1>
    <hr>
    <div class="container">
        @if($curso->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($curso->imagen) }}" class="img-thumbnail align-content-center" target="_blank" >
                    <img src="{{ asset($curso->imagen) }}" alt="cartel del curso">
                </a>
            </div>
        @endif
        <dl class="row">
            <dt class="col-sm-2">Nombré</dt>
            <dd class="col-sm-10">{{ $curso->nombre }}</dd>
            <dt class="col-sm-2">Descripcion</dt>
            <dd class="col-sm-10">
                {{ $curso->descripcion }}
            </dd>
            <dt class="col-sm-2">Instructor:</dt>
            <dd class="col-sm-4">{{ $curso->instructor }}</dd>
            <dt class="col-sm-2">Lugar:</dt>
            <dd class="col-sm-4">{{ $curso->lugar }}</dd>
            <dt class="col-sm-2">Fecha de Inicio:</dt>
            <dd class="col-sm-4">{{  date_format($curso->fecha_inicio,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Fecha de Terminacion:</dt>
            <dd class="col-sm-4">{{  date_format($curso->fecha_final,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Precio:</dt>
            <dd class="col-sm-4">{{ $curso->precio }}</dd>
            <dt class="col-sm-2">Estado:</dt>
            <dd class="col-sm-4">{{ $curso->estado }}</dd>

        </dl>
    </div>
@endsection

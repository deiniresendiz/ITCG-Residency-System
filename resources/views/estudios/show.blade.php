@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/estudios">Mis Estudios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mostar Estudio</li>
@endsection
@section('content')
    <br>
    <br>
    <div class="container">
        <h1>
            <i class="fas fa-university"></i> Estudio
            <a href="{{ route('estudios.edit',$estudio) }}">
                <i class="fas fa-edit"></i>
            </a>
        </h1>
        <hr>
        <dl class="row">
            <dt class="col-sm-2">Posgrado:</dt>
            <dd class="col-sm-4">{{ $estudio->posgrado->nombre }}</dd>
            <dt class="col-sm-2">Instituto:</dt>
            <dd class="col-sm-4">{{ $estudio->instituto }}</dd>
            <dt class="col-sm-2">Fecha de inicio:</dt>
            <dd class="col-sm-4">{{ date_format($estudio->fecha_inicio,'d/m/Y') }}</dd>
            <dt class="col-sm-2">Fecha de terminacion:</dt>
            <dd class="col-sm-4">{{ date_format($estudio->fecha_final,'d/m/Y')}}</dd>
            <dt class="col-2">Nivel:</dt>
            <dd class="col-10">{{ $estudio->nivel }}</dd>
            <dt class="col-2">Descripcion:</dt>
            <dd class="col-10">{{ $estudio->descripcion }}</dd>

        </dl>
    </div>

@endsection

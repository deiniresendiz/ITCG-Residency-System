@extends('layouts.admin')

@section('content')
    <br>
    <h1>
        <i class="fas fa-university"></i>  Carrera
    </h1>
    <hr>
    <div class="container">
        <dl class="row">
            <dt class="col-sm-3">Clave</dt>
            <dd class="col-sm-9">{{ $carrera->clave }}</dd>

            <dt class="col-sm-3 text-truncate">Nombré</dt>
            <dd class="col-sm-9">
                {{ $carrera->nombre }}
            </dd>

        </dl>
    </div>
@endsection

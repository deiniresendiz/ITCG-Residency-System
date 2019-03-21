@extends('layouts.admin')

@section('content')

    <div class="container">
        <br>
        <h1>
            <i class="fas fa-university"> {{ $carrera->nombre }}</i>
        </h1>
        <hr>
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

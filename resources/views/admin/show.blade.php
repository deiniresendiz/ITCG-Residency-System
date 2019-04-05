@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <br>
        <h1>
            <i class="fas fa-users-cog"></i>  Administrador
        </h1>
        <hr>
        <dl class="row">
            <dt class="col-sm-3">Nombré</dt>
            <dd class="col-sm-9">{{ $user->name }}</dd>

            <dt class="col-sm-3 text-truncate">Correo</dt>
            <dd class="col-sm-9">
                {{ $user->email }}
            </dd>

        </dl>
    </div>
@endsection

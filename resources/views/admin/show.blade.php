@extends('layouts.admin')

@section('content')
    <h1>Detalles de {{ $user->name }} </h1>
    <table class="table table-border">
        <tr>
            <th>Nombre</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $user->email }}</td>
        </tr>

    </table>
@endsection

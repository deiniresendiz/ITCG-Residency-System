@extends('layouts.admin')

@section('content')
    <br>
    <h1>{{ $title }}</h1>
    <hr>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">#</td>
            <td scope="col">Nombre</td>
            <td scope="col">Correo</td>
            <td scope="col">Tipo</td>
            <td scope="col" colspan="3">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->email }}</td>
                @if($user->isRoot== 1)
                    <td>Super Usuario</td>
                    @else
                    <td>Administrador</td>
                @endif
                <td>
                    <a href="{{ route('admin.show',$user) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.edit',$user) }}">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.destroy',$user) }}/destroy">
                        <i class="fas fa-user-minus"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

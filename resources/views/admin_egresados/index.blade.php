@extends('layouts.admin')

@section('content')
    <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'adminegresado.index' , 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                    <div class="form-group">
                        {!! Form::text('name',null,['class' => 'form-control  mx-1', 'placeholder' => 'Nombre o No Control']) !!}

                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-user-graduate"></i>
        {{ $title }}</h1>
        <span class="float-right">Resultados: {{ $y }}</span>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">#</td>
            <td scope="col">No° Control</td>
            <td scope="col">Nombre</td>
            <td scope="col" colspan="3">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>

                <td>
                    <a href="{{ route('adminegresado.show',$user) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('adminegresado.edit',$user) }}">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $users->appends(['name'=> Request::get('name')])->render() !!}

        </div>
    </div>
@endsection

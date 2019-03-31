@extends('layouts.admin')

@section('content')
    <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'cursos.index' , 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('state',
                                ['Activo'=>'Activo','Terminado'=>'Terminado'],
                                null,
                                [
                                    'class' => ' form-control mx-1',
                                    'id' => 'sexo',
                                    'placeholder'=>'Estado del curso'

                                ]
                            )
                         !!}
                    </div>

                    <div class="form-group">
                        {!! Form::text('name',null,['class' => 'form-control  mx-1', 'placeholder' => 'Nombre de la Empresa']) !!}

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
        <h1>{{ $title }}
            @if(Auth::user()->isAdmin == 1)
                <a href="{{ route('cursos.create') }}">
                    <i class="fas fa-plus"></i>
                </a>
                <a class="float-right text-black-50" href="{{ route('egresados.pdf',['carrera_id'=> Request::get('carrera_id'),'sexo'=> Request::get('sexo'),'promedio'=> Request::get('promedio'),'name'=> Request::get('name')]) }}" target="_blank"><i class="fas fa-print"></i></a>
            @endif
        </h1>
        <span class="float-right">Resultados: {{ $y }}</span>

    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
            <tr>
                <td scope="col">Nombre</td>
                <td scope="col">Instructor</td>
                <td scope="col">Lugar</td>
                <td scope="col">Fecha de Inicio</td>
                <td scope="col">Precio</td>
                <td scope="col">Estado</td>
                <td scope="col" colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->instructor }}</td>
                <td>{{ $curso->lugar }}</td>
                <td>{{ date_format($curso->fecha_inicio,'d/m/Y')}}</td>
                <td>{{ $curso->precio }}</td>
                <td>{{ $curso->estado }}</td>
                <td>
                    <a href="{{ route('cursos.show',$curso) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('cursos.edit',$curso) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <div class="text-center">
            {!! $cursos->appends(['name'=> Request::get('name'),'state'=> Request::get('state')])->render() !!}
        </div>
    </div>
@endsection

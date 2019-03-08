@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'trabajos.index' , 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('town',
                                $citys,
                                null,
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'ciudad',
                                    'placeholder'=>'Seleccione una Ciudad'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!!
                            Form::select('area',
                                $areas,
                                null,
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'ciudad',
                                    'placeholder'=>'Seleccione una Area'

                                ]
                            )
                         !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::select('company',
                                $empresas,
                                null,
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'ciudad',
                                    'placeholder'=>'Seleccione una Empresa'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('puesto',null,['class' => 'form-control  mx-1', 'placeholder' => 'Nombre de la Empresa']) !!}

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
    <hr>
    <h1>{{ $title }}</h1>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">Empresa</td>
            <td scope="col">Puesto</td>
            <td scope="col">Area</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Contracto</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($trabajos as $trabajo)
            <tr>
                <td>{{ $trabajo->empresa->nombre }}</td>
                <td>{{ $trabajo->puesto }}</td>
                <td>{{ $trabajo->area->nombre }}</td>
                <td>{{ $trabajo->ciudad->nombre }}</td>
                <td>{{ $trabajo->contracto }}</td>
                <td>{{ $trabajo->telefono }}</td>
                <td>
                    <a href="{{ route('trabajos.show',$trabajo) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('trabajos.edit',$trabajo) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $trabajos->render() !!}

    </div>
    </div>
@endsection

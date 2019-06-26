@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Egresados</li>
@endsection
@section('content')
    <br>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'egresados.index' , 'method' => 'GET', 'class' => 'form-inline pull-right', 'id' => 'filtter']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('carrera_id',
                                $carerras,
                                Request::get('carrera_id'),
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'carrera',
                                    'placeholder'=>'Seleccione una Carrera',

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!!
                            Form::select('sexo',
                                ['Masculino'=>'Masculino','Femenino'=>'Femenino','Indefinido'=>'Indefinido'],
                                Request::get('sexo'),
                                [
                                    'class' => ' form-control mx-1',
                                    'id' => 'sexo',
                                    'placeholder'=>'Sexo'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!!
                            Form::select('promedio',
                                ['1'=>'Mayor a Menor','0'=>'Menor a Mayor'],
                                Request::get('promedio'),
                                [
                                    'class' => ' form-control mx-1',
                                    'id' => 'promedio',
                                    'placeholder'=>'Promedio'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('name',Request::get('name'),['class' => 'form-control  mx-1', 'placeholder' => 'Nombre o No Control', 'onfocus' => 'this.value=""']) !!}

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
            <a href="{{ route('egresados.create') }}">
                <i class="fas fa-plus"></i>
            </a>
            <a class="float-right  text-black-50" href="{{ route('imprimirpdf', ['option' => 7, 'title' => 'no', 'typedoc' => 0, 'carrera_id'=> Request::get('carrera_id'),'sexo'=> Request::get('sexo'),'promedio'=> Request::get('promedio'),'name'=> Request::get('name')]) }}" target="_blank"><i class="far fa-file-excel"></i></a>
            <a class="float-right mr-3 text-black-50" href="{{ route('imprimirpdf', ['option' => 7, 'title' => 'no', 'typedoc' => 1, 'carrera_id'=> Request::get('carrera_id'),'sexo'=> Request::get('sexo'),'promedio'=> Request::get('promedio'),'name'=> Request::get('name')]) }}" target="_blank"><i class="far fa-file-pdf"></i></a>
        </h1>
        <span class="float-right">Resultados: {{ $egresados->total() }}</span>

    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col" >#</td>
            <td scope="col">No° Control</td>
            <td scope="col" >Nombre</td>
            <td scope="col">Carrera</td>
            <td scope="col">Sexo</td>
            <td scope="col">Fecha de Egreso</td>
            <td scope="col">Promedio</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($egresados as $egresado)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $egresado->no_control }}</td>
                <td>{{ $egresado->nombre }} </td>
                <td>{{ $egresado->carreras($egresado->carrera_id)->nombre }}</td>
                <td>{{ $egresado->sexo }}</td>
                <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
                <td>{{ $egresado->promedio }}</td>
                <td>{{ $egresado->telefono }}</td>
                <td>
                    <a href="{{ route('egresados.show',$egresado) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('egresados.edit',$egresado) }}">
                        <i class="fas fa-user-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $egresados->appends(['carrera_id'=> Request::get('carrera_id'),'sexo'=> Request::get('sexo'),'promedio'=> Request::get('promedio'),'name'=> Request::get('name')])->render() !!}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" >

        function sendForm() {
            document.getElementById("filtter").submit();
        }

        jQuery(function ($) {
            $('#carrera').select2({
                tags:true,
                tokenSeparators:[','],
            });
            $("#carrera").change(function(){
                sendForm();
            });
            $("#sexo").change(function(){
                sendForm();
            });
            $("#promedio").change(function(){
                sendForm();
            });

        });
    </script>
@endsection


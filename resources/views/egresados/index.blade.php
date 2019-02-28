@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'egresados.index' , 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('carrera_id',
                                $carerras,
                                null,
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'carrera',
                                    'placeholder'=>'Seleccione una Carrera'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!!
                            Form::select('sexo',
                                ['Masculino'=>'Masculino','Femenino'=>'Femenino','Indefinido'=>'Indefinido'],
                                null,
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
                                null,
                                [
                                    'class' => ' form-control mx-1',
                                    'id' => 'sexo',
                                    'placeholder'=>'Promedio'

                                ]
                            )
                         !!}
                    </div>
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
    <hr>

    <div class="container">
        <h1>{{ $title }}</h1>

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
                {!! $egresados->render() !!}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" >
        /*jQuery(function ($) {
            $("#carrera").change(event =>{
                url();
            });
            $("#inputPromedio").change(event =>{
                url();
            });
            function url () {
                var url = "{{ Route('egresados.index') }}";
                if($.isNumeric($("#carrera").val()) && $.isNumeric($("#inputPromedio").val())){
                    url += "?carrera="+$("#carrera").val()+"&promedio="+$("#inputPromedio").val();
                }else if($.isNumeric($("#carrera").val())){
                    url += "?carrera="+$("#carrera").val();
                }else{
                    url += "?promedio="+ $("#inputPromedio").val();
                }
                window.location.replace(url);
            }
        });*/

    </script>
@endsection

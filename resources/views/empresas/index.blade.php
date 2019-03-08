@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'empresas.index' , 'method' => 'GET', 'class' => 'form-inline pull-right']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('ciudad',
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
    <hr>
    <h1>{{ $title }}</h1>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">Nombre</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Domicilio</td>
            <td scope="col">Telefono</td>
            <td scope="col">Contacto</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->ciudad->nombre }}</td>
                <td>{{ $empresa->domicilio }}</td>
                <td>{{ $empresa->telefono}}</td>
                <td>{{ $empresa->contacto }}</td>
                <td>
                    <a href="{{ route('empresas.show',$empresa) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('empresas.edit',$empresa) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
        <div class="text-center">
                {!! $empresas->render() !!}

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" >
        jQuery(function ($) {
            $("#estado").change(event =>{
                url();
            });
            function url () {
                var url = "{{ Route('empresas.index') }}";
                if($.isNumeric($("#estado").val())){
                    url += "?estado="+$("#estado").val();
                }
                window.location.replace(url);
            }
        });

    </script>
@endsection

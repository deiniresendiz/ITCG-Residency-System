@extends('layouts.admin')

@section('content')
    <br>
    <div class="container row">
        <span class="mr-3 ">Ordenar Por: </span>
        {!!
            Form::select('city_id',
                $citys,
                null,
                [
                    'placeholder' => 'Estado',
                    'class' => 'p-auto form-control col-2',
                    'id' => 'estado'

                ]
            )
         !!}
    </div>
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
        <div class="text-center">
            @if(Request::get('estado'))
                {!! $empresas->appends('estado', Request::get('estado'))->links() !!}
            @else
                {!! $empresas->links() !!}
            @endif
        </div>
    </table>
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

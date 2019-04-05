@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/empresas">Empresas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Empresa</li>
@endsection
@section('content')
    <br>


    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $empresa->nombre }}</h1>
    {!!
        Form::model(
            $empresa,
            [
                'route' => ['empresas.update', $empresa,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('empresas.partials.form')

    {!! Form::close() !!}
    </div>
    <script type="application/javascript">
        var estado = document.getElementById('stateEmpresa');
        estado.value = document.getElementById('id_estado').value;
    </script>
@endsection

@section('script')
    <script type="text/javascript" >
        jQuery(function ($) {
            $('#townEmpresa').select2({
                placeholder:'Seleccione una ciudad',
                tags:true,
                tokenSeparators:[','],

            });
            $('#stateEmpresa').select2({
                placeholder:'Seleccione un Estado',
            });
        });

        $("#stateEmpresa").change(event =>{
            $.get(`townsedit/${event.target.value}`, function (res, state) {
                $("#townEmpresa").empty();
                $( "#townEmpresa" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townEmpresa").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });
    </script>
@endsection

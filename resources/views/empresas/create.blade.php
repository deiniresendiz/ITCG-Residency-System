@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/empresas">Empresas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva Empresa</li>
            </ol>
        </nav>
    </div>
    <div class="container">
    <h1><i class="fas fa-building"></i> Nueva Empresa</h1>
        <hr>
    {!!
        Form::model(
            $empresa = new \App\Empresas(),
            [
                'route' => 'empresas.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('empresas.partials.form')


    {!! Form::close() !!}
    </div>
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
            $.get(`towns/${event.target.value}`, function (res, state) {
                $("#townEmpresa").empty();
                $( "#townEmpresa" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townEmpresa").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });
    </script>
@endsection

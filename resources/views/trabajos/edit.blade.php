@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/trabajos">Trabajos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Trabajo</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $trabajo->puesto }}</h1>
    {!!
        Form::model(
            $trabajo,
            [
                'route' => ['trabajos.update', $trabajo,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
    </div>
    <script type="application/javascript">
        var estado = document.getElementById('stateTraajos');
        estado.value = document.getElementById('id_estado').value;
    </script>
@endsection

@section('script')
    <script type="text/javascript" >

        jQuery(function ($) {
            $('#townTrabajos').select2({
                placeholder:'Seleccione una ciudad',
                tags:true,
                tokenSeparators:[','],
            });
            $('#stateTraajos').select2({
                placeholder:'Seleccione un Estado',
            });
            $('#area_id').select2({
                placeholder:'Seleccione el Area Profesional',
                tags:true,
                tokenSeparators:[','],
            });
            $('#empresa_id').select2({
                placeholder:'Seleccione una empresa',
                tags:true,
                tokenSeparators:[','],
            });
        });

        $("#stateTraajos").change(event =>{
            $.get(`townsedit/${event.target.value}`, function (res, state) {
                $("#townTrabajos").empty();
                $( "#townTrabajos" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townTrabajos").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });
    </script>
@endsection

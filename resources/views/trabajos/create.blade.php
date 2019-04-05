@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/trabajos">Trabajos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Trabajo</li>
@endsection

@section('content')
    <br>
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-briefcase"></i>
        Publicar Nuevo Empleo</h1>

    {!!
        Form::model(
            $trabajo= new \App\BolsaTrabajo(),
            [
                'route' => 'trabajos.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('trabajos.partials.form')

    {!! Form::close() !!}
    </div>
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
            $.get(`towns/${event.target.value}`, function (res, state) {
                $("#townTrabajos").empty();
                $( "#townTrabajos" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townTrabajos").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });
    </script>
@endsection

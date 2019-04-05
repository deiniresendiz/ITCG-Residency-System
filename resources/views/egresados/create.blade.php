@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Egresado</li>
@endsection
@section('content')
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-user-edit"></i>
        Nuevo Egresado</h1>
        <hr>
    {!!
        Form::model(
            $egresado = new \App\Egresados(),
            [
                'route' => 'egresados.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script type="text/javascript" >
        jQuery(function ($) {
            $('#townEgresados').select2({
                placeholder:'Seleccione una ciudad',
                tags:true,
                tokenSeparators:[','],
            });
            $('#stateEgresados').select2({
                placeholder:'Seleccione un Estado',
            });
            $('#carrera_id').select2({
                placeholder:'Seleccione una Carrera',
            });
            $('#idioma_id').select2({
                placeholder:'Seleccione un idioma',
                tags:true,
                tokenSeparators:[','],
            });
        });
        $("#stateEgresados").change(event =>{
            $.get(`towns/${event.target.value}`, function (res, state) {
                $("#townEgresados").empty();
                $( "#townEgresados" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townEgresados").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });


    </script>
@endsection

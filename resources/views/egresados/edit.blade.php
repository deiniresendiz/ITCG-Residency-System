@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/egresados">Egresados</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modificando Egresado</li>
@endsection

@section('content')
    <br>
    <br>
    <div class="container">
        <h1>
            <i class="fas fa-user-edit"></i> Modificar Egresado
        </h1>
    {!!
        Form::model(
            $egresado,
            [
                'route' => ['egresados.update',$id,$egresado],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('egresados.partials.form')

    {!! Form::close() !!}
    </div>
    <script type="application/javascript">
        var estado = document.getElementById('stateEgresados');
        estado.value = document.getElementById('id_estado').value;
    </script>
@endsection
@section('script')
    <script type="text/javascript" >
        $("#stateEgresados").change(event =>{
            $.get(`townsedit/${event.target.value}`, function (res, state) {
                $("#townEgresados").empty();
                $( "#townEgresados" ).prop( "disabled", false );
                res.forEach(element => {
                    $("#townEgresados").append(`<option value=${element.id}> ${element.nombre} </option>`);
                })
            });
        });
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



    </script>
@endsection




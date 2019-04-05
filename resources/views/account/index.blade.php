@extends('layouts.admin')

@section('content')
    <br>
    <br>
    @if($egresado == null)
        <div class="container border">
            <h2 class="mt-1">Datos de Acceso</h2>
            {!!
                Form::model(
                    $user,
                    [
                        'route' => ['account.update',$id],
                        'files' => 'true',
                        'method' => 'PUT',
                    ]
                )
             !!}

            @include('account.partials.user')

            {!! Form::close() !!}
        </div>
    @endif

    <br>


    @if($egresado != null)
        <div class="container border">
            <h2 class="mt-1">Datos personales</h2>
            {!!
            Form::model(
                $egresado,
                [
                    'route' => ['account.update',$id],
                    'files' => 'true',
                    'method' => 'PUT',
                ]
            )
         !!}
            <hr>

            @include('egresados.partials.form')
            {!! Form::close() !!}
        </div>
        <script type="application/javascript">
            var estado = document.getElementById('stateEgresados');
            estado.value = document.getElementById('id_estado').value;
        </script>
    @endif

    <br>
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 border">
                <h2 class="mt-1">Cambio de Contaseña</h2>
                <hr>
                @include('account.partials.password')
            </div>

        </div>

    </div>

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

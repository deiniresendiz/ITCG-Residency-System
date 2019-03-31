@extends('layouts.admin')


@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/ocupaciones">Mis Trabajos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Trabajo</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $ocupacion->puesto }}</h1>
    {!!
        Form::model(
            $ocupacion,
            [
                'route' => ['ocupaciones.update', $ocupacion,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('ocupaciones.partials.form')

    {!! Form::close() !!}
    </div>

@endsection

@section('script')
    <script type="text/javascript" >

        jQuery(function ($) {

            $('#empresa_id').select2({
                placeholder:'Seleccione una empresa',
                tags:true,
                tokenSeparators:[','],
            });
        });

    </script>
@endsection

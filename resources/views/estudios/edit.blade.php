@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/estudios">Mis Estudios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Estudio</li>
@endsection
@section('content')
    <br>
    <br>
    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $estudio->instituto }}</h1>
    {!!
        Form::model(
            $estudio,
            [
                'route' => ['estudios.update', $estudio,$id],
                'files' => 'false',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('estudios.partials.form')

    {!! Form::close() !!}
    </div>

@endsection

@section('script')
    <script type="text/javascript" >

        jQuery(function ($) {
            $('#posgrado_id').select2({
                placeholder:'Seleccione un posgrado',
                tags:true,
                tokenSeparators:[','],
            });
        });

    </script>
@endsection

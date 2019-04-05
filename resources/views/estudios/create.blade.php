@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/estudios">Mis Estudios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Estudio</li>
@endsection

@section('content')
    <br>
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-university"></i>
        Nuevo Estudio</h1>

    {!!
        Form::model(
            $estudio= new \App\Estudios(),
            [
                'route' => 'estudios.store',
                'files' => 'false'
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

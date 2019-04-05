@extends('layouts.admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/ocupaciones">Mis Trabajos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Nuevo Trabajo</li>
@endsection
@section('content')
    <br>
    <div class="container">
    <h1>
        <i class="fas fa-briefcase"></i>
        Nuevo Trabajo</h1>

    {!!
        Form::model(
            $ocupacion= new \App\Ocupaciones(),
            [
                'route' => 'ocupaciones.store',
                'files' => 'true'
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

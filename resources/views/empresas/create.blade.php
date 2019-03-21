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

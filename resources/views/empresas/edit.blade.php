@extends('layouts.admin')

@section('content')
    <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/empresas">Empresas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Empresa</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h1><i class="fas fa-edit"></i> {{ $empresa->nombre }}</h1>
    {!!
        Form::model(
            $empresa,
            [
                'route' => ['empresas.update', $empresa,$id],
                'files' => 'true',
                'method' => 'PUT'
            ]
        )
     !!}

    @include('empresas.partials.form')

    {!! Form::close() !!}
    </div>
@endsection

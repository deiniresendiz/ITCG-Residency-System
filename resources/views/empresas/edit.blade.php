@extends('layouts.admin')

@section('content')
    <h1>Editar {{ $empresa->nombre }}</h1>
    <div class="container">
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

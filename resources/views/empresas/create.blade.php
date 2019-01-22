@extends('layouts.admin')

@section('content')
    <h1>Nueva Empresa</h1>
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
@endsection

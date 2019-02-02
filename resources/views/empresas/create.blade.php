@extends('layouts.admin')

@section('content')
    <div class="container">
    <h1>Nueva Empresa</h1>
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

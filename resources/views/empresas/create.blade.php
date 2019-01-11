@extends('layouts.admin')

@section('content')
    <h1>Movement New</h1>
    {!!
        Form::model(
            $empresa = new \App\Movements(),
            [
                'route' => 'empresas.store',
                'files' => 'true'
            ]
        )
     !!}

    @include('empresas.partials.form')

    {!! Form::close() !!}
@endsection

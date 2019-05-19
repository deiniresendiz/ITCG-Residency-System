@extends('layouts.admin')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Trabajos</li>
@endsection
@section('content')
    <br>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    {!! Form::open([ 'route' => 'trabajos.index' , 'method' => 'GET', 'class' => 'form-inline pull-right','id' => 'filtter']) !!}
                    <div class="form-group">
                        {!!
                            Form::select('town',
                                $citys,
                                Request::get('town'),
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'ciudad',
                                    'placeholder'=>'Seleccione una Ciudad'

                                ]
                            )
                         !!}
                    </div>
                    <div class="form-group">
                        {!!
                            Form::select('area',
                                $areas,
                                Request::get('area'),
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'area',
                                    'placeholder'=>'Seleccione una Area'

                                ]
                            )
                         !!}
                    </div>

                    <div class="form-group">
                        {!!
                            Form::select('company',
                                $empresas,
                                Request::get('company'),
                                [
                                    'class' => 'form-control mx-1',
                                    'id' => 'empresa',
                                    'placeholder'=>'Seleccione una Empresa'

                                ]
                            )
                         !!}
                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="container">

        <h1>{{ $title }}
            @if(Auth::user()->isAdmin == 1)
                <a href="{{ route('trabajos.create') }}">
                    <i class="fas fa-plus"></i>
                </a>
                <a class="float-right text-black-50" href="{{ route('imprimirpdf', ['result' => json_encode($trabajos),'option' => 3, 'title' => $title]) }}" target="_blank"><i class="fas fa-print"></i></a>
            @endif
        </h1>
        <span class="float-right">Resultados: {{ $y }}</span>
    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col">Empresa</td>
            <td scope="col">Puesto</td>
            <td scope="col">Area</td>
            <td scope="col">Ciudad</td>
            <td scope="col">Contracto</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($trabajos as $trabajo)
            <tr>
                <td>{{ $trabajo->empresa->nombre }}</td>
                <td>{{ $trabajo->puesto }}</td>
                <td>{{ $trabajo->area->nombre }}</td>
                <td>{{ $trabajo->ciudad->nombre }}</td>
                <td>{{ $trabajo->contracto }}</td>
                <td>{{ $trabajo->telefono }}</td>
                <td>
                    <a href="{{ route('trabajos.show',$trabajo) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td>
                <td>
                    @if(Auth::user()->isAdmin == 1)
                        <a href="{{ route('trabajos.edit',$trabajo) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            {!! $trabajos->appends(['are'=> Request::get('area'),'puesto'=> Request::get('puesto'),'company'=> Request::get('company'),'town'=> Request::get('town')])->render() !!}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" >
        function sendForm() {
            document.getElementById("filtter").submit();
        }
        jQuery(function ($) {

            $('#ciudad').select2({
                tags:true,
                tokenSeparators:[','],
            });
            $('#ciudad').change(()=>sendForm());
            $('#area').select2({
                tags:true,
                tokenSeparators:[','],
            });
            $('#area').change(()=>sendForm());
            $('#empresa').select2({
                tags:true,
                tokenSeparators:[','],
            });
            $('#empresa').change(()=>sendForm());

        });

    </script>
@endsection


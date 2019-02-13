@extends('layouts.admin')

@section('content')
    <br>
    <div class="container row">
                <span class="mr-3 ">Ordenar Por: </span>
                {!!
                    Form::select('carrera_id',
                        $carerras,
                        null,
                        [
                            'placeholder' => 'Carreras',
                            'class' => 'p-auto form-control col-2',
                            'id' => 'carrera'

                        ]
                    )
                 !!}
        <select id="inputPromedio" class="ml-2 p-auto form-control col-2">
            <option selected>PROMEDIO</option>
            <option value="0" >Mayor a Menor</option>
            <option value="1" >Menor a Mayor</option>
        </select>


    </div>
    <hr>
    <h1>{{ $title }}</h1>
    <div class="container">


    <table class="table table-light table-striped table-hover">
        <thead class="thead-dark bg-primary font-weight-bold text-white">
        <tr>
            <td scope="col" >#</td>
            <td scope="col">No° Control</td>
            <td scope="col" >Nombre</td>
            <td scope="col">Carrera</td>
            <td scope="col">Sexo</td>
            <td scope="col">Edad</td>
            <td scope="col">Fecha de Egreso</td>
            <td scope="col">Promedio</td>
            <td scope="col">Telefono</td>
            <td scope="col" colspan="2">Acciones</td>
        </tr>
        </thead>
        <tbody>
        @foreach($egresados as $egresado)
            <tr>
                <td>{{ $x++ }}</td>
                <td>{{ $egresado->no_control }}</td>
                <td>{{ $egresado->nombre }} </td>
                <td>{{ $egresado->carreras($egresado->carrera_id)->nombre }}</td>
                <td>{{ $egresado->sexo }}</td>
                <td>{{ \Illuminate\Support\Carbon::parse($egresado->nacimiento)->age }}</td>
                <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
                <td>{{ $egresado->promedio }}</td>
                <td>{{ $egresado->telefono }}</td>
                <td>
                    <a href="{{ route('egresados.show',$egresado) }}">
                        Mostrar
                    </a>
                </td>
                <td>
                    <a href="{{ route('egresados.edit',$egresado) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="text-center">
            @if(Request::get('carrera'))
                {!! $egresados->appends('carrera', Request::get('carrera'))->links() !!}
            @elseif(Request::get('promedio'))
                {!! $egresados->appends('promedio', Request::get('promedio'))->links() !!}
            @else
                {!! $egresados->links() !!}
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" >
        jQuery(function ($) {
            $("#carrera").change(event =>{
                url();
            });
            $("#inputPromedio").change(event =>{
                url();
            });
            function url () {
                var url = "{{ Route('egresados.index') }}";
                if($.isNumeric($("#carrera").val()) && $.isNumeric($("#inputPromedio").val())){
                    url += "?carrera="+$("#carrera").val()+"&promedio="+$("#inputPromedio").val();
                }else if($.isNumeric($("#carrera").val())){
                    url += "?carrera="+$("#carrera").val();
                }else{
                    url += "?promedio="+ $("#inputPromedio").val();
                }
                window.location.replace(url);
            }
        });

    </script>
@endsection

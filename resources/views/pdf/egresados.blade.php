<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>


<table class="table table-light table-striped table-hover">
    <thead class="thead-dark bg-primary font-weight-bold text-white">
    <tr>
        <td scope="col" >#</td>
        <td scope="col">No° Control</td>
        <td scope="col" >Nombre</td>
        <td scope="col">Carrera</td>
        <td scope="col">Sexo</td>
        <td scope="col">Egreso</td>
        <td scope="col">Promedio</td>
        <td scope="col">Telefono</td>
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
            <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
            <td>{{ $egresado->promedio }}</td>
            <td>{{ $egresado->telefono }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-center">
    {!! $egresados->appends(['carrera_id'=> Request::get('carrera_id'),'sexo'=> Request::get('sexo'),'promedio'=> Request::get('promedio'),'name'=> Request::get('name')])->render() !!}
</div>
</body>
</html>

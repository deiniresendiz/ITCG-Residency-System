
<table>
    <tr>
        <td colspan="8">
            <h3> <b>Reporte de egresados</b></h3>
        </td>
    </tr>
    <tr>
        <td colspan="8">
            <h6>Reporte generado el: {{ $date }}</h6>
        </td>
    </tr>
    <tr>
        <td colspan="8">
        </td>
    </tr>
    <thead>
    <tr>
        <td >#</td>
        <td >No° Control</td>
        <td >Nombre</td>
        <td >Carrera</td>
        <td >Sexo</td>
        <td >Fecha de Egreso</td>
        <td >Promedio</td>
        <td >Telefono</td>
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
            <td>{{ ($egresado->telefono != '')?$egresado->telefono:'N/A' }}</td>

        </tr>
    @endforeach
    </tbody>
</table>


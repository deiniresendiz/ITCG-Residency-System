
<table>
    <tr>
        <td colspan="9">
            <h3> <b>Reporte de cursos</b></h3>
        </td>
    </tr>
    <tr>
        <td colspan="9">
            <h6>Reporte generado el: {{ $date }}</h6>
        </td>
    </tr>
    <tr>
        <td colspan="9">
        </td>
    </tr>
    <thead>
    <tr>
        <td >#</td>
        <td colspan="2">Nombre</td>
        <td colspan="2">Instructor</td>
        <td >Lugar</td>
        <td >Fecha de Inicio</td>
        <td >Precio</td>
        <td >Estado</td>
    </tr>
    </thead>
    <tbody>
    @foreach($cursos as $curso)
        <tr>
            <td>{{ $x++ }}</td>
            <td colspan="2">{{ $curso->nombre }}</td>
            <td colspan="2">{{ $curso->instructor }}</td>
            <td>{{ $curso->lugar }}</td>
            <td>{{ date_format($curso->fecha_inicio,'d/m/Y')}}</td>
            <td>{{ $curso->precio }}</td>
            <td>{{ $curso->estado }}</td>
        </tr>
    @endforeach
    </tbody>
</table>


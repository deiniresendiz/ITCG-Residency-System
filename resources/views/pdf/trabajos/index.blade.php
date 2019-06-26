
<table>
    <tr>
        <td colspan="7">
            <h3> <b>Reporte de empleos</b></h3>
        </td>
    </tr>
    <tr>
        <td colspan="7">
            <h6>Reporte generado el: {{ $date }}</h6>
        </td>
    </tr>
    <tr>
        <td colspan="7">
        </td>
    </tr>
    <thead>
    <tr>
        <td>#</td>
        <td >Empresa</td>
        <td >Puesto</td>
        <td >Area</td>
        <td >Ciudad</td>
        <td >Contracto</td>
        <td >Telefono</td>

    </tr>
    </thead>
    <tbody>
    @foreach($trabajos as $trabajo)
        <tr>
            <td>{{ $x++ }}</td>
            <td>{{ $trabajo->empresa->nombre }}</td>
            <td>{{ $trabajo->puesto }}</td>
            <td>{{ $trabajo->area->nombre }}</td>
            <td>{{ $trabajo->ciudad->nombre }}</td>
            <td>{{ $trabajo->contracto }}</td>
            <td>{{ $trabajo->telefono }}</td>

        </tr>
    @endforeach
    </tbody>
</table>



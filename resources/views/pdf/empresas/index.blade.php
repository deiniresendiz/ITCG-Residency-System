
<table>
    <tr>
        <td colspan="8">
            <h3> <b>Reporte de empresas</b></h3>
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
        <td>#</td>
        <td colspan="2">Nombre</td>
        <td >Ciudad</td>
        <td colspan="2">Domicilio</td>
        <td >Telefono</td>
        <td >Contacto</td>
    </tr>
    </thead>
    <tbody>
    @foreach($empresas as $empresa)
        <tr>
            <td>{{ $x++ }}</td>
            <td colspan="2">{{ $empresa->nombre }}</td>
            <td>{{ ($empresa->ciudad != null)?$empresa->ciudad->nombre:'N/A' }}</td>
            <td colspan="2">{{ $empresa->domicilio }}</td>
            <td>{{ $empresa->telefono}}</td>
            <td>{{ $empresa->contacto }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>

@include('pdf.encabezado')

<div class="container">
    <h1>Datos del egresado</h1>

        <table >
            <tbody>
            <tr>
                <td>No° Control: </td>
                <td>{{ $egresado->no_control }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Nombre: </td>
                <td>{{ $egresado->nombre }}</td>
            </tr>
            <tr>
                <td>Carrera: </td>
                <td>{{ $egresado->carreras($egresado->carrera_id)->nombre }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Curp: </td>
                <td>{{ $egresado->curp }}</td>
            </tr>
            <tr>
                <td>Sexo: </td>
                <td>{{ $egresado->sexo }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Fecha de Nacimiento: </td>
                <td>{{ date_format($egresado->nacimiento,'d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Estado Civil: </td>
                <td>{{ $egresado->estado_civil }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Fecha de Egresado: </td>
                <td>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Ciudad: </td>
                <td>{{ $egresado->ciudad->nombre }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Telefono: </td>
                <td>{{ $egresado->telefono }}</td>
            </tr>
            <tr>
                <td>Celular: </td>
                <td>{{ $egresado->celular }}</td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td>Correo: </td>
                <td>{{ $egresado->email }}</td>
            </tr>
            <tr>
                <td>Promedio: </td>
                <td>{{ $egresado->promedio }}</td>

            </tr>
            </tbody>
        </table>

</div>

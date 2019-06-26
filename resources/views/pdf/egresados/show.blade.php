<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de egresado</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <img src="img/banner.png" style="width: 100%;"/>
    <br>
    <hr>
        <span class="float-right">Reporte generado el: {{ $date }}</span>
        <br>
        @if($egresado->imagen)
            <div class="d-flex justify-content-center">
                <a href="{{ asset($egresado->imagen) }}"  target="_blank" >
                    <img src="{{ asset($egresado->imagen) }}" alt="Foto de Perfil" class="img-thumbnail align-content-center img-fluid" >
                </a>
            </div>
        @endif
            <table>
                <tr>
                    <td>
                        <b>No° Control: </b>{{ $egresado->no_control }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Nombre: </b>{{ $egresado->nombre }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Carrera: </b>{{ $egresado->carreras($egresado->carrera_id)->nombre }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Curp: </b>{{ $egresado->curp }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Sexo: </b>{{ $egresado->sexo }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Fecha de Nacimiento: </b>{{ date_format($egresado->nacimiento,'d/m/Y') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Estado Civil: </b>{{ $egresado->estado_civil }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Fecha de Egresado: </b>{{ date_format($egresado->fecha_egreso,'d/m/Y') }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Ciudad: </b>{{ $egresado->ciudad->nombre }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Telefono: </b>{{ $egresado->telefono }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Celular: </b>{{ $egresado->celular }}
                    </td>
                    <td style="width: 20px">
                        <blockquote style="width: 10px"></blockquote>
                    </td>
                    <td>
                        <b>Correo: </b>{{ $egresado->email }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Promedio: </b>{{ $egresado->promedio }}
                    </td>
                </tr>
            </table>
        <br>

        <p class="h3">Estudios</p>
        <table class="table table-light table-striped table-hover">
            <thead class="thead-dark bg-primary font-weight-bold text-white">
            <tr>
                <td scope="col" >#</td>
                <td scope="col">Postgrado</td>
                <td scope="col" >Instituto</td>
                <td scope="col">Nivel</td>
                <td scope="col">Fecha de Inicio</td>
                <td scope="col">Fecha de Finalizacion</td>
            </tr>
            </thead>
            <tbody>
            @foreach($estudios as $estudio)
                <tr>
                    <td>{{ $x++ }}</td>
                    <td>{{ $estudio->posgrado->nombre }}</td>
                    <td>{{ $estudio->instituto }}</td>
                    <td>{{ $estudio->nivel }}</td>
                    <td>{{ date_format($estudio->fecha_inicio,'d/m/Y') }}</td>
                    <td>{{ date_format($estudio->fecha_final,'d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <p class="h3">Empleos</p>
        <table class="table table-light table-striped table-hover">
            <thead class="thead-dark bg-primary font-weight-bold text-white">
            <tr>
                <td scope="col" >#</td>
                <td scope="col">Puesto</td>
                <td scope="col" >Empresa</td>
                <td scope="col">Antiguedad</td>
                <td scope="col">Descripcion</td>
            </tr>
            </thead>
            <tbody>
            @foreach($empleos as $empleo)
                <tr>
                    <td>{{ $y++ }}</td>
                    <td>{{ $empleo->puesto }}</td>
                    <td>{{ $empleo->empresa->nombre }}</td>
                    <td>{{ $empleo->antiguedad }}</td>
                    <td>{{ $empleo->descripcion }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</body>
</html>





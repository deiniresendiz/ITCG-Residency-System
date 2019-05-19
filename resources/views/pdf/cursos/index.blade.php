
<link type="text/css" rel="stylesheet" href="css/pdf.css" >
<style type="text/css">

    /*table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}*/

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, div{
        margin-right: 0px;
        margin-left: 0px;
    }

    table, th, td {
        border: 1px solid black;
    }

    th {
        background-color: gray;
        color: white;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {background-color: #f2f2f2;}

    img{
        width: 100%;
    }
    h2 {
        margin: auto;
        width:  100%;
        text-align: center;
    }
    h4 {
        width: 100%;
        text-align: right;
        padding: 10mm;
    }
    table.page_footer {width: 100%; border: none; padding: 2mm}
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt; margin-left: 0px;">

    <page_header>
        <img src="img/banner.png" />
        <br>
        <h2>{{$title}}</h2>
        <h4>Generado el: {{ date('d/m/Y')}} &nbsp;&nbsp;&nbsp;&nbsp;  </h4>
        <br>
    </page_header>
    <div style="margin-top: 20mm;margin-left: 0px;">
        <table style="margin-left: 0px;margin-top: 20mm;">
            <thead>
            <tr style="background-color: #005cbf;color: white">
                <td scope="col">Nombre</td>
                <td scope="col">Instructor</td>
                <td scope="col">Lugar</td>
                <td scope="col">Fecha de Inicio</td>
                <td scope="col">Precio</td>
                <td scope="col">Estado</td>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < sizeof( $data ); $i++)
                <tr>
                    <td>{{ $data[$i]->nombre }}</td>
                    <td>{{ $data[$i]->instructor }}</td>
                    <td>{{ $data[$i]->lugar }}</td>
                    <td>{{ substr($data[$i]->fecha_inicio,0,10 )}}</td>
                    <td>{{ $data[$i]->precio }}</td>
                    <td>{{ $data[$i]->estado }}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>

    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right; border: 1px solid white">
                    Hoja [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
</page>




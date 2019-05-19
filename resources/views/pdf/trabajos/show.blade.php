
<link type="text/css" rel="stylesheet" href="css/pdf.css" >
<style type="text/css">

    /*table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}*/


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
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <img src="img/banner.png" />
        <br>
        <h2>{{$title}}</h2>
        <h4>Generado el: {{ date('d/m/Y')}} &nbsp;&nbsp;&nbsp;&nbsp;  </h4>
        <br>
        <div>
            <div>
                <img src="{{ $data->imagen }}" style="width: 100%">
            </div>
            <br>
            <br>
            <div>
                <div style="margin: 5px; width: 80%;">
                    <p style="margin-left: 10px">
                        <b>Puesto:</b> {{ $data->puesto }}<br>
                        <b>Tipo:</b> {{ $data->tipo }}<br>
                        <b>Fecha:</b> {{ substr($data->fecha,0,10 ) }}<br>
                        <b>Contracto:</b> {{ $data->contracto }}<br>
                        <b>Telefono:</b> {{ $data->telefono }}<br>
                        <b>Correo:</b> {{ $data->email }}<br>
                        <b>Sueldo:</b> {{ $data->sueldo }}<br>
                        <b>Estado:</b> {{ $data->estado }}<br>
                    </p>

                </div>
            </div>
        </div>
    </page_header>

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




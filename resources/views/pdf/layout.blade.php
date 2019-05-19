<link type="text/css" rel="stylesheet" href="css/pdf.css" >
<style type="text/css">

    /*table.page_footer {width: 100%; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}*/

    table {
        border-collapse: collapse;
        width: 100%;
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
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <img src="img/banner.png" />
        <br>
        <h2>{{$title}}</h2>
        <h4>Reporte generado el: {{ date('d/m/Y')}} &nbsp;&nbsp;&nbsp;&nbsp;  </h4>
        <br>
    </page_header>
    <div style="margin-top: 20mm;">
        <table style="margin: 3mm;margin-top: 20mm;">
            <thead>
            <tr style="background-color: #005cbf;color: white">
                @yield('tableHead')
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right; border: 1px solid white">
                    page [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
</page>



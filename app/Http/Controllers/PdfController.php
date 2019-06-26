<?php

namespace App\Http\Controllers;


use App\BolsaTrabajo;
use App\Cursos;
use App\Egresados;
use App\Empresas;
use App\Estudios;
use App\Ocupaciones;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spipu\Html2Pdf\Html2Pdf;

class PdfController extends Controller
{

    public function __construct()
    {
        set_time_limit(0);
        ini_set("max_execution_time", 6000);
        $this->middleware('auth');
        ini_set("memory_limit", "300M");
    }

    public function index(Request $request)
    {

        $c = json_decode($request->get('result'),true);
        $c = $c['data'];


        return $c;
    }

    public function pdfprint(Request $request)
    {
        $title = $request->get('title');
        $option = $request->get('option');
        if($title != 'no') {
            $data = json_decode($request->get('result'), true);

            //return $this->data($option,$title,$data);
            $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 1);
            $html2pdf->writeHTML($this->data($option, $title, $data), isset($_GET['vuehtml']));
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->Output($this->namePdf($option, $title) . '.pdf');
        }else{
            return $this->data($option,$title,$request);
        }
        //return $this->data($option,$title,$data);
    }

    private function namePdf($option,$title){
        $dateCreate = date('d-M-Y');
        switch ($option){
            case 1:
                return "Cursos".$dateCreate;
                break;
            case 2:
                return "Curso".ucwords($title).$dateCreate;
                break;
            case 3:
                return "Empleos".$dateCreate;
                break;
            case 4:
                return "Empleo".ucwords($title).$dateCreate;
                break;
            case 5:
                return "Empresas".$dateCreate;
                break;
            case 6:
                return "Empresa".ucwords($title).$dateCreate;
                break;
            case 7:
                return "Egresados$dateCreate";
                break;
            case 8:
                return "Egresado".ucwords($title);
                break;
            default:
                return "Reporte".$dateCreate;
        }
    }

    private function data($option,$title,$data){
        switch ($option){
            case 1:
                return $this->cursos($data);
                break;
            case 2:
                return $this->curso($data,$title);
                break;
            case 3:
                return $this->trabajos($data);
                break;
            case 4:
                return $this->trabajo($data,$title);
                break;
            case 5:
                return $this->empresas($data);
                break;
            case 6:
                return $this->empresa($data,$title);
                break;
            case 7:
                return $this->egresados($data);
                break;
            case 8:
                return $this->egresado($data);
                break;
            default:
                return "Reporte";
        }
    }

    public function cursos($request)
    {
        $state = $request->get('state');
        $name = $request->get('name');
        $type = $request->get('typedoc');

        if($type == 0){
            return Excel::download(new InvoicesExportCurso($name,$state), $this->namePdf(1,"").'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        }else{
            return Excel::download(new InvoicesExportCurso($name,$state), $this->namePdf(1,"").'.pdf',\Maatwebsite\Excel\Excel::MPDF);
        }

    }
    public function curso($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.cursos.show',compact('data','title'));

    }
    public function empresas($request)
    {
        $ciudad = $request->get('ciudad');
        $nombre = $request->get('name');
        $type = $request->get('typedoc');

        if($type == 0){
            return Excel::download(new InvoicesExportEmpresas($nombre,$ciudad), $this->namePdf(3,"").'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        }else{
            return Excel::download(new InvoicesExportEmpresas($nombre,$ciudad), $this->namePdf(3,"").'.pdf',\Maatwebsite\Excel\Excel::MPDF);
        }

    }
    public function empresa($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.empresas.show',compact('data','title'));

    }
    public function trabajos($request)
    {
        $area = $request->get('are');
        $pusto = $request->getBaseUrl('puesto');
        $empresa = $request->get('company');
        $ciudad = $request->get('town');
        $type = $request->get('typedoc');

        if($type == 0){
            return Excel::download(new InvoicesExportEmpleos($area,$pusto,$empresa,$ciudad), $this->namePdf(3,"").'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        }else{
            return Excel::download(new InvoicesExportEmpleos($area,$pusto,$empresa,$ciudad), $this->namePdf(3,"").'.pdf',\Maatwebsite\Excel\Excel::MPDF);
        }

    }
    public function trabajo($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.trabajos.show',compact('data','title'));

    }
    public function egresados($request)
    {
        $nombre = $request->get('name');
        $carrera = $request->get('carrera_id');
        $sexo = $request->get('sexo');
        $promedio = $request->get('promedio');
        $type = $request->get('typedoc');

        if($type == 0){
            return Excel::download(new InvoicesExportEgresado($promedio,$nombre,$carrera,$sexo), $this->namePdf(7,"").'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
        }else{
            return Excel::download(new InvoicesExportEgresado($promedio,$nombre,$carrera,$sexo), $this->namePdf(7,"").'.pdf',\Maatwebsite\Excel\Excel::MPDF);
        }
    }


    public function egresado($request)
    {
        $data = $request->get('result');
        $egresado = Egresados::where('id',$data)->first();
        $estudios = Estudios::where('egresado_id',$data)->get();
        $empleos = Ocupaciones::where('egresado_id',$data)->get();
        $x = 1;
        $y = 1;
        $date = date('Y-m-d');
        $view =  \View::make('pdf.egresados.show',compact('egresado','estudios','x','empleos','y','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte');
        //return view('pdf.egresados.show',compact('egresado','estudios','x','empleos','y','date'));
        //return $empleos;


    }


}

class UsersExport implements FromCollection
{
    public function collection()
    {
        return Egresados::select('id','no_control','nombre','carrera_id','sexo','fecha_egreso','telefono','promedio')->get();
    }

}

class InvoicesExportEgresado implements FromView
{
    var $promedio;
    var $nombre;
    var $carrera;
    var $sexo;

    function __construct($promedio, $nombre, $carrera, $sexo)
    {
        $this->promedio = $promedio;
        $this->nombre = $nombre;
        $this->carrera = $carrera;
        $this->sexo = $sexo;
    }

    public function view(): View
    {
        return view('pdf.egresados.index',['egresados' =>
            Egresados::promedio($this->promedio)->orderBy('nombre')->carrera($this->carrera)->nombre($this->nombre)->sexo($this->sexo)->
            select('id','no_control','nombre','carrera_id','sexo','fecha_egreso','telefono','promedio')->get(),
            'x' => 1,
            'date' => date('Y-m-d')
        ]);
    }
}

class InvoicesExportEmpresas implements FromView
{
    var $nombre;
    var $ciudad;

    function __construct($nombre, $ciudad)
    {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
    }

    public function view(): View
    {
        return view('pdf.empresas.index',['empresas' =>
            Empresas::nombre($this->nombre)->ciudad($this->ciudad)->orderBy('nombre')->get(),
            'x' => 1,
            'date' => date('Y-m-d')
        ]);
    }
}

class InvoicesExportEmpleos implements FromView
{
    var $area;
    var $pusto;
    var $empresa;
    var $ciudad;

    function __construct($area,$pusto,$empresa,$ciudad)
    {
        $this->area = $area;
        $this->pusto = $pusto;
        $this->empresa =$empresa;
        $this->ciudad =$ciudad;
    }

    public function view(): View
    {
        return view('pdf.trabajos.index',['trabajos' =>
            BolsaTrabajo::areat($this->area)->name($this->pusto)->empresas($this->empresa)->town($this->ciudad)->orderBy('puesto')->get(),
            'x' => 1,
            'date' => date('Y-m-d')
        ]);

    }
}

class InvoicesExportCurso implements FromView
{
    var $name;
    var $state;


    function __construct($name,$state)
    {
        $this->area = $name;
        $this->pusto = $state;

    }

    public function view(): View
    {
        return view('pdf.cursos.index',['cursos' =>
            Cursos::nombre($this->name)->estado($this->state)->orderBy('fecha_final')->
            select('id','nombre', 'instructor', 'lugar', 'fecha_inicio', 'precio', 'estado')->get(),
            'x' => 1,
            'date' => date('Y-m-d')
        ]);

    }
}

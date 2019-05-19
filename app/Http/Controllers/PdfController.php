<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use function MongoDB\BSON\fromJSON;
use PHPUnit\Util\Json;
use Spipu\Html2Pdf\Html2Pdf;

class PdfController extends Controller
{

    public function __construct()
    {
        set_time_limit(0);
        ini_set('xdebug.max_nesting_level', 120);
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        /*$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($this->cursos(), isset($_GET['vuehtml']));
        $html2pdf->createIndex('Sommaire', 25, 12, false, true, 0);
        $html2pdf->Output('PDF-CF.pdf');*/
        /*$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
        $html2pdf->writeHTML($this->cursos(), isset($_GET['vuehtml']));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->Output($this->namePdf(1,'').'.pdf');*/
        /*$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
       $html2pdf->pdf->SetDisplayMode('fullpage');
       $html2pdf->writeHTML($this->cursos(), isset($_GET['vuehtml']));
       $html2pdf->createIndex('Sommaire', 25, 12, false, true, 0);
       $html2pdf->Output('PDF-CF.pdf');*/
        $c = json_decode($request->get('result'),true);
        $c = $c['data'];


        return $c;
    }

    public function pdfprint(Request $request)
    {
        $data = json_decode($request->get('result'),true);
        $title = $request->get('title');
        $option = $request->get('option');

        //return $this->data($option,$title,$data);
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 1);
        $html2pdf->writeHTML($this->data($option,$title,$data), isset($_GET['vuehtml']));
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->Output($this->namePdf($option,$title).'.pdf');
        //return $this->data($option,$title,$data);
    }

    private function namePdf($option,$title){
        $dateCreate = date('d/M/Y');
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
                return "Egresados.$dateCreate";
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
                return $this->cursos($data,$title);
                break;
            case 2:
                return $this->curso($data,$title);
                break;
            case 3:
                return $this->trabajos($data,$title);
                break;
            case 4:
                return $this->trabajo($data,$title);
                break;
            case 5:
                return $this->empresas($data,$title);
                break;
            case 6:
                return $this->empresa($data,$title);
                break;
            case 7:
                return $this->egresados($data,$title);
                break;
            case 8:
                return $this->egresado($data,$title);
                break;
            default:
                return "Reporte";
        }
    }

    public function cursos($data,$title)
    {
        $x =1;
        $data = $data['data'];
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.cursos.index',compact('data','title','x'));

    }
    public function curso($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.cursos.show',compact('data','title'));

    }
    public function empresas($data,$title)
    {
        $x =1;
        $data = $data['data'];
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.empresas.index',compact('data','title','x'));

    }
    public function empresa($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.empresas.show',compact('data','title'));

    }
    public function trabajos($data,$title)
    {
        $x =1;
        $data = $data['data'];
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.trabajos.index',compact('data','title','x'));

    }
    public function trabajo($data,$title)
    {
        $data = json_encode($data);
        $data = json_decode($data);
        return view('pdf.trabajos.show',compact('data','title'));

    }
    public function egresados($data,$title)
    {
        $x =1;
        $data = $data['data'];
        $data = json_encode($data);
        $data = json_decode($data);
        return $data;
        return view('pdf.egresados.index',compact('data','title','x'));

    }
    public function egresado($data,$title)
    {
        $x =1;
        return view('pdf.cursos.index',compact('data','title','x'));

    }


}

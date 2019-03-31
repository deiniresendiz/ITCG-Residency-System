<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Ciudades;
use App\Egresados;
use App\Estados;
use App\Http\Requests\storeEgresados;
use App\IdiomaDetalle;
use App\Idiomas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EgresadosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $title = "Egresados";
        $page_no = ($request->get('page'))? $request->get('page'):1;

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;

        $nombre = $request->get('name');
        $carrera = $request->get('carrera_id');
        $sexo = $request->get('sexo');
        $promedio = $request->get('promedio');
        $egresados = Egresados::promedio($promedio)->orderBy('nombre')->carrera($carrera)->nombre($nombre)->sexo($sexo)->paginate();
        $y = Egresados::promedio($promedio)->orderBy('nombre')->carrera($carrera)->nombre($nombre)->sexo($sexo)->count();
        return view('egresados.index',compact('egresados','title','x','carerras','y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $state = Estados::orderBy('nombre')->pluck('nombre', 'id');
        $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
        $idiomas = Idiomas::orderBy('nombre')->pluck('nombre','id');
        $idiomas_eg = null;
        return view('egresados.create', compact('carerras','state','town','idiomas','idiomas_eg'));
    }
    public function getTowns(Request $request ,$id){
        if($request->ajax()){
            $citys = Ciudades::towns($id);
            return response()->json($citys);
        }
    }
    public function getTownsEdit(Request $request, $eg, $id){
        if($request->ajax()){
            $citys = Ciudades::towns($id);
            return response()->json($citys);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 'carreara_id',
    'ciudad_id',
    'no_control',
    'nombre',
    'sexo',
    'estado_civil',
    'nacimiento',
    'curp',
    'telefono',
    'celular',
    'email',
    'fecha_egreso',
    'promedio',
    'imagen'
     * storeEgresados
     */

    public function store(Request $request)
    {
        $egresado = new Egresados($request->all());
        $egresado->no_control = $request->get('no_control');
        $egresado->nombre = $request->get('nombre');
        $egresado->sexo = $request->get('sexo');
        $egresado->estado_civil = $request->get('estado_civil');
        $egresado->nacimiento = $request->get('nacimiento');
        $egresado->curp = $request->get('curp');
        $egresado->telefono = $request->get('telefono');
        $egresado->celular = $request->get('celular');
        $egresado->email = $request->get('email');
        $egresado->fecha_egreso = $request->get('fecha_egreso');
        $egresado->promedio = $request->get('promedio');
        $egresado->password = $request->get('no_control');

        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(
                ['estado_id' => $request->get('estado_id'),
                    'nombre' => ucwords($city)]);
            $egresado->ciudad_id = $newCity->id;
        }else{
            $egresado->ciudad_id = $city;
        }

        $carrera=$request->get('carrera_id');

        if(!is_numeric($carrera)){
            $newCarrera = Carreras::firstOrCreate(['nombre' => ucwords($carrera)]);
            $egresado->carrera_id = $newCarrera->id;
        }else{
            $egresado->carrera_id = $carrera;
        }

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/cursos');
            $egresado->imagen = $file;
        }

        $user = User::create([
            'name' => $request->get('no_control'),
            'email' => $request->get('no_control'),
            'password' => Hash::make($request->get('no_control')),
            'isAdmin' => 0,
            'isRoot' => 0,
        ]);
        $egresado->user_id =  $user->id;
        $egresado->save();

        /*Agregar idiomas */
        $idiomas = $request->get('idioma_id');

        foreach ($idiomas as $idioma){
            if(!is_numeric($idioma)){
                $newIdioma = Idiomas::firstOrCreate(
                    [
                        'nombre' => ucwords($idioma)
                    ]);

                IdiomaDetalle::firstOrCreate(
                    [
                        'idioma_id' => $newIdioma->id,
                        'egresado_id' => $egresado->id
                    ]);
            }else{
                IdiomaDetalle::firstOrCreate(
                    [
                        'idioma_id' => $idioma,
                        'egresado_id' => $egresado->id
                    ]);
            }
        }

        return redirect()->route('egresados.show',$egresado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $egresado = Egresados::where('id',$id)->first();
        return view('egresados.show',compact('egresado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $state = Estados::orderBy('nombre')->pluck('nombre', 'id');
        $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
        $egresado = Egresados::where('id',$id)->first();
        $idiomas = Idiomas::orderBy('nombre')->pluck('nombre','id');
        $idiomas_eg = IdiomaDetalle::where('egresado_id',$id)->pluck('idioma_id');
        return view('egresados.edit',compact('egresado','id','carerras','state','town','idiomas','idiomas_eg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeEgresados $request, $id)
    {
        $egresado = Egresados::where('id',$id)->first();
        $egresado->no_control = $request->get('no_control');
        $egresado->nombre = $request->get('nombre');
        $egresado->sexo = $request->get('sexo');
        $egresado->estado_civil = $request->get('estado_civil');
        $egresado->nacimiento = $request->get('nacimiento');
        $egresado->curp = $request->get('curp');
        $egresado->telefono = $request->get('telefono');
        $egresado->celular = $request->get('celular');
        $egresado->email = $request->get('email');
        $egresado->fecha_egreso = $request->get('fecha_egreso');
        $egresado->promedio = $request->get('promedio');
        $egresado->password = $request->get('no_control');

        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(['nombre' => ucwords($city)]);
            $egresado->ciudad_id = $newCity->id;
        }else{
            $egresado->ciudad_id = $city;
        }

        $carrera=$request->get('carrera_id');

        if(!is_numeric($carrera)){
            $newCarrera = Carreras::firstOrCreate(['nombre' => ucwords($carrera)]);
            $egresado->carrera_id = $newCarrera->id;
        }else{
            $egresado->carrera_id = $carrera;
        }

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/cursos');
            $egresado->imagen = $file;
        }

        $egresado->save();

        /*Idiomas */
        $idiomas = $request->get('idioma_id');
        $idiomas_eg = IdiomaDetalle::where('egresado_id',$id)->pluck('idioma_id');

        if(count($idiomas) != count($idiomas_eg)){
            IdiomaDetalle::where('egresado_id',$id)->delete();
            foreach ($idiomas as $idioma){
                if(!is_numeric($idioma)){
                    $newIdioma = Idiomas::firstOrCreate(
                        [
                            'nombre' => ucwords($idioma)
                        ]);

                    IdiomaDetalle::firstOrCreate(
                        [
                            'idioma_id' => $newIdioma->id,
                            'egresado_id' => $egresado->id
                        ]);
                }else{
                    IdiomaDetalle::firstOrCreate(
                        [
                            'idioma_id' => $idioma,
                            'egresado_id' => $egresado->id
                        ]);
                }
            }
        }

        return redirect()->route('egresados.show',$egresado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function pdfegresados(Request $request){
        set_time_limit(0);
        $page_no = ($request->get('page'))? $request->get('page'):1;

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;

        $nombre = $request->get('name');
        $carrera = $request->get('carrera_id');
        $sexo = $request->get('sexo');
        $promedio = $request->get('promedio');
        $egresados = Egresados::promedio($promedio)->orderBy('nombre')->carrera($carrera)->nombre($nombre)->sexo($sexo)->paginate(100);
        $pdf = resolve('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf->setPaper('a4', 'landscape');
        $pdf->loadView('pdf.egresados',['egresados' => $egresados,'x'=> $x]);
        return $pdf->stream();
        //return $egresados;
    }
    public function pdf($id){
        $egresado = Egresados::where('id',$id)->first();
        //return $egresado->nombre;
        $pdf = resolve('dompdf.wrapper');
        $pdf->setOptions(['dpi' => 160, 'defaultFont' => 'sans-serif']);
        $pdf->loadView('pdf.egresados.egresado',['egresado' => $egresado]);
        return $pdf->stream();
        //return $egresados;
    }
}

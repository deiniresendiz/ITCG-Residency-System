<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Ciudades;
use App\Egresados;
use App\Http\Requests\storeEgresados;
use Illuminate\Http\Request;

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
        $egresados = Egresados::all();
        $title = "Egresados";
        if($request->has('state')){
            $title = "Cursos/Talleres ".$request->has('opcion');
            $egresados = $egresados->where('estado', $request->has('opcion'));
        }
        $egresados = $egresados->sortByDesc('fecha_inicio');
        //$cursos = $cursos->paginate();
        return view('egresados.index',compact('egresados','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $ciudades = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
        return view('egresados.create', compact('carerras','ciudades'));
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
     */
    public function store(storeEgresados $request)
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}

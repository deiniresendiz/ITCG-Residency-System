<?php

namespace App\Http\Controllers;

use App\Egresados;
use App\Empresas;
use App\Ocupaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OcupacionesController extends Controller
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
        $id = Auth::user()->id;
        $egresado = Egresados::where('user_id',$id)->first();

        $ocupaciones = Ocupaciones::where('egresado_id',$egresado->id)->paginate();

        $page_no = ($request->get('page'))? $request->get('page'):1;

        $y = Ocupaciones::where('egresado_id',$egresado->id)->count();

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('ocupaciones.index',compact('ocupaciones','x','y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::orderBy('nombre')->pluck('nombre','id');
        return view('ocupaciones.create', compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 'egresado_id',
    'empresa_id',
    'puesto',
    'descripcion',
    'lugar',
    'antiguedad',
     */
    public function store(Request $request)
    {
        $ocupacion = new Ocupaciones($request->all());
        $id = Auth::user()->id;
        $egresado = Egresados::where('user_id',$id)->first();
        $empresa = $request->get('empresa_id');
        if(!is_numeric($empresa)){
            $newEmpresa = Empresas::firstOrCreate(['nombre' => ucwords($empresa)]);
            $ocupacion->empresa_id = $newEmpresa->id;
        }else{
            $ocupacion->empresa_id = $empresa;
        }
        $ocupacion->puesto = $request->get('puesto');
        $ocupacion->descripcion = $request->get('descripcion');
        $ocupacion->antiguedad = $request->get('antiguedad');
        $ocupacion->egresado_id = $egresado->id;
        $ocupacion->save();
        return redirect()->route('ocupaciones.show',$ocupacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ocupacion = Ocupaciones::where('id',$id)->first();
        return view('ocupaciones.show', compact('ocupacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ocupacion = Ocupaciones::where('id',$id)->first();
        $empresas = Empresas::orderBy('nombre')->pluck('nombre','id');
        return view('ocupaciones.edit', compact('ocupacion','empresas','id'));
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
        $ocupacion = Ocupaciones::where('id',$id)->first();
        $id = Auth::user()->id;
        $egresado = Egresados::where('user_id',$id)->first();
        $empresa = $request->get('empresa_id');
        if(!is_numeric($empresa)){
            $newEmpresa = Empresas::firstOrCreate(['nombre' => ucwords($empresa)]);
            $ocupacion->empresa_id = $newEmpresa->id;
        }else{
            $ocupacion->empresa_id = $empresa;
        }
        $ocupacion->puesto = $request->get('puesto');
        $ocupacion->descripcion = $request->get('descripcion');
        $ocupacion->antiguedad = $request->get('antiguedad');
        $ocupacion->egresado_id = $egresado->id;
        $ocupacion->save();
        return redirect()->route('ocupaciones.show',$ocupacion);
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

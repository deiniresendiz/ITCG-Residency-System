<?php

namespace App\Http\Controllers;

use App\AreaTrabajo;
use App\BolsaTrabajo;
use App\Ciudades;
use App\Empresas;
use App\Estados;
use App\Http\Requests\storeBolsaTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BolsaTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $title = "Trabajos";
        $area = $request->get('are');
        $pusto = $request->getBaseUrl('puesto');
        $empresa = $request->get('company');
        $ciudad = $request->get('town');

        $trabajos = BolsaTrabajo::areat($area)->name($pusto)->empresas($empresa)->town($ciudad)->orderBy('puesto')->paginate();
        $citys = Ciudades::orderBy('nombre')->pluck('nombre','id');
        $empresas = Empresas::orderBy('nombre')->pluck('nombre','id');
        $areas = AreaTrabajo::orderBy('nombre')->pluck('nombre','id');
        $page_no = ($request->get('page'))? $request->get('page'):1;

        $y = BolsaTrabajo::areat($area)->name($pusto)->empresas($empresa)->town($ciudad)->count();

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('trabajos.index',compact('trabajos','title','citys','empresas','areas','x','y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin == 1){
            $empresas = Empresas::orderBy('nombre')->pluck('nombre','id');
            $areas = AreaTrabajo::orderBy('nombre')->pluck('nombre','id');
            $state = Estados::orderBy('nombre')->pluck('nombre', 'id');
            $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
            return view('trabajos.create', compact('empresas','areas','state','town'));
        }else{
            return view('welcome');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 'empresa_id',
    'area_id',
    'ciudad_id',
     */
    public function store(storeBolsaTrabajo $request)
    {
        if(Auth::user()->isAdmin == 1){
            $trabajo = new BolsaTrabajo($request->all());
            $trabajo->puesto = $request->get('puesto');
            $trabajo->tipo = $request->get('tipo');
            $trabajo->fecha = $request->get('fecha');
            $trabajo->descripcion = $request->get('descripcion');
            $trabajo->contracto = $request->get('contracto');
            $trabajo->telefono = $request->get('telefono');
            $trabajo->domicilio = $request->get('domicilio');
            $trabajo->sueldo = $request->get('sueldo');
            $trabajo->estado = $request->get('estado');
            $trabajo->requisitos= $request->get('requisitos');

            $empresa = $request->get('empresa_id');
            if(!is_numeric($empresa)){
                $newEmpresa = Empresas::firstOrCreate(['nombre' => ucwords($empresa)]);
                $trabajo->empresa_id = $newEmpresa->id;
            }else{
                $trabajo->empresa_id = $empresa;
            }

            $area = $request->get('area_id');
            if(!is_numeric($area)){
                $newArea = AreaTrabajo::firstOrCreate(['nombre' => ucwords($area)]);
                $trabajo->area_id = $newArea->id;
            }else{
                $trabajo->area_id = $area;
            }

            $city = $request->get('ciudad_id');
            if(!is_numeric($city)){
                $newCity = Ciudades::firstOrCreate(
                    ['estado_id' => $request->get('estado_id'),
                        'nombre' => ucwords($city)]);
                $trabajo->ciudad_id = $newCity->id;
            }else{
                $trabajo->ciudad_id = $city;
            }

            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $file = $imagen->store('imagenes/trabajos');
                $trabajo->imagen = $file;
            }
            $trabajo->save();
            return redirect()->route('trabajos.show',$trabajo);
        }else{
            return view('welcome');
        }

    }

    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $citys = Ciudades::towns($id);
            return response()->json($citys);
        }
    }

    public function getTownsEdit(Request $request, $ta, $id){
        if($request->ajax()){
            $citys = Ciudades::towns($id);
            return response()->json($citys);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajo = BolsaTrabajo::where('id',$id)->first();
        return view('trabajos.show', compact('trabajo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->isAdmin == 1){
            $empresas = Empresas::orderBy('nombre')->pluck('nombre','id');
            $areas = AreaTrabajo::orderBy('nombre')->pluck('nombre','id');
            $state = Estados::orderBy('nombre')->pluck('nombre', 'id');
            $trabajo = BolsaTrabajo::where('id',$id)->first();
            $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
            return view('trabajos.edit', compact('trabajo','id','empresas','areas','state','town'));
        }else{
            return view('welcome');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeBolsaTrabajo $request, $id)
    {
        if(Auth::user()->isAdmin == 1){
            $trabajo = BolsaTrabajo::where('id',$id)->first();
            $trabajo->puesto = $request->get('puesto');
            $trabajo->tipo = $request->get('tipo');
            $trabajo->fecha = $request->get('fecha');
            $trabajo->descripcion = $request->get('descripcion');
            $trabajo->contracto = $request->get('contracto');
            $trabajo->telefono = $request->get('telefono');
            $trabajo->domicilio = $request->get('domicilio');
            $trabajo->sueldo = $request->get('sueldo');
            $trabajo->estado = $request->get('estado');
            $trabajo->requisitos= $request->get('requisitos');

            $empresa = $request->get('empresa_id');
            if(!is_numeric($empresa)){
                $newEmpresa = Empresas::firstOrCreate(['nombre' => ucwords($empresa)]);
                $trabajo->empresa_id = $newEmpresa->id;
            }else{
                $trabajo->empresa_id = $empresa;
            }

            $area = $request->get('area_id');
            if(!is_numeric($area)){
                $newArea = AreaTrabajo::firstOrCreate(['nombre' => ucwords($area)]);
                $trabajo->area_id = $newArea->id;
            }else{
                $trabajo->area_id = $area;
            }

            $city = $request->get('ciudad_id');
            if(!is_numeric($city)){
                $newCity = Ciudades::firstOrCreate(['nombre' => ucwords($city)]);
                $trabajo->ciudad_id = $newCity->id;
            }else{
                $trabajo->ciudad_id = $city;
            }

            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $file = $imagen->store('imagenes/trabajos');
                $trabajo->imagen = $file;
            }
            $trabajo->save();
            return redirect()->route('trabajos.show',$trabajo);
        }else{
            return view('welcome');
        }
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

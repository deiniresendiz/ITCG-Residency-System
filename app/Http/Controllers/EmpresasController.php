<?php

namespace App\Http\Controllers;

use App\Ciudades;
use App\Empresas;
use App\Estados;
use App\Http\Requests\storeEmpresas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmpresasController extends Controller
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
        $title = "Empresas";
        $empresas = Empresas::all();
        if($request->has('state')){
            $title = "Cursos/Talleres ".$request->has('state');
            $empresas = $empresas->where('ciudad_id', $request->has('state'));
        }
        $empresas = $empresas->sortByDesc('fecha_inicio');
        //$cursos = $cursos->paginate();
        return view('empresas.index',compact('empresas','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = Estados::orderBy('nombre')->pluck('nombre','id');
        return view('empresas.create',compact('state'));
    }

    public function getTowns(Request $request, $id){
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
     */
    public function store(storeEmpresas $request)
    {
        $empresa = new Empresas($request->all());
        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(
                ['estado_id' => $request->get('estado_id'),
                    'nombre' => ucwords($city)]);
            $empresa->ciudad_id = $newCity->id;
        }else{
            $empresa->ciudad_id = $city;
        }

        $empresa->nombre = $request->get('nombre');
        $empresa->descripcion = $request->get('descripcion');
        $empresa->domicilio = $request->get('domicilio');
        $empresa->telefono = $request->get('telefono');
        $empresa->contacto = $request->get('contacto');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/empresas');
            $empresa->imagen = $file;
        }
        $empresa->save();
        return view('empresas.show',compact('empresa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresas::where('id',$id)->first();
        return view('empresas.show',compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresas::where('id',$id)->first();
        $citys = Ciudades::orderBy('nombre')->pluck('nombre','id');
        return view('empresas.edit',compact('empresa','id','citys'));
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
        $empresa = Empresas::where('id',$id)->first();
        $city=$request->get('ciudad_id');

        if(!is_numeric($city)){
            $newCity = Ciudades::firstOrCreate(['nombre' => ucwords($city)]);
            $empresa->ciudad_id = $newCity->id;
        }else{
            $empresa->ciudad_id = $city;
        }

        $empresa->nombre = $request->get('nombre');
        $empresa->descripcion = $request->get('descripcion');
        $empresa->domicilio = $request->get('domicilio');
        $empresa->telefono = $request->get('telefono');
        $empresa->contacto = $request->get('contacto');
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/empresas');
            $empresa->imagen = $file;
        }
        $empresa->save();
        return view('empresas.show',compact('empresa'));
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

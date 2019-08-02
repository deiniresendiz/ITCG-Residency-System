<?php

namespace App\Http\Controllers;

use App\Ciudades;
use App\Empresas;
use App\Estados;
use App\Http\Requests\storeEmpresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $ciudad = $request->get('ciudad');
        $nombre = $request->get('name');
        $y = Empresas::nombre($nombre)->ciudad($ciudad)->orderBy('nombre')->count();
        $citys = Ciudades::orderBy('nombre')->pluck('nombre','id');
        $page_no = ($request->get('page'))? $request->get('page'):1;

        $empresas = Empresas::nombre($nombre)->ciudad($ciudad)->orderBy('nombre')->paginate();
        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('empresas.index',compact('empresas','title','citys','x','y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin == 1){
            $state = Estados::orderBy('nombre')->pluck('nombre','id');
            $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
            return view('empresas.create',compact('state','town'));
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

    public function getTownsEdit(Request $request, $em, $id){
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
        if(Auth::user()->isAdmin == 1){
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
        }else{
            return view('welcome');
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
        if(Auth::user()->isAdmin == 1){
            $empresa = Empresas::where('id',$id)->first();
            return view('empresas.show',compact('empresa'));
        }else{
            return view('welcome');
        }
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
            $empresa = Empresas::where('id',$id)->first();
            $state = Estados::orderBy('nombre')->pluck('nombre', 'id');
            $town = Ciudades::orderBy('nombre')->pluck('nombre', 'id');
            return view('empresas.edit',compact('empresa','id','town','state'));
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
    public function update(Request $request, $id)
    {
        if(Auth::user()->isAdmin == 1){
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

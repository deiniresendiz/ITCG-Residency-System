<?php

namespace App\Http\Controllers;

use App\Egresados;
use App\Estudios;
use App\Prosgrados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudiosController extends Controller
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

        $estudios = Estudios::where('egresado_id',$egresado->id)->paginate();

        $page_no = ($request->get('page'))? $request->get('page'):1;

        $y = Estudios::where('egresado_id',$egresado->id)->count();

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('estudios.index',compact('estudios','x','y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prosgrados = Prosgrados::orderBy('nombre')->pluck('nombre','id');
        return view('estudios.create', compact('prosgrados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudio = new Estudios($request->all());
        $id = Auth::user()->id;
        $egresado = Egresados::where('user_id',$id)->first();
        $posgrado = $request->get('posgrado_id');
        if(!is_numeric($posgrado)){
            $newPosgrado = Prosgrados::firstOrCreate(['nombre' => ucwords($posgrado)]);
            $estudio->posgrado_id = $newPosgrado->id;
        }else{
            $estudio->posgrado_id = $posgrado;
        }
        $estudio->instituto = $request->get('instituto');
        $estudio->descripcion = $request->get('descripcion');
        $estudio->fecha_inicio = $request->get('fecha_inicio');
        $estudio->fecha_final = $request->get('fecha_final');
        $estudio->nivel = $request->get('nivel');
        $estudio->egresado_id = $egresado->id;
        $estudio->save();
        return redirect()->route('estudios.show',$estudio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudio = Estudios::where('id',$id)->first();
        return view('estudios.show', compact('estudio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudio = Estudios::where('id',$id)->first();
        $prosgrados = Prosgrados::orderBy('nombre')->pluck('nombre','id');
        return view('estudios.edit', compact('estudio','prosgrados','id'));
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
        $estudio = Estudios::where('id',$id)->first();
        $posgrado = $request->get('posgrado_id');
        if(!is_numeric($posgrado)){
            $newPosgrado = Prosgrados::firstOrCreate(['nombre' => ucwords($posgrado)]);
            $estudio->posgrado_id = $newPosgrado->id;
        }else{
            $estudio->posgrado_id = $posgrado;
        }
        $estudio->instituto = $request->get('instituto');
        $estudio->descripcion = $request->get('descripcion');
        $estudio->fecha_inicio = $request->get('fecha_inicio');
        $estudio->fecha_final = $request->get('fecha_final');
        $estudio->nivel = $request->get('nivel');
        $estudio->save();
        return redirect()->route('estudios.show',$estudio);
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

<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Http\Requests\storeCarerras;
use Illuminate\Http\Request;

class CarrerasController extends Controller
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
        $title = "Carraras";
        $carreras = Carreras::orderBy('nombre')->paginate();
        $page_no = ($request->get('page'))? $request->get('page'):1;

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('carreras.index',compact('carreras','title','x'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCarerras $request)
    {
        $carrera = new Carreras($request->all());
        $carrera->nombre = $request->get('nombre');
        $carrera->clave = $request->get('clave');
        $carrera->save();
        return redirect()->route('carreras.show',$carrera);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrera = Carreras::where('id',$id)->first();
        return view('carreras.show',compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carreras::where('id',$id)->first();

        return view('carreras.edit',compact('carrera','id'));
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
        $carrera = Carreras::where('id',$id)->first();
        $carrera->nombre = $request->get('nombre');
        $carrera->clave = $request->get('clave');
        $carrera->save();
        return redirect()->route('carreras.show',$carrera);
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

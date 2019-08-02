<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Http\Requests\storeCarerras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->isRoot == 1){
            $title = "Carraras";
            $carreras = Carreras::orderBy('nombre')->paginate();
            $page_no = ($request->get('page'))? $request->get('page'):1;

            $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
            return view('carreras.index',compact('carreras','title','x'));
        }else{
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isRoot == 1){
            return view('carreras.create');
        }else{
            return view('welcome');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCarerras $request)
    {
        if(Auth::user()->isRoot == 1){
            $carrera = new Carreras($request->all());
            $carrera->nombre = $request->get('nombre');
            $carrera->clave = $request->get('clave');
            $carrera->save();
            return redirect()->route('carreras.show',$carrera);
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
        if(Auth::user()->isRoot == 1){
            $carrera = Carreras::where('id',$id)->first();
            return view('carreras.show',compact('carrera'));
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
        if(Auth::user()->isRoot == 1){
            $carrera = Carreras::where('id',$id)->first();

            return view('carreras.edit',compact('carrera','id'));
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
        if(Auth::user()->isRoot == 1){
            $carrera = Carreras::where('id',$id)->first();
            $carrera->nombre = $request->get('nombre');
            $carrera->clave = $request->get('clave');
            $carrera->save();
            return redirect()->route('carreras.show',$carrera);
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

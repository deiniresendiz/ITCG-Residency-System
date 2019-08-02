<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Http\Requests\storeCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @method paginate(int $int)
 */
class CursosController extends Controller
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
        $title = "Cursos/Talleres";

        /**
         * update of the state
         */
        Cursos::where('fecha_final','<',date('y-m-d'))->where('estado','=','Activo')->update(['estado' => "Terminado"]);

        $state = $request->get('state');
        $name = $request->get('name');
        $cursos = Cursos::nombre($name)->estado($state)->orderBy('fecha_final')->
        select('id','nombre', 'instructor', 'lugar', 'fecha_inicio', 'precio', 'estado')->paginate(25);

        $page_no = ($request->get('page'))? $request->get('page'):1;

        $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
        return view('cursos.index',compact('cursos','title','x'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin == 1){
            return view('cursos.create');
        }else{
            return view('welcome');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(storeCurso $request)
    {
        if(Auth::user()->isAdmin == 1){

            $curso = new Cursos($request->all());
            $curso->nombre = $request->get('nombre');
            $curso->descripcion = $request->get('descripcion');
            $curso->instructor = $request->get('instructor');
            $curso->lugar = $request->get('lugar');
            $curso->fecha_inicio = $request->get('fecha_inicio');
            $curso->fecha_final = $request->get('fecha_final');
            $curso->precio = $request->get('precio');
            $curso->estado = $request->get('estado');

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $file = $imagen->store('imagenes/cursos');
            $curso->imagen = $file;
        }
        $curso->save();
        return redirect()->route('cursos.show',$curso);
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
        $curso = Cursos::where('id',$id)->first();
        return view('cursos.show',compact('curso'));
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

            $curso = Cursos::where('id',$id)->first();

            return view('cursos.edit',compact('curso','id'));
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
    public function update(storeCurso $request, $id)
    {
        if(Auth::user()->isAdmin == 1){
            $curso = Cursos::where('id',$id)->first();
            $curso->nombre = $request->get('nombre');
            $curso->descripcion = $request->get('descripcion');
            $curso->instructor = $request->get('instructor');
            $curso->lugar = $request->get('lugar');
            $curso->fecha_inicio = $request->get('fecha_inicio');
            $curso->fecha_final = $request->get('fecha_final');
            $curso->precio = $request->get('precio');
            $curso->estado = $request->get('estado');

            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $file = $imagen->store('imagenes/cursos');
                $curso->imagen = $file;
            }
            $curso->save();
        return redirect()->route('cursos.show',$curso);
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

    }


}

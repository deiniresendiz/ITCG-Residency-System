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


        if($request->has('state')){
            $title = "Cursos/Talleres ".$request->has('state');
            $cursos = Cursos::where('estado','=',$request->has('state'))->paginate();
        }else{
            $cursos = Cursos::paginate();
        }


        return view('cursos.index',compact('cursos','title'));
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
            return view('home');
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
            return view('home');
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
            return view('home');
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
            return view('home');
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

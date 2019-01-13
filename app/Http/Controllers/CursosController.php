<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Http\Requests\storeCurso;
use Illuminate\Http\Request;

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
        $cursos = Cursos::all();
        if($request->has('state')){
            $title = "Cursos/Talleres ".$request->has('state');
            $cursos = $cursos->where('estado', $request->has('state'));
        }
        $cursos = $cursos->sortByDesc('fecha_inicio');
        //$cursos = $cursos->paginate();
        return view('cursos.index',compact('cursos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
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
        $curso = Cursos::where('id',$id)->first();

        return view('cursos.edit',compact('curso','id'));
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
    /**
     *Metodo para actualizar el estado de los cursos
     *
     */
    public function cursoStateUpdate(Cursos $cursos){

    }
}

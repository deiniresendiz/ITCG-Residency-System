<?php

namespace App\Http\Controllers;

use App\Carreras;
use App\Ciudades;
use App\Egresados;
use App\Estados;
use App\IdiomaDetalle;
use App\Idiomas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCountAdminController extends Controller
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
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $state = Estados::orderBy('nombre')->pluck('nombre','id');
        $town = Ciudades::orderBy('nombre')->pluck('nombre','id');
        $egresado = Egresados::where('user_id',$id)->first();
        $idiomas = Idiomas::orderBy('nombre')->pluck('nombre','id');
        $idiomas_eg = IdiomaDetalle::where('egresado_id',$egresado->id)->pluck('idioma_id');
        return view('account.index',compact('user', 'id','egresado','carerras','state','town','idiomas_eg','idiomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $egresado = Egresados::where('user_id',$id)->first();
        if($egresado != null) {
            $egresado->nombre = $request->get('nombre');
            $egresado->sexo = $request->get('sexo');
            $egresado->estado_civil = $request->get('estado_civil');
            $egresado->nacimiento = $request->get('nacimiento');
            $egresado->curp = $request->get('curp');
            $egresado->telefono = $request->get('telefono');
            $egresado->celular = $request->get('celular');
            $egresado->email = $request->get('email');
            $egresado->fecha_egreso = $request->get('fecha_egreso');
            $egresado->promedio = $request->get('promedio');
            $egresado->password = $request->get('no_control');

            $city=$request->get('ciudad_id');

            if(!is_numeric($city)){
                $newCity = Ciudades::firstOrCreate(['nombre' => ucwords($city)]);
                $egresado->ciudad_id = $newCity->id;
            }else{
                $egresado->ciudad_id = $city;
            }

            $carrera=$request->get('carrera_id');

            if(!is_numeric($carrera)){
                $newCarrera = Carreras::firstOrCreate(['nombre' => ucwords($carrera)]);
                $egresado->carrera_id = $newCarrera->id;
            }else{
                $egresado->carrera_id = $carrera;
            }

            if($request->hasFile('imagen')){
                $imagen = $request->file('imagen');
                $file = $imagen->store('imagenes/cursos');
                $egresado->imagen = $file;
            }

            $egresado->save();

            /*Idiomas */
            $idiomas = $request->get('idioma_id');
            $idiomas_eg = IdiomaDetalle::where('egresado_id',$egresado->id)->pluck('idioma_id');

            if($idiomas){
                IdiomaDetalle::where('egresado_id',$egresado->id)->delete();
                if(count($idiomas) != count($idiomas_eg)){
                    foreach ($idiomas as $idioma){
                        if(!is_numeric($idioma)){
                            $newIdioma = Idiomas::firstOrCreate(
                                [
                                    'nombre' => ucwords($idioma)
                                ]);

                            IdiomaDetalle::firstOrCreate(
                                [
                                    'idioma_id' => $newIdioma->id,
                                    'egresado_id' => $egresado->id
                                ]);
                        }else{
                            IdiomaDetalle::firstOrCreate(
                                [
                                    'idioma_id' => $idioma,
                                    'egresado_id' => $egresado->id
                                ]);
                        }
                    }
                }
            }else{
                IdiomaDetalle::where('egresado_id',$egresado->id)->delete();
            }
        }
        $user = User::where('id',$id)->first();
        $carerras = Carreras::orderBy('nombre')->pluck('nombre','id');
        $state = Estados::orderBy('nombre')->pluck('nombre','id');
        $town = Ciudades::orderBy('nombre')->pluck('nombre','id');
        $egresado = Egresados::where('user_id',$id)->first();
        $idiomas = Idiomas::orderBy('nombre')->pluck('nombre','id');
        $idiomas_eg = IdiomaDetalle::where('egresado_id',$egresado->id)->pluck('idioma_id');
        return view('account.index',compact('user', 'id','egresado','carerras','state','town','idiomas','idiomas_eg'));
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

    public function updatePass(Request $request)
    {

        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $id = Auth::user()->id;
        $user = User::where('id',$id)->first();
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->password = Hash::make($request->password);
            $user->save();

            $request->session()->flash('success', 'La Contaseña se cambio.');

            return back();
        }

        $request->session()->flash('failure', 'No se Cambio la contaseña. ');

        return back();

    }

}

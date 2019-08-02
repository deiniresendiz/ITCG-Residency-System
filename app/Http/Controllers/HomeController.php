<?php

namespace App\Http\Controllers;

use App\BolsaTrabajo;
use App\Cursos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Cursos::where('fecha_final','<',date('y-m-d'))->where('estado','=','Activo')->update(['estado' => "Terminado"]);


        $cursos = Cursos::orderBy('fecha_final')->where('estado','=','Activo')->get();
        $trabajos = BolsaTrabajo::where('estado','Disponible')->orderBy('puesto')->get();

        return view('home',compact('cursos','trabajos'));
    }
}

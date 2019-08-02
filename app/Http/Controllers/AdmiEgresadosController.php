<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdmiEgresadosController extends Controller
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
        if(Auth::user()->isRoot == 1){
            $title = "Egresados";
            $name = $request->get('name');
            $users = User::name($name)->where('isAdmin','=','0')->orderBy('name')->paginate();
            $page_no = ($request->get('page'))? $request->get('page'):1;

            $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
            $y = User::name($name)->where('isAdmin','=','0')->orderBy('name')->count();
            return view('admin_egresados.index',compact('users','title','x','y'));
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
        if(Auth::user()->isRoot == 1){
            $user = User::where('id',$id)->first();
            return view('admin_egresados.show',compact('user'));
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
            $user = User::where('id',$id)->first();
            return view('admin_egresados.edit',compact('user','id'));
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
        //
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

    public function updatePass(Request $request, $id, $pass){
        if($request->ajax() and  (Auth::user()->isRoot == 1)){
            $user = User::where('id',$id)->first();

            $user->password = Hash::make($pass);

            $user->save();
        }
    }
}

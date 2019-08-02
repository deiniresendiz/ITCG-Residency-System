<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Sodium\add;

class AdministradoresController extends Controller
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
            $title = "Administradores";
            $users = User::where('isAdmin','=','1')->orderBy('name')->paginate();
            $page_no = ($request->get('page'))? $request->get('page'):1;

            $x = ($page_no != 1)? (($page_no -1) * 15)+1 :$page_no;
            return view('admin.index',compact('users','title','x'));
        }else{
            return view('home');
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
            return view('admin.create');
        }else{
            return view('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isRoot == 1) {
            $user = User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'isAdmin' => 1,
                'isRoot' => $request->get('root'),
            ]);
            return redirect()->route('admin.show', $user);
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
        if(Auth::user()->isRoot == 1) {
            $user = User::where('id',$id)->first();
            return view('admin.show',compact('user'));
        }else{
            return view('home');
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
        if(Auth::user()->isRoot == 1) {
            $user = User::where('id',$id)->first();
            return view('admin.edit',compact('user','id'));
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
    public function update(Request $request, $id)
    {
        if(Auth::user()->isRoot == 1) {
            $user = User::where('id',$id)->first();
            $user->email = $request->get('email');
            $user->name = $request->get('name');
            $user->isRoot ($request->get('isRoot') != 1? 0 : 1);
            $user->save();
            return view('admin.show',compact('user'));
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
        if(Auth::user()->isRoot == 1) {
            User::find($id)->delete();
            return redirect()->route('admin.index');
        }else{
            return view('home');
        }
    }

    public function updatePass(Request $request, $id, $pass){
        if($request->ajax() and  (Auth::user()->isRoot == 1)){
            $user = User::where('id',$id)->first();

            $user->password = Hash::make($pass);

            $user->save();
        }
    }

}

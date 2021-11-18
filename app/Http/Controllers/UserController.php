<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;

class UserController extends Controller
{
    public function index()
    {
      $user = User::all();
      return view("usuario", compact('user'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user= User::all();
      return view("novouser", compact('user'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'required|max:255',
      ]);
      if ($validated) {
        $user = new User();
        $user->nome = $request->get('name');
        $user->email = $request->get('email');
        if ($request->get('password')) {
          $user->adotante_id = $request->get('password');
        }
        $user->save();
        return redirect("/user");
      }
    }
  
    public function show(User $user)
    {
      //
    }
  
    public function edit(User $user_id)
    {
        $user= User :: find ( $user_id);
        if( isset( $user ))
        return view ('editaruser', compact('user') );
        return redirect('/usuario ');
        
    }
  

    public function update(Request $request, User $user_id)
    {
      $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'required|max:255',
      ]);
      if ($validated) {
        $user->nome = $request->get('nome');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->save();
        return redirect("/user");
      }
    }
  

    public function destroy(User $user_id)
    {
        $user = User :: find ( $user_id );
        if( isset( $user )){
            $user -> delete ();
        } else{
            return response('Usuário não encontrad0', 404) ;
        }
        return redirect('/user');
        
    }
}

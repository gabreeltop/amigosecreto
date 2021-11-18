<?php

namespace App\Http\Controllers;
use App\Models\Grupo;
use Illuminate\Http\Request;

class Grupo extends Controller
{
    public function index()
    {
      $grupo= Grupo::all();
      return view("grupo", compact('grupo'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $grupo= Grupo::all();
      return view("novogrupo", compact('grupo'));
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
        'nome' => 'required|max:255',
        'data' => 'required|max:255',
        'valor-max' => 'required|max:255',
        'valor-min' => 'required|max:255',
      ]);
      if ($validated) {
        $grupo = new Grupo();
        $grupo->nome = $request->get('nome');
        $grupo->data = $request->get('data');
        $grupo->valor-max = $request->get('valor-max');
        $grupo->valor-min = $request->get('valor-min');
        if ($request->get('grupo_id')) {
          $grupo->grupo_id = $request->get('grupo_id');
        }
        $grupo->save();
        return redirect("/grupo");
      }
    }
  
    public function show(Grupo $grupo)
    {
      //
    }
  
    public function edit(Grupo $grupo_id)
    {
        $grupo= Grupo :: find ( $grupo_id);
        if( isset( $grupo ))
        return view ('editargrupo', compact('grupo') );
        return redirect('/usuario ');
        
    }
  

    public function update(Request $request, Grupo $grupo_id)
    {
      $validated = $request->validate([
        'nome' => 'required|max:255',
        'data' => 'required|max:255',
        'valor-max' => 'required|max:255',
        'valor-min' => 'required|max:255',
      ]);
      if ($validated) {
        $grupo->nome = $request->get('nome');
        $grupo->data = $request->get('data');
        $grupo->valor-max = $request->get('valor-max');
        $grupo->valor-min = $request->get('valor-min');
        $grupo->save();
        return redirect("/grupo");
      }
    }
  

    public function destroy(Grupo $grupo_id)
    {
        $grupo = grupo :: find ( $grupo_id );
        if( isset( $grupo )){
            $grupo - >delete () ;
        } else{
            return response('grupo não encontrad0', 404) ;
        }
        return redirect('/grupo');
        
    }
}

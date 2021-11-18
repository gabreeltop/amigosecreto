<?php

namespace App\Http\Controllers;
use App\Models\Mensagem;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
      $mensagem = Mensagem::all();
      return view("arm", compact('mensagem'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $mensagem = Mensagem::all();
      return view("novomensagem", compact('mensagem'));
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
        'user_id' => 'required|integer',
        'grupo_id' => 'required|max:255',
        'data' => 'required|max:255',
        'convite' => 'required|max:255',
      ]);
      if ($validated) {
        $mensagem = new Mensagem();
        $mensagem->user_id = $request->get('user_id');
        $mensagem->grupo_id = $request->get('grupo_id');
        $mensagem->data = $request->get('data');
        $mensagem->convite = $request->get('convite');
        $mensagem->save();
        return redirect("mensagem");
      }
    }
  
    public function show(Mensagem $mensagem)
    {
      //
    }
  
  
    public function edit(Mensagem $mensagem)
    {
      $mensagem = Mensagem::all();
      return view("editarmensagem", compact('users', 'mensagem'));
    }
  
    public function update(Request $request, Mensagem $mensagem)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'grupo_id' => 'required|max:255',
            'data' => 'required|max:255',
            'convite' => 'required|max:255',
          ]);
          if ($validated) {
            $mensagem = new Mensagem();
            $mensagem->user_id = $request->get('user_id');
            $mensagem->grupo_id = $request->get('grupo_id');
            $mensagem->data = $request->get('data');
            $mensagem->convite = $request->get('convite');
            $mensagem->save();
            return redirect("mensagem");
          }
    }
  
    public function destroy(Mensagem $mensagem)
    {
      $mensagem->delete();
      return redirect("mensagem");
    }
}

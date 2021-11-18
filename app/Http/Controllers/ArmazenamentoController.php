<?php

namespace App\Http\Controllers;

use App\Models\Armazenamento;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Http\Request;

class ArmazenamentoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $armazenamento = Armazenamento::all();
    return view("arm", compact('armazenamento'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $armazenamento = Armazenamento::all();
    return view("novoarmazenamento", compact('armazenamento'));
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
      'sorteados' => 'required|max:255',
    ]);
    if ($validated) {
      $armazenamento = new Armazenamento();
      $armazenamento->user_id = $request->get('user_id');
      $armazenamento->grupo_id = $request->get('grupo_id');
      $armazenamento->sorteados = $request->get('sorteados');
      $armazenamento->save();
      return redirect("armazenamento");
    }
  }

  public function show(Armazenamento $armazenamento)
  {
    //
  }


  public function edit(Armazenamento $armazenamento)
  {
    $armazenamento = Armazenamento::all();
    return view("editararmazenamento", compact('users', 'armazenamento'));
  }

  public function update(Request $request, Armazenamento $armazenamento)
  {
    $validated = $request->validate([
      'user_id' => 'required|integer',
      'grupo_id' => 'required|max:255',
      'sorteados' => 'required|max:255',
    ]);
    if ($validated) {
      $armazenamento = new Armazenamento();
      $armazenamento->user_id = $request->get('user_id');
      $armazenamento->grupo_id = $request->get('grupo_id');
      $armazenamento->sorteados = $request->get('sorteados');
      $armazenamento->save();
      return redirect("armazenamento");
    }
  }

  public function destroy(Armazenamento $armazenamento)
  {
    $armazenamento->delete();
    return redirect("armazenamento");
  }
}

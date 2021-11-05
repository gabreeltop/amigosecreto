<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    public function armazenamento()
  {
    return $this->belongsTo(Armazenamento::class);
  }
  public function mensagem()
  {
    return $this->hasMany(Mensagem::class);
  }
}
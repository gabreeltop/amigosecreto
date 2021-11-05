<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armazenamento extends Model
{
  use HasFactory;

  public function user()
  {
    return $this->hasMany(User::class);
  }

  public function grupo()
  {
    return $this->hasMany(Grupo::class);
  }
}
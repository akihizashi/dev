<?php

namespace App;

use App\User;
use App\Work;

class Task extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function works()
  {
    return $this->hasMany(Work::class);
  }
}

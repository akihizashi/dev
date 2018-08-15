<?php

namespace App;

use App\User;
use App\Task;

class Work extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function task()
  {
    return $this->belongsTo(Task::class);
  }
}

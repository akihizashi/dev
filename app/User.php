<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;
use App\Work;
use App\Transaction;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public function tasks()
    {
      return $this->hasMany(Task::class);
    }

    public function works()
    {
      return $this->hasMany(Work::class);
    }

    public function orders()
    {
      return $this->hasMany(Order::class);
    }

    public function transactions()
    {
      return $this->hasMany(Transaction::class);
    }
}

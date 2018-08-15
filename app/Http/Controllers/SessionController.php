<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
      return view('login');
    }

    public function store()
    {

      if (! auth()->attempt(request(['email', 'password']))) {
        return back()->withErrors([
          'message' => 'Your infomation you fill invalid, please check a gain'
        ]);
      }

      return redirect('/tasks');
    }

    public function destroy()
    {
      auth()->logout();
      return redirect('/login');
    }
}

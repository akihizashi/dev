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

    public function store(Request $request)
    {

      if (! auth()->attempt(request(['email', 'password']))) {
        return back()->withErrors([
          'message' => 'Your infomation you fill invalid, please check a gain'
        ]);
      }
      if ($request->user()->role == 'admin') {
        return redirect ('/admin');
      } else {
        return redirect('/shops');
      }
      
    }

    public function destroy()
    {
      auth()->logout();
      session()->flush();
      return redirect('/login');
    }
}

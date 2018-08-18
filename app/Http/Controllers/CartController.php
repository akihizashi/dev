<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //front Controller
    public function index()
    {
      return view ('/cart.index');
    }
}

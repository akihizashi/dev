<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Cart;

class CartController extends Controller
{
    //front Controller
    public function index()
    {
      return view ('/cart.index');
    }

    public function store(Request $request)
    {
      $cart = $request->session()->get('cart');
      $cart = array(
        "id" => request('id'),
        "name" => request('name'),
        "code" => request('code'),
        "price" => request('price')
      );

      $request->session()->push('cart', $cart);
      $request->session()->flash('status', 'Product added to cart');

      return redirect('/cart');
    }
}

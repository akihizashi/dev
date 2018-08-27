<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop;
use App\Cart;

class CartController extends Controller
{
    //front Controller
    public function index()
    {
      return view ('/cart.index');
    }

    public function add(Request $request)
    {

      $cartItems = session('cart');
      $productInfoToCart = array(
        "id" => request('id'),
        "name" => request('name'),
        "code" => request('code'),
        "price" => request('price')
      );
      if ($cartItems !== null){
        if (array_search(request('id'), array_column($cartItems, 'id')) !== false) {
          return redirect ('/cart')->with('status', 'Product exists, you can change quantity before payment');
        }
        $request->session()->push('cart', $productInfoToCart);
        $request->session()->flash('status', 'Product added to cart');

        return redirect('/cart');

      }
        $request->session()->push('cart', $productInfoToCart);
        $request->session()->flash('status', 'First Product added to cart');

        return redirect('/cart');
    }

    public function remove(Request $request)
    {
        $cartItems = session('cart');
        $key = array_search(request('id'), array_column(session('cart'), 'id'));
        unset($cartItems[$key]);
        $newCartItems = array_values($cartItems);
        session()->put('cart', $newCartItems);

        return redirect('/cart')->with('status', 'Item deleted');
    }

}

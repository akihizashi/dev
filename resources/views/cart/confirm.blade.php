@extends('layout')
@section('content')
  <h2 class="text-center">Confirm your order</h2>
    <form action="/cart/pay" method="post">
        {{ csrf_field() }}
        
        @if(session('cart') !== null)
            @foreach ($cartItems as $cartItem)
                Product name: {{ $cartItem['name'] }} <br>
                Price: {{ number_format($cartItem['price']) }} ￥<br>
                Quantity: {{ $cartItem['quantity'] }} <br>
                Subtotal: {{ number_format($cartItem['price']*$cartItem['quantity']) }} ￥<br>
                <hr>
                
            @endforeach
            <div class="alert alert-secondary text-right" role="alert">
                Total: {{ number_format($total) }} ￥
                <input type="hidden" name="amount" value="{{ $total }}">
            </div>
            <div class="text-right">
                <a href="/cart">
                    <button class="btn btn-warning btn-sm" type="button">Edit</button>
                </a>
                <button class="btn btn-success btn-sm" type="submit">Confirm pay</button>
            </div>
        @endif
    </form>
@endsection
@extends('layout')
@section('content')
  <h2 class="text-center">Your cart</h2>

  @include('layouts.status')
  @if (session('cart'))
    @foreach (session('cart') as $cartItem)
      <div class="jumbotron py-3">
        <button type="button" class="close float-right" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <p class="">{{ $cartItem['name']}}</p>
        <hr class="my-1">
        <div class="row">
          <div class="col">Quantity:
            <input style="width:3rem;border:0;" type="number" name="quantity" value="" min="1">
          </div>
          <div class="col">Price(no tax): {{ $cartItem['price']}} ￥</div>
          <div class="col">Sub total: </div>
        </div>
      </div>
    @endforeach
    <div class="row">
      <div class="col"></div>
      <div class="col"></div>
      <div class="col">
        <a href="/shops">
          <button type="button" class="btn btn-primary btn-block">Continue shopping</button>
        </a>
      </div>
      <div class="col">
        <button type="button" class="btn btn-success btn-block">Payment</button>
      </div>
    </div>
  @else
  <div class="alert alert-secondary text-center" role="alert">Nothing on your cart. <a href="/shops">Back to shop</a></div>
@endif
@endsection

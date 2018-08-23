@extends('layout')
@section('content')
  <h2 class="text-center">Your cart</h2>

  @include('layouts.status')
  @if (session('cart'))
    <div class="jumbotron py-3">
      <button type="button" class="close float-right" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      <p class="">{{ session('cart')['name']}}</p>
      <hr class="my-1">
      <div class="row">
        <div class="col">Quantity:
          <input style="width:3rem;border:0;" type="number" name="quantity" value="" min="1">
        </div>
        <div class="col">Price(no tax): {{ session('cart')['price']}} ￥</div>
        <div class="col">Sub total: </div>
      </div>
    </div>

  @endif
@endsection

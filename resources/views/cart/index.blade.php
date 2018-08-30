@extends('layout')
@section('content')
  <h2 class="text-center">Your cart</h2>

  @include('layouts.status')
  @if (session('cart') !== null)

    @foreach (session('cart') as $cartItem)
      <div class="jumbotron py-3">
        <form action="/cart/remove" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="cartItemId" value="{{ $cartItem['id'] }}">
          <button type="submit" class="close float-right" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </form>
        <p class="">{{ $cartItem['name']}}</p>
        <hr class="my-1">
        <div class="row">
          <div class="col">Quantity:
            <form action="/cart/update" method="post">
              {{ csrf_field() }}

            <input style="width:2rem;border:0;" type="number" name="quantity" value="{{ $cartItem['quantity'] }}" min="1">
            <input type="hidden" name="id" value="{{ $cartItem['id'] }}">
            <button type="submit" class="btn btn-info btn-sm pb-0"><i data-feather="refresh-cw"></i></button>
            </form>
          </div>
          <div class="col">Price(no tax): {{ number_format($cartItem['price']) }} ￥</div>
          <div class="col text-right">Sub total: {{ number_format($cartItem['quantity']*$cartItem['price']) }} ￥</div>
        </div>
      </div>
    @endforeach
    <div class="alert alert-dark text-right" role="alert">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">Total: {{ number_format($total) }} ￥</div>
      
    </div>
    

    <div class="row pb-5">
      <div class="col"></div>
      <div class="col"></div>
      <div class="col"></div>
      <div class="col">
        <a href="/shops">
          <button type="button" class="btn btn-primary btn-sm">Continue shopping</button>
        </a>
      </div>
      <div class="col">
        <form action="/cart/clear" method="post">
          {{ csrf_field() }}

          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Clear cart</button>
          {{--Modal--}}
          <div class="modal fade" style="margin-top:20rem;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Are you sure clear cart?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary btn-sm">Clear</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col">
          <button type="button" class="btn btn-success btn-sm">Payment</button>
      </div>
    </div>
  @else
  <div class="alert alert-secondary text-center" role="alert">Nothing on your cart. <a href="/shops">Back to shop</a></div>
@endif

@endsection

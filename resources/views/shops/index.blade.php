@extends('layout')
@section('content')
  <h2 class="text-center">Shop</h2>

  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-3 col-sm-6 col-12">
        <div class="card my-2">
          <img class="card-img" src="/storage/product_images/{{ $product->image }}" alt="">
          <div class="card-body">
              <a class="text-dark" href="/shops/{{ $product->id }}"><h5 class="my-0">{{ $product->name }}</h5></a>
              @if ($product->category == 'CD')
                <span class="badge badge-primary" style="width:4rem;">{{ $product->category }}</span>
              @elseif ($product->category == 'DVD')
                <span class="badge badge-info" style="width:4rem;">{{ $product->category }}</span>
              @elseif ($product->category == 'Album')
                <span class="badge badge-secondary" style="width:4rem;">{{ $product->category }}</span>
              @endif
            <p class="card-text"><small class="text-muted">Release: {{ date('Y/m/d', strtotime($product->release)) }}</small></p>
          </div>
          <div class="card-footer">
              <span class="card-text">￥{{ $product->price }}(No tax)</span>
              @if ($product->reposition == 0)
                <button class="btn btn-sm btn-danger pb-0 pt-1 float-right" title="Out of stock">
                  <i class="my-0" data-feather="x"></i>
                  <i class="my-0" data-feather="shopping-cart"></i>
                </button>
              @else
                <button class="btn btn-sm btn-outline-secondary pb-0 pt-1 float-right" title="Add to cart">
                  <i class="my-0" data-feather="plus"></i>
                  <i class="my-0" data-feather="shopping-cart"></i>
                </button>
              @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="float-right my-3">
    {{ $products->links() }}
  </div>
@endsection

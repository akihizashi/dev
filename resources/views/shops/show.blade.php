@extends('layout')
@section('content')
  <h2 class="text-center"><a href="/shops">Shop</a></h2>
  <div class="row">
      <div class="col-md-3 col-sm-6 col">
        <div class="card my-2">
          <img class="card-img-top" src="/storage/product_images/{{ $product->image }}" alt="">
          <div class="card-body">
              <h5 class="my-0">{{ $product->name }}</h5>
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
      <div class="col-md-9 col-sm-6 col">
        <div class="container">
          {!! $product->description !!}
        </div>
      </div>
  </div>
  <hr>
  <h5>Relative product</h5>
  <div class="row">
    @foreach ($relative_products->where('category', '=', $product->category)
                                ->where('id', '<>', $product->id)
                                ->sortByDesc('release')
                                ->take(4) as $relative_product)
      <div class="col-md-3 col-sm-6 col-12">
        <div class="card my-2">
          <img class="card-img-top" style="" src="/storage/product_images/{{ $relative_product->image }}" alt="">
          <div class="card-img-overlay pb-5">
            <div class="" style="filter:drop-shadow(1px 1px 1px gray)">
              <a class="text-light" href="/shops/{{ $relative_product->id }}"><h5 class="my-0">{{ $relative_product->name }}</h5></a>
              @if ($relative_product->category == 'CD')
                <span class="badge badge-primary" style="width:4rem;">{{ $relative_product->category }}</span>
              @elseif ($relative_product->category == 'DVD')
                <span class="badge badge-info" style="width:4rem;">{{ $relative_product->category }}</span>
              @elseif ($relative_product->category == 'Album')
                <span class="badge badge-secondary" style="width:4rem;">{{ $relative_product->category }}</span>
              @endif
            <p class="card-text"><small class="text-light">Release: {{ date('Y/m/d', strtotime($relative_product->release)) }}</small></p>
            </div>
          </div>
          <div class="card-footer">
              <span class="card-text">￥{{ $relative_product->price }}(No tax)</span>
              @if ($relative_product->reposition == 0)
                <button class="btn btn-sm btn-danger pb-0 pt-1 float-right" title="Out of stock">
                  <i class="my-0" data-feather="x"></i>
                  <i class="my-0" data-feather="shopping-cart"></i>
                </button>
              @endif
          </div>
        </div>
      </div>
    @endforeach
@endsection

@extends('layout')
@include('admin.layouts.nav')
@section('content')
    <h2 class="text-center my-5">Shop Management</h2>
    <div class="text-right">
      <a href="shops/create">
        <button type="button" class="btn btn-outline-secondary my-2" name="button">
          Create product
        </button>
      </a>
    </div>
@include('layouts.status')
    <div class="col-sm-12">
        <table class="table table-hover mt-3">
            <thead class="thead-light">
                <tr class="row">
                    <th class="col-sm-1">Cate</th>
                    <th class="col-sm-3">Name</th>
                    <th class="col-sm-2">Code</th>
                    <th class="col-sm-1">Price(￥)</th>
                    <th class="col-sm-1">Repo</th>
                    <th class="col-sm-2">Release</th>
                    <th class="col-sm-2"></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr class="row">
                    <td class="col-sm-1">{{ $product->category }}</td>
                    <td class="col-sm-3">{{ $product->name }}</td>
                    <td class="col-sm-2">{{ $product->code }}</td>
                    <td class="col-sm-1">{{ $product->price }}</td>
                    <td class="col-sm-1">{{ $product->reposition }}</td>
                    <td class="col-sm-2">{{ date('Y-m-d', strtotime($product->release)) }}</td>
                    <td class="col-sm-2">
                      <div class="form-inline float-right">
                        <a href="/admin/posts/{{ $product->id }}/edit">
                            <button type="button" class="btn btn-warning btn-sm mx-2" title="Edit">
                              <i class="text-light" data-feather="edit-3"></i>
                            </button>
                        </a>

                        <form class="mb-0" action="/admin/shops/{{ $product->id }}/delete" method="post">
                          {{ csrf_field() }}

                          <input type="hidden" name="_method" value="delete" />
                          <input type="hidden" name="post_id" value="{{ $product->id }}">
                          <button type="submit" name="delete" class="btn btn-danger btn-sm" title="Delete">
                            <i class="text-light" data-feather="trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <div class="float-right">
          {{ $products->links() }}
        </div>
    </div>
@endsection

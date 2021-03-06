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
    <div class="text-center">
      <form action="/admin/shops/search" method="get">
        {{ csrf_field() }}
        <div class="form-row">
          <div class="col-sm-10">
            <input type="text" name="searchProduct" class="form-control-dark w-100 p-2" placeholder="Search product by name, code, or category">
          </div>
          <div class="col-sm-2">
            <button class="btn btn-primary py-2 float-right" type="submit">Search product</button>
          </div>
        </div>
      </form>
    </div>
@include('layouts.status')
{{--    <div class="col-sm-12">
        <table class="table table-hover mt-3">
            <thead class="thead-light">
                <tr class="row">
                    <th class="col-sm-1">Cate</th>
                    <th class="col-sm-4">Name</th>
                    <th class="col-sm-2">Code</th>
                    <th class="col-sm-1">Price(￥)</th>
                    <th class="col-sm-1">Repo</th>
                    <th class="col-sm-1 px-0">Release</th>
                    <th class="col-sm-2"></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr class="row">
                    <td class="col-sm-1">{{ $product->category }}</td>
                    <td class="col-sm-4">{{ $product->name }}</td>
                    <td class="col-sm-2">{{ $product->code }}</td>
                    <td class="col-sm-1">{{ $product->price }}</td>
                    <td class="col-sm-1">{{ $product->reposition }}</td>
                    <td class="col-sm-1 px-0">{{ date('Y-m-d', strtotime($product->release)) }}</td>
                    <td class="col-sm-2">
                      <div class="form-inline float-right">
                        <a href="/admin/shops/{{ $product->id }}/edit">
                            <button type="button" class="btn btn-warning btn-sm mx-2" title="Edit">
                              <i class="text-light" data-feather="edit-3"></i>
                            </button>
                        </a>

                        <form class="mb-0" action="/admin/shops/{{ $product->id }}/delete" method="post">
                          {{ csrf_field() }}

                          <input type="hidden" name="_method" value="delete" />
                          <input type="hidden" name="post_id" value="{{ $product->id }}">

                          <button type="button" class="btn btn-danger btn-sm" title="Delete" data-toggle="modal" data-target="#exampleModal">
                            <i class="text-light" data-feather="trash"></i>
                          </button>
                          Modal
                          <div class="modal fade" style="margin-top:20rem;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Are you sure delete</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                  <button type="submit" name="delete" class="btn btn-primary">Delete</button>
                                </div>
                              </div>
                            </div>
                          </div>
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
  --}}
@endsection

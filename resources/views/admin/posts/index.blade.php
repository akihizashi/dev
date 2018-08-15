@extends('layout')
@include('admin.layouts.nav')
@section('content')
    <h2 class="text-center my-5">Post Management</h2>
    <div class="text-right">
      <a href="posts/create">
        <button type="button" class="btn btn-outline-secondary my-2" name="button">
          Create post
        </button>
      </a>
    </div>
@include('layouts.status')
    <div class="col-sm-12">
        <table class="table table-hover mt-3">
            <thead class="thead-light">
                <tr class="row">
                    <th class="col-sm-1"></th>
                    <th class="col-sm-6">Title</th>
                    <th class="col-sm-2">Published</th>
                    <th class="col-sm-1">View</th>
                    <th class="col-sm-2"></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr class="row">
                    <td class="col-sm-1">{{ $post->id }}</td>
                    <td class="col-sm-6">{{ strip_tags($post->title) }}</td>
                    <td class="col-sm-2">{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                    <td class="col-sm-1">20000</td>
                    <td class="col-sm-2">
                      <div class="form-inline float-right">
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            <button type="button" class="btn btn-warning btn-sm mx-2" title="Edit">
                              <i class="text-light" data-feather="edit-3"></i>
                            </button>
                        </a>

                        <form class="mb-0" action="/admin/posts/{{ $post->id }}/delete" method="post">
                          {{ csrf_field() }}

                          <input type="hidden" name="_method" value="delete" />
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
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
          {{ $posts->links() }}
        </div>
    </div>
@endsection

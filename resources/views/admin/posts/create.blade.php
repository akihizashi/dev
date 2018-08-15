@extends('layout')
  @include('admin.layouts.nav')
  @section('content')
      <h2 class="text-center my-5">Create new post</h2>

      <form method="post" action="/admin/posts" enctype="multipart/form-data">
        {{ csrf_field() }}

        <fieldset class="form-group">
          <label for="formGroupExampleInput">Title:</label>
          <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="" required>
        </fieldset>
        <div class="text-right">
          Chose cover image:
          <input class="btn btn-sm btn-primary" type="file" name="image" href="#" role="button"></input>
        </div>
        <fieldset class="form-group">
          <label for="formGroupExampleInput2">Content:</label>
          <textarea type="text" name="body" class="form-control" id="summernote" placeholder=""></textarea>
        </fieldset>

        <button type="submit" class="btn btn-outline-dark">Save post</button>
      </form>
    @include('layouts.create_error')
  @endsection

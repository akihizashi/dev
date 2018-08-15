@extends('layout')

@include('layouts.nav')

@section('content')
  <h2 class="text-center py-5">Create new work</h2>
  <div class="container w-50">
    @include('layouts.status')

    <form method="POST" action="/tasks/{task}/create">
      {{ csrf_field() }}

        <div class="form-group">
          <label for="title">New work:</label>
          <input type="hidden" name="task_id" value="{{ $task->id }}">
          <input type="text" class="form-control" id="" name="body" placeholder="Enter your new work">
          <label for="title">Deadline:</label>
          <input type="date" class="form-control" name="deadline"/>
        </div>
        <button type="submit" class="btn btn-success">Save work</button>
    </form>

    <a class="float-right my-1 small" href="/tasks/{{ $task->id }}">Back to task {{ $task->body }}<i class="fas fa-sign-out-alt mx-1"></i></a>
    @include('layouts.create_error')
  </div>
@endsection

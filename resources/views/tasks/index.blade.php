@extends('layout')

@include('layouts.nav')

@section('content')
    <h2 class="text-center py-5">Tasks list</h2>
              <button class="input-group-text my-2">
                <a href="/tasks/create" class="text-dark">
                  Create new task<i class="fas fa-plus mx-2 my-2"></i>
                </a>
              </button>

@include('layouts.status')
    @if (count($tasks) == 0)
      <div class="alert alert-danger text-center" role="alert">
        No task found
      </div>
    @endif
        @foreach ($tasks as $task)
          <div class="jumbotron">
            <h3 class="display-6">
              <a href="/tasks/{{ $task->id }}">
                {{ $task->body }}
              </a>
            </h3>
            <hr class="my-2">
            <p class="text-success">Work done: {{ $task->works->where('updated_at', '<', now())->count() }}</p>
            <p class="text-danger">Work in progress: {{ $task->works->where('updated_at', '>', now())->count() }}</p>
          </div>
        @endforeach
@endsection

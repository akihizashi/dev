@extends('layout')

@include('layouts.nav')

@section('content')
    <h2 class="text-center py-5">{{ $task->body }}</h2>
    <p class="text-right small">
      <a href="/tasks">Back to list
        <i class="fas fa-sign-out-alt mx-1"></i>
      </a>
    </p>

    <button class="input-group-text my-2">
      <a href="/tasks/{{ $task->id }}/create" class="text-dark">
        Create new work<i class="fas fa-plus mx-2 my-2"></i>
      </a>
    </button>

    @include('layouts.status')

    @if (count($task->works) == 0)
      <div class="alert alert-danger text-center" role="alert">
        No work found
      </div>
    @else
      @foreach ($task->works->sortByDesc('created_at') as $work)
        <div class="jumbotron py-4">
            <h3 class="display-6">{{ $work->body }}</h3>
            <form action="/tasks/{{ $task->id }}/delete" method="post">
              {{ csrf_field() }}

              <input type="hidden" name="_method" value="delete" />
              <input type="hidden" name="work_id" value="{{ $work->id }}">
              <button type="submit" name="delete" class="btn btn-warning btn-sm">
                  <i class="far fa-trash-alt text-light"></i>
              </button>
            </form>
            <p class="lead"></p>
            <hr class="my-2">
            <p>Deadline: {{ date('Y-m-d', strtotime($work->updated_at)) }}</p>
            <p>Creat date: {{ date('Y-m-d', strtotime($work->created_at)) }}</p>
              @if ($work->updated_at > now())
                <span class="badge badge-danger float-right my-0" role="button">
                  None <i class="fas fa-times"></i>
                </span>
              @else
                <span class="badge badge-primary float-right my-0" role="button">
                  Done <i class="fas fa-check"></i>
                </span>
              @endif
        </div>
      @endforeach
    @endif
@endsection

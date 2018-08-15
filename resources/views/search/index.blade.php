@extends('layout')

@include('layouts.nav')

@section('content')
    <h2 class="text-center py-5">Search result</h2>
  @if ($searchTasks->count() == 0 && $searchWorks->count() == 0 )
    <div class="alert alert-danger text-center" role="alert">
        No result found
    </div>
  @endif
  @if ($searchTasks->count() > 0)
    Task found: {{ $searchTasks->count() }}
  @endif
    @foreach ($searchTasks as $searchTask)
      <ul>
        <li><a href="/tasks/{{ $searchTask->id }}">{{ $searchTask->body }}</a></li>
      </ul>
    @endforeach
  @if ($searchWorks->count() > 0)
    Work found: {{ $searchWorks->count() }}
  @endif
    @foreach ($searchWorks as $searchWork)
      <ul>
        <li>{{ $searchWork->body }}
          <p class="small">Deadline: {{ date('Y-m-d', strtotime($searchWork->updated_at)) }}</p>
        </li>
      </ul>
    @endforeach
@endsection

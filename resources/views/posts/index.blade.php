@extends('layout')
@section('content')
  @foreach ($posts as $post)
    <div class="card mb-3">
      <img class="card-img-top" src="/storage/images/{{ $post->image }}" alt="">
      <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        {{--<p class="card-text">{!! $post->body !!})</p>--}}
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm">
            <small class="text-muted">
              Published at: {{ date('Y/m/d', strtotime($post->created_at)) }}
            </small>
          </div>
          <div class="col-sm">
            <a href="/posts/{{ $post->id }}">
              <button class="btn btn-outline-secondary btn-sm float-right">
                View more
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  <div class="float-right">
    {{ $posts->links() }}
  </div>
@endsection

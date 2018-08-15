@extends('layout')

@section('content')
  <h2>{{ $post->title }}</h2>
  <small><span class="text-muted">Published at: {{ date('Y/m/d', strtotime($post->created_at)) }}</span></small>
  <hr>
  <div class="text-center">
    <img class="img-fluid" src="/storage/images/{{ $post->image }}" alt="">
  </div>
  <br><br>
  {!! $post->body !!}
<div class="text-right my-3">
  <button class="btn btn-primary py-0"><i data-feather="facebook"></i> Like</button>
  <button class="btn btn-info py-0"><i data-feather="twitter"></i> Twitt</button>
</div>
@endsection

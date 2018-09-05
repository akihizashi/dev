@extends('layout')
@include('admin.layouts.nav')
@section('content')
    <h2 class="text-center my-5">Orders management</h2>

    @foreach ($transactions as $transaction)
       Order No. {{ $transaction->id }} <br>
       Amount: {{ number_format($transaction->amount) }} ￥<br>
       Status: @if ($transaction->status == 0)
                    <span class="badge badge-danger">None</span>
               @else
                    <span class="badge badge-success"><i data-feather="check"></i></span>
               @endif<br>
       <a href="/admin/transactions/{{ $transaction->id }}">Edit</a> <br>
       <hr>
    @endforeach
    {{ $transactions->links() }}

@endsection
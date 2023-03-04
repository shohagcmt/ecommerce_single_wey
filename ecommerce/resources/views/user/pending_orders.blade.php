@extends('user.layouts.user_profile_template')
@section('page_title', 'User Pending Orders')
@section('profilecontent')
pending Orders
@if (session()->has('message'))
<div class="alert alert-success">
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    {{ session()->get('message') }}
</div>
@endif

<table class="table">
    <tr>
        <th>Product Id</th>
        <th>Price</th>
    </tr>
    @foreach($pendingorders as $order)
    <tr>
        <td>{{ $order->product_id }}</td>
        <td>{{ $order->total_price }}</td>
    </tr>
   @endforeach
</table>
@endsection
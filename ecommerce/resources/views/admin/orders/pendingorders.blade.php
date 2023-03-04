@extends('admin.layouts.template')
@section('page_title','pendingorders')
@section('content')
<div class="content">
    <div class="card">
        <div class="card-title">
            <h2 class="text-center">Pending Orders</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>User Id</th>
                    <th>Shiping Information</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total will Pay</th>
                    <th>Action</th>
                </tr>
                @foreach($pendingorders as $order )
                <tr>
                    <td>{{ $order->user_id }}</td>
                    <td>
                        <ul>
                            <li>{{ $order->shipping_phone_number }}</li>
                            <li>{{ $order->shipping_city }}</li>
                            <li>{{ $order->shipping_postcode }}</li>
                        </ul>
                    </td>
                    <td>{{ $order->product_id  }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price  }}</td>
                    <td><a href="" class="btn btn-success">Approve Now</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
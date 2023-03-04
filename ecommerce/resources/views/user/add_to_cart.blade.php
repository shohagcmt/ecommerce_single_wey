@extends('user.layouts.template')
@section('page_title', 'Add To Cart Page')
@section('content')
    <h1>Add To Cart</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="box_main">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quentity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    $product_img = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                @endphp

                                <td>{{ $product_name }}</td>
                                <td style="width: 50px;"><img src="{{ asset($product_img) }}" alt=""></td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td><a href="{{ route('cardremove', $item->id) }}" class="btn btn-warning">Remove</a></td>
                            </tr>

                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Total Price</td>
                                <td>{{ $total }}</td>
                                <td><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Check Now</a></td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

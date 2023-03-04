@extends('user.layouts.template')
@section('page_title', 'Check Out Page')
@section('content')
    <h1>Final Step To place Your Order</h1>
    <div class="row py-2">
        <div class="col-8">
            <div class="box_main">
                <h2>Product Will Send At-</h2>
                <h4>City/Village :{{ $shipping_address->city_name }}</h4>
                <h4>Post Code : {{ $shipping_address->post_code }}</h4>
                <h4>Phone Number :{{ $shipping_address->phone_number }}</h4>
            </div>
        </div>

        <div class="col-4">
            <div class="box_main">
                <h2>Your Final Product Are:</h2>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Quentity</th>
                            <th>Price</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    
                                @endphp

                                <td>{{ $product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>

                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        @if ($total > 0)
                            <tr>
                                <td></td>
                                <td>Total Price</td>
                                <td>{{ $total }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Cancle Order" class="btn btn-danger mr-2">
        </form>
       <form action="{{ route('placeorder') }}" method="POST">
            @csrf
            <input type="submit" value="Place Order" class="btn btn-primary">
        </form>
    </div>
   
   
@endsection

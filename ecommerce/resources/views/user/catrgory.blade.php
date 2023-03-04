@extends('user.layouts.template')
@section('page_title', 'Category Page')
@section('content')

<!-- fashion section start -->
<div class="carousel-item active">
    <div class="container">
       <h1 class="fashion_taital">{{ $categorys->category_name }}-{{ $categorys->product_count }}</h1>
       <div class="fashion_section_2">
          <div class="row">
             @foreach($products as $product)
             <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                   <h4 class="shirt_text">{{ $product->product_name }}</h4>
                   <p class="price_text">Price  <span style="color: #262626;">{{ $product->price }}</span></p>
                   <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                   <div class="btn_main">
                     <div class="buy_bt">
                       <form action="{{ route('addproducttocart') }}" method="POST">
                          @csrf
                          <input type="hidden" value="{{ $product->id }}" name="product_id">
                          <input type="hidden" value="{{ $product->price }}" name="price">
                          <input type="hidden" value="1" name="quentity">
                          <input class="btn btn-primary" type="submit" value="Buy Now">
                      </form>
                     </div>
                     <div class="seemore_bt"><a href="{{ route('singleproduct',[$product->id , $product->slug]) }}">See More</a></div>
                  </div>
                </div>
             </div>
             @endforeach
            
          </div>
          {{ $products->links() }}
       </div>
   </div>
@endsection
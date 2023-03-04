@extends('admin.layouts.template')
@section('page_title', 'Edit Product')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Product</h5>
                            <small class="text-muted float-end">Input Information</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateproduct',$products->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('product_name') is-invalid @enderror"
                                            id="product_name" name="product_name" value="{{ $products->product_name }}"
                                            value="{{ old('product_name') }}" />
                                        @error('product_name')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            id="price" name="price" value="{{ $products->price }}" value="{{ old('price') }}" />
                                        @error('price')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                            name="quantity" value="{{ $products->quantity }}" value="{{ old('quantity') }}" />
                                        @error('quantity')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                        Descrption</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control @error('Product_short_des') is-invalid @enderror" name="Product_short_des"
                                            value="{{ old('Product_short_des') }}">{{ $products->Product_short_des }}</textarea>
                                        @error('Product_short_des')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long
                                        Descrption</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control @error('product_long_des') is-invalid @enderror" name="product_long_des"
                                            value="{{ old('product_long_des') }}">{{ $products->product_long_des }}</textarea>
                                        @error('product_long_des')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

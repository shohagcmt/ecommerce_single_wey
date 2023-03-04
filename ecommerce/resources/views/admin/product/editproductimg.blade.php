@extends('admin.layouts.template')
@section('page_title', 'Edit Image Product')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product Image</h4>
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
                            <h5 class="mb-0">Edit Image</h5>
                            <small class="text-muted float-end">Input Information</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update_product_img',$productimg->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Product Image</label>
                                    <div class="col-sm-10">
                                        <img style="height: 300px" src="{{ asset($productimg->product_img) }}" alt="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Uplode Product
                                        image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control @error('product_img') is-invalid @enderror"
                                            type="file" id="formFile" name="product_img"
                                            value="{{ old('product_img') }}" />
                                        @error('product_img')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Image</button>
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

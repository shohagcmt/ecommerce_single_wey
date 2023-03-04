@extends('admin.layouts.template')
@section('page_title', 'Add Sub Category')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Sub Category</h4>
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Add New Sub Category</h5>
                            <small class="text-muted float-end">Input Information</small>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('storesubcategory') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category
                                        Name</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                            class="form-control @error('subcategory_name') is-invalid @enderror"
                                            id="subcategory_id" name="subcategory_name" placeholder="Electronice"
                                            value="{{ old('subcategory_name') }}" />
                                        @error('subcategory_name')
                                            <strong class="alert alert-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id" aria-label="Default select example"
                                            value="{{ old('category_id') }}">
                                            <option selected>Open this select menu</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <strong class="alert alert-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
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

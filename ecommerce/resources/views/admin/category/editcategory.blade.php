@extends('admin.layouts.template')
@section('page_title','Edit Category')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Category</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-muted float-end">Input Information</small>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('updatecategory',$category_info->id) }}" method="Post">
                      @csrf
                      <!--<input type="hidden" value="{{ $category_info->id }}" name="category_id">-->
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_id" name="category_name" value="{{ $category_info->category_name }}" />
                          @error('category_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Update Category</button>
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
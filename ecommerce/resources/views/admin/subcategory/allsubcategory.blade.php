@extends('admin.layouts.template')
@section('page_title', 'All Sub Category')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Category</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <!-- Bootstrap Table with Header - Light -->
            <div class="card">
                <h5 class="card-header">Available Sub Category Information</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Id</th>
                                <th>Sub Category Name</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($allsubcategorys as $allsubcategorys)
                                <tr>
                                    <td>{{ $allsubcategorys->id }}</td>
                                    <td>{{ $allsubcategorys->subcategory_name }}</td>
                                    <td>{{ $allsubcategorys->category_name }}</td>
                                    <td>{{ $allsubcategorys->product_count }}</td>
                                    <td>
                                        <a href="{{ route('editsubcategory',$allsubcategorys->id ) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletesubcategory',$allsubcategorys->id ) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Bootstrap Table with Header - Light -->
        </div>
    </div>
@endsection

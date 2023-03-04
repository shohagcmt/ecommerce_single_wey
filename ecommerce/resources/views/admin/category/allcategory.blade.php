@extends('admin.layouts.template')
@section('page_title', 'All Category')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <!-- Bootstrap Table with Header - Light -->
            <div class="card">
                <h5 class="card-header">Available Category Information</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Sub Category</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($categorys as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->subcategory_count }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('editcategory',$category->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deletecategory',$category->id) }}" class="btn btn-danger">Delete</a>
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

@extends('user.layouts.template')
@section('page_title', 'Shipping Address')
@section('content')
    <div class="row pt-3">
        <div class="col-12">
            <div class="box_main">
                <form action="{{ route('addshippingaddress') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number"
                            @error('phone_number') is-invalid @enderror>
                        @error('phone_number')
                            <strong class="alert alert-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">City/Village Name</label>
                        <input type="text" class="form-control" name="city_name"
                            @error('city_name') is-invalid @enderror>
                        @error('city_name')
                            <strong class="alert alert-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Post Code</label>
                        <input type="text" class="form-control" name="post_code"
                            @error('post_code') is-invalid @enderror>
                        @error('post_code')
                            <strong class="alert alert-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <input type="submit" value="Next" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection

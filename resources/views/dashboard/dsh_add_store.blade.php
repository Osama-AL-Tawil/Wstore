@extends('layouts.dashboard_layout')
@section('title') {{'Add Store'}} @endsection

<style>

    #con{
        padding: 15px;
    }

</style>

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@section('content')
    <div class="container">
        <form class="needs-validation"  method="POST" action="{{route('store.store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar mt-4">
                                        <img id="image" src="{{asset('/placeholder_image.svg')}}">
                                    </div>
                                    <div class="custom-file">
                                        <strong>Store Logo</strong>
                                        <p><input type="file" accept="image/*" name="logo" id="file" class="custom-file-input" onchange="loadFile(event)" style="display: none;"></p>
                                        <p class="text-primary" style="font-weight: bold"><label for="file" style="cursor: pointer;">Upload Image</label></p>
                                        {{--                                    <input id="file" name="logo" type="file" class="form-control" formenctype="multipart/form-data">--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h5 class="mb-2 text-primary " style="font-weight: bold">Add Store</h5>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Store Name</label>
                                        <input type="text" class="form-control" name="store_name" placeholder="Enter store name" required>
                                        <div class="invalid-feedback">
                                           Please enter username .
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled value="">Select your category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number" required>
                                        <div class="invalid-feedback">
                                            Please enter your phone Number .
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Your Address" required>
                                        <div class="invalid-feedback">
                                            Please enter your address .
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                    <div class="text-right">
                                        <a href="{{route('store.show')}}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection

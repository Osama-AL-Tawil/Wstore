@extends('layouts.dashboard_layout')

@section('title') {{'Edit Store'}} @endsection

<style>

    #con{
        padding: 15px;
    }

</style>

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@section('content')
    <div class="container">
        <form method="POST" action="{{route('store.update')}}" enctype="multipart/form-data">
            @csrf
            <input name="id" type="hidden" value="{{$data['id']}}">

            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar mt-4">
                                        <!-- change image path (public or storage)-->
                                        @if($data['logo']==env('DEFAULT_IMAGE'))
                                            <td><img id="image" src="{{asset($data['logo'])}}"></td>
                                        @else
                                           <img id="image" src="{{asset('/storage/'.$data['logo'])}}">
                                        @endif

                                    </div>
                                    <div class="custom-file">
                                        <strong>Store Logo</strong>
                                        <input name="logo_path" type="hidden" value="{{$data['logo']}}">
                                        <p><input type="file" accept="image/*" name="logo" id="file" class="custom-file-input" onchange="loadFile(event)" style="display: none;"></p>
                                        <p class="text-primary" style="font-weight: bold"><label for="file" style="cursor: pointer;">Upload Image</label></p>
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
                                    <h5 class="mb-2 text-primary " style="font-weight: bold">Edit Store</h5>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Store Name</label>
                                        <input type="text" class="form-control" name="store_name" placeholder="Enter store name" value="{{$data['store_name']}}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-select" aria-label="Default select example" required>
                                            <option selected disabled value="">Select your category</option>
                                        @foreach($categories as $category)
                                                @if($category['id'] == $data->category->id)
                                                    <option selected value="{{$data->category->id}}">{{$data->category->category_name}}</option>
                                                @endif
                                                <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number" value="{{$data['phone_number']}}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" placeholder="Your Address" value="{{$data['address']}}" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                    <div class="text-right">
                                        <a href="{{route('store.show')}}" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Save</button>
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

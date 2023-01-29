@extends('layouts.dashboard_layout')

@section('title') {{'Stores'}} @endsection

@section('content')

<div class="container" >

    <nav class="navbar navbar-light mt-3 p-0">
        <form class="form-inline" method="GET" action="{{route('store.search')}}">
            @csrf
            <input  name="search" type="text" placeholder="Search..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
            <button id="btnSearch" type="submit" class="btn btn-primary">Search</button> &nbsp;
            <a href="{{route('store.show')}}" class="btn btn-outline-primary mr-1" ><i class="fas fa-sync-alt"></i></a>
        </form>

        <div class="col-md-3 p-0 d-flex justify-content-end ">
            <a href="{{route('add.store')}}" class="btn btn-primary">Add New Store</a>
        </div>
    </nav>


           @include('alerts.response_alert')




        <div class="mt-3 row ">
        <div class="col-md-12">
            <div class="table-responsive table-hover text-center">
                <table class="table table-bordered table-striped">

                    <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Store Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Rating Count</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </thead>


                    <tbody>
                    @foreach($data as $index)
                    <tr>
                        <th scope="row">{{$index['id']}}</th>
                        <td>{{$index['store_name']}}</td>
                        <td>{{$index->category->category_name}}</td>

                        <!-- change image path (public or storage)-->
                        @if($index['logo']==env('DEFAULT_IMAGE'))
                            <td><img class="rounded circle_image" src="{{asset($index['logo'])}}"></td>
                        @else
                            <td><img class="rounded circle_image" src="{{asset('/storage/'.$index['logo'])}}"></td>
                        @endif

                        <td>{{$index['phone_number']}}</td>
                        <td>{{$index['address']}}</td>
                        <td style="color: #00a1ff; font-weight: bold">{{sprintf('%.1f',$index['rating'])}}</td>
                        <td>{{$index['rating_count']}}</td>
                        <td><a class="btn btn-primary btn-sm"  href="{{route('store.edit',$index['id'])}}"><i class="fas fa-pen fa-sm"></i></a></td>
                        <td><button id="delete_btn" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deleteModal{{$index['id']}}" ><i class="fas fa-trash-alt fa-sm"></i></button></td>
                        @include('modals.store.delete_store_modal')
                    </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>

    @include('pagination.pagination')


</div>

@endsection

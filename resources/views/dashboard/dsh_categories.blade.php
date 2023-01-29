@extends('layouts.dashboard_layout')

@section('title') {{'Categories'}} @endsection

@section('content')

<div class="container" >
    <nav class="navbar navbar-light mt-3 p-0">
        <form class="form-inline" method="GET" action="{{route('category.search')}}">
            @csrf
            <input  name="search" type="text" placeholder="Search..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
            <button id="btnSearch" type="submit" class="btn btn-primary">Search</button> &nbsp;
            <a href="{{route('category.show')}}" class="btn btn-outline-primary mr-1" ><i class="fas fa-sync-alt"></i></a>
        </form>

        <div class="col-md-3 p-0 d-flex justify-content-end ">
            @include('modals.category.add_category_modal')
            <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Category</button>
        </div>
    </nav>


    @include('alerts.response_alert')
    @include('modals.category.edit_category_modal')
    @include('modals.category.delete_category_modal')



        <div class="mt-3 row">
        <div class="col-md-12">
            <div class="table-responsive table-hover text-center">
                <table class="table table-bordered table-striped">

                    <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </thead>


                    <tbody>
                    @foreach($data as $index)
                    <tr>
                        <th scope="row">{{$index['id']}}</th>
                        <td>{{$index['category_name']}}</td>
                        <td>{{$index['updated_at']}}</td>
                        <td><button id="edit_btn" class="btn btn-primary btn-sm"  data-toggle="modal" data-category-id="{{$index->id}}" data-category-name="{{$index->category_name}}" data-target="#editCategoryModal"><i class="fas fa-pen fa-sm"></i></button></td>
                        <td><button id="delete_btn" class="btn btn-danger btn-sm"  data-toggle="modal" data-category-id="{{$index->id}}" data-category-name="{{$index->category_name}}" data-target="#deleteModal" ><i class="fas fa-trash-alt fa-sm"></i></button></td>
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
@section('script')
    <script>
        $('#editCategoryModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            // Extract info from data-* attributes
            let category_id = button.data('category-id');
            let category_name = button.data('category-name');
            // Update the modal's content (jQuery).
            let modal = $(this);
            modal.find('#modal-message')
                .text('Do you want to edit this category (' + category_name +')')
            modal.find('#category-id').val(category_id);
            modal.find('#category-name').val(category_name);
        });

        $('#deleteModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            // Extract info from data-* attributes
            let category_id = button.data('category-id');
            let category_name = button.data('category-name');
            // Update the modal's content (jQuery).
            let modal = $(this);
            modal.find('#modal-message')
                .text('Do you want to edit this category (' + category_name +')')
            modal.find('#id').val(category_id);
        });
    </script>
@endsection

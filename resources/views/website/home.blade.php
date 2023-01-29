@extends('layouts.website_layout')

@section('title') {{'Home'}} @endsection

@section('content')
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="{{route('ws.home')}}">Wstore</a>

        <form class="form-inline" method="GET" action="{{route('ws.search')}}">
            <!--Search-->
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>


            <!--Dropdown-->
            <div class="dropdown ml-2">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(empty($category_name))
                        All Categories
                    @else
                        {{$category_name}}
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="max-height: 280px; overflow-y: auto;" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('ws.home')}}">All Categories</a></li>

                    @foreach($categories as $category)
                        <li><a class="dropdown-item"
                               href="{{route('ws.categories.filter',['id'=>$category['id'],'category_name'=>$category['category_name']])}}">{{$category['category_name']}}</a></li>
                    @endforeach
                </ul>
            </div>

        </form>
    </nav>


    <div class="container mt-2">
        @include('alerts.response_alert')
    </div>
    <div class="category" >
        <div class="container">
            <div class="main-content">
                <div class="grid mt-2">
                    <!--confirmation modal for rating-->
                    @include('modals.website.add_rating_modal')

              @foreach($data as $index)

                        <div class="box">
                            <a  href="{{route('ws.details',['id'=>$index->id])}}">
                                @if($index->logo==env('DEFAULT_IMAGE'))
                                    <img width="330" height="487" src="{{asset($index->logo)}}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy"  sizes="(max-width: 330px) 100vw, 330px">                </a>
                                  @else
                                <img width="330" height="487" src="{{asset('storage/'.$index->logo)}}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy"  sizes="(max-width: 330px) 100vw, 330px">                </a>
                                  @endif
                            <div class="info">
                                <div class="title">{{$index->store_name}}</div>

                                <div class="category_name">
                                    <a href="{{route('ws.categories.filter',['id'=>$index->category_id,'category_name'=>$index->category->category_name])}}">
                                       {{$index->category->category_name}}
                                    </a>
                                </div>

                                <div class="publisher">
                                        <label class="ml-1">Phone:{{$index->phone_number}}</label>
                                        <label>Address:{{$index->address}}</label>
                                </div>

                                <div>
                                    <div class="form-inline justify-content-center">
                                        <label class="ml-1">({{sprintf('%.1f',$index->rating)}})</label>
                                        @include('extension.rating_bar')
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script>
        $('#addRatingModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget); // Button that triggered the modal
            // Extract info from data-* attributes
            let store_id = button.data('store-id');
            let store_name = button.data('store-name');
            let rating_value = button.data('rating');
            // Update the modal's content (jQuery).
            let modal = $(this);
            modal.find('#modal-message')
                .text('Do you want to rate this store (' + store_name +') for ('+rating_value+') stars')
            modal.find('#store-id').val(store_id);
            modal.find('#rating').val(rating_value);
        })
    </script>
@endsection

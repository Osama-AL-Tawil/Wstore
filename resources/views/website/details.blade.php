<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>

    @include('includes.bootstrap')
    <link rel="stylesheet" href="{{asset('css/details_page_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/minimal.css')}}">

</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('ws.home')}}">Wstore</a>
</nav>

    <div class="container">
        @include('modals.website.add_rating_modal')
        @include('alerts.response_alert')
        <div class="row">
            <div class="col-md-5">
                <div class="project-info-box mt-0 text-center" style="background-color: #343a40; color: #ffff">
                    <h5 style="font-weight: bold">{{$index->store_name}}</h5>
                </div><!-- / project-info-box -->
                <div class="project-info-box mt-0 text-center">
                    <h5 style="font-weight: bold">STORE DETAILS</h5>
                </div><!-- / project-info-box -->

                <div class="project-info-box">

                    <p><b>Category:</b><a href="{{route('ws.categories.filter',['id'=>$index->category_id,'category_name'=>$index->category->category_name])}}">
                            {{$index->category->category_name}} </a></p>
                    <p><b>Phone Number:</b> {{$index->phone_number}}</p>
                    <p><b>Address:</b> {{$index->address}}</p>
                    <p><b>Rating:</b> {{sprintf('%.1f',$index->rating)}}</p>
                    <p><b>People who rated:</b> {{$index->rating_count}}</p>
                </div><!-- / project-info-box -->

            </div><!-- / column -->

            <div class="col-md-7">
                @if($index->logo==env('DEFAULT_IMAGE'))
                    <img src="{{asset($index->logo)}}" alt="project-image" class="rounded">
                @else
                    <img src="{{asset('storage/'.$index->logo)}}" alt="project-image" class="rounded">
                @endif
                <div class="project-info-box">
                    <div class="form-inline"><b >Rating Now:</b>@include('extension.rating_bar')
                    </div>
                </div><!-- / project-info-box -->
            </div><!-- / column -->
        </div>
    </div>

@include('includes.js')
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

</body>
</html>







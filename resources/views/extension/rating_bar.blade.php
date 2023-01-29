<link rel="stylesheet" href="{{asset('css/rating_bar.css')}}">
<div class="stars" >
        <input class="star star-5" id="star-5-{{$index->id}}" type="radio" data-toggle="modal"
               data-store-id="{{$index->id}}" data-store-name="{{$index->store_name}}"
               data-rating="5" data-target="#addRatingModal" name="rating"  value="5"/>
        <label class="star star-5" for="star-5-{{$index->id}}"></label>


    <input class="star star-4" id="star-4-{{$index->id}}" type="radio" data-toggle="modal"
           data-store-id="{{$index->id}}" data-store-name="{{$index->store_name}}"
           data-rating="4" data-target="#addRatingModal" name="rating"  value="4"/>
    <label class="star star-4" for="star-4-{{$index->id}}"></label>


    <input class="star star-3" id="star-3-{{$index->id}}" type="radio" data-toggle="modal"
           data-store-id="{{$index->id}}" data-store-name="{{$index->store_name}}"
           data-rating="3" data-target="#addRatingModal" name="rating"  value="3"/>
    <label class="star star-3" for="star-3-{{$index->id}}"></label>


    <input class="star star-2" id="star-2-{{$index->id}}" type="radio" data-toggle="modal"
           data-store-id="{{$index->id}}" data-store-name="{{$index->store_name}}"
           data-rating="2" data-target="#addRatingModal" name="rating"  value="2"/>
    <label class="star star-2" for="star-2-{{$index->id}}"></label>


    <input class="star star-1" id="star-1-{{$index->id}}" type="radio" data-toggle="modal"
           data-store-id="{{$index->id}}" data-store-name="{{$index->store_name}}"
           data-rating="1" data-target="#addRatingModal" name="rating"  value="1"/>
    <label class="star star-1" for="star-1-{{$index->id}}"></label>


</div>

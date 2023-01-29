@extends('layouts.dashboard_layout')

@section('content')
    <div style="padding: 5px">
        <div class="col-12 row">
            <h4 style="margin-inline-start: 4px;margin-top: 10px;">Categories</h4>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{$data['categories_count']}} </h3>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-th fa-xs" aria-hidden="true"></i>
                    </div>
                    <a href="{{route('category.show')}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

{{--            <a href="#" class="col-lg-3 col-sm-6">--}}
{{--                <div class="card-box bg-add_1" style="padding: 18px">--}}
{{--                    <div class="add_icon">--}}
{{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
            <div class="border" style="margin-inline-start: 12px"></div>
        </div>


            <div class="col-12 row">
            <h4 style="margin-inline-start: 4px;margin-top: 10px;">Stores</h4>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{$data['stores_count']}} </h3>
                        <p>Stores</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store fa-xs"></i>
                    </div>
                    <a href="{{route('store.show')}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

{{--            <a href="#" class="col-lg-3 col-sm-6">--}}
{{--                <div class="card-box bg-add_2" style="padding: 18px">--}}
{{--                    <div class="add_icon">--}}
{{--                        <i class="fa fa-plus" aria-hidden="true"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
            <div class="border mb-3" style="margin-inline-start: 12px"></div>



        </div>
@endsection

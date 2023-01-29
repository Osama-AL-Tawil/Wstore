<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>


    <!--CSS-->
    @include('includes.css')
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

</head>
<body id="body-pd">
<div id="app">
    <header class="header" style="margin-bottom: 15px" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
        <a href="{{route('admin.profile')}}" class="header_img"><img src="{{asset('img-profile.png')}}" alt=""></a>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav" id="side_nav">
            <div><a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span>
                </a>
                <div class="nav_list" id="dashboard">

                    <a href="{{route('admin.dashboard')}}" class="nav_link {{ (request()->is('admin/dashboard')) ? 'active' : '' }} ">
                        <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>

                    <a href="{{route('admin.profile')}}" class="nav_link {{ (request()->is('admin/profile')) ? 'active' : '' }}">
                        <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile</span> </a>

{{--                    <a href="#" class="nav_link">--}}
{{--                        <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a>--}}

{{--                    <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span>--}}
{{--                    </a>--}}

{{--                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span>--}}
{{--                    </a>--}}

{{--                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span--}}
{{--                            class="nav_name">Stats</span> </a>--}}
                </div>
            </div>

            <a href="{{route('logout')}}" class="nav_link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </div>


    <div style="height: 15px"></div>
    <!--Container Main start-->
    <div id="con" class="bg-light">
        <main id="main" class="p-1">
            @yield('content')
        </main>
    </div>


</div>
<!--JS-->
@include('includes.js')
@yield('script')
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @include('includes.css')

</head>
<body>

    <nav class="navbar navbar-dark bg-dark mb-2" id="nv-bar" >

            <a class="navbar-brand navbarBrand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

 <div class="form-inline">
     <a class="btn btn-outline-warning mr-2" href="{{route('ws.home')}}">
         Continue as guest
     </a>

     <div class="dropdown">
         <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
             @if(\Illuminate\Support\Facades\Route::currentRouteName()=='login')
                 Login
             @elseif(\Illuminate\Support\Facades\Route::currentRouteName()=='register')
                 SignUp
             @else
                 Admin
             @endif

         </button>
         <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
             <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
             <li><a class="dropdown-item" href="{{ route('register') }}">SignUp</a></li>
         </ul>
     </div>


 </div>

    </nav>


    <main class="p-0">
        @yield('content')
    </main>

@include('includes.js')
</body>
</html>

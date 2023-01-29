<!doctype html>
<html lang="en">

@include('includes.bootstrap')
<link rel="stylesheet" href="{{ asset('css/website.css') }}">
<link rel="stylesheet" href="{{asset('css/minimal.css')}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body>

@yield('content')

@include('includes.js')
@yield('script')
</body>
</html>

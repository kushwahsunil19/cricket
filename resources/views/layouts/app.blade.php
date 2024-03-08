<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<meta http-equiv="(X-Frame-Options" content="deny)">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content=" ">

<meta property="og:title" content="@yield('title','mvt')">
<meta name="twitter:title" content="@yield('title','mvt')">
<meta name="twitter:title" content="@yield('title','mvt')">

<meta name="description" content="@yield('description','this is betting website')">

<meta name="keywords" content="@yield('keyword','mvt, betting')">

<link rel="stylesheet" href="{{asset ('/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/plugin/nice-select.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/plugin/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/plugin/slick.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/arafat-font.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/plugin/animate.css')}}">
<link rel="stylesheet" href="{{asset ('/assets/css/style.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="{{ asset('/admin_assets/plugins/toastr/toastr.min.js') }}"></script>
@yield('internal_css','')
</head>
<body>
<div class="preloader" id="preloader"></div>
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
<div class="wrapper">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
</body>
</html>
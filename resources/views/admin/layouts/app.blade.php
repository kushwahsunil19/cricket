<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MVP | Admin Panel</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/custom.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{asset ('/admin_assets/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Add these lines to the head section of your app.blade.php -->
<link rel="stylesheet" href="{{ asset('/node_modules/summernote/dist/summernote-bs4.css') }}">

  @stack('singlePageCss')
</head>
<body class="sidebar-mini control-sidebar-slide-open layout-fixed layout-navbar-fixed">
<div class="wrapper">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/images/MVT_logo.png')}}" alt="MVT" height="60" width="60">
  </div>
    @include('admin.layouts.header')
    <div class="content-wrapper">

    @yield('content')
    </div>
    @include('admin.layouts.footer')
    @stack('script')
</div>
</body>
</html>
<script src="{{ asset('/node_modules/summernote/dist/summernote-bs4.min.js') }}"></script>

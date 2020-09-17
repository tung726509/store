<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <title>Tstore | Hệ Thống Quản Lý Bán Hàng</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
      <meta content="Coderthemes" name="author">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{asset('admini/images/favicon.ico')}}">

      <!-- App plugins -->
      @stack('libs-styles')

      <!-- App css -->
      <link href="{{asset('admini/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet">
      <link href="{{asset('admini/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet">
      <link href="{{asset('admini/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet">
      <link href="{{asset('admini/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet">

      <!-- PAGE STYLES -->
      @stack('page-styles')

      {{-- icon --}}
      <link href="{{asset('admini/css/icons.min.css')}}" rel="stylesheet" type="text/css">

      {{-- font awesome  --}}
      <script src="https://kit.fontawesome.com/eb07484667.js" crossorigin="anonymous"></script>

      {{-- animate --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  </head>

  <body class="loading">
    <div id="wrapper">
      {{-- sidebar-left --}}
      @include('admin.includes.sidebar-left') 

      {{-- content-page --}}
      <div class="content-page">
         {{-- topbar --}}
         @include('admin.includes.topbar')
         <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                @yield('content')
            </div>
         </div>
         {{-- footer --}}
         @include('admin.includes.footer')
      </div>

    </div>
    {{-- right-bar --}}
    @include('admin.includes.right-bar')

    <div class="rightbar-overlay"></div>

    <script src="{{asset('admini/js/vendor.min.js')}}"></script>
    {{-- <script src="{{asset('admini/js/materialdesign.init.js')}}"></script> --}}

    @stack('libs-scripts')

    <!-- App js -->
    <script src="{{asset('admini/js/app.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    @stack('page-scripts')
  </body>
</html>
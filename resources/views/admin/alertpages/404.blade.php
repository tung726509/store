<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <title>Tstore | Hệ Thống Quản Lý Bán Hàng</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
      <meta content="Coderthemes" name="author">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{asset('admini/images/favicon.ico')}}">


      <!-- App css -->
      <link href="{{asset('admini/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('admini/css/icons.min.css')}}" rel="stylesheet" type="text/css">
      <link href="{{asset('admini/css/app.min.css')}}" rel="stylesheet" type="text/css">

      <script src="https://kit.fontawesome.com/eb07484667.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="accountbg" style="background: url('assets/images/bg-1.jpg');background-size: cover;background-position: center;"></div>
    <div class="wrapper-page account-page-full">
        <div class="card shadow-none">
            <div class="card-block">
                <div class="account-box">
                    <div class="card-box shadow-none p-4 mt-2">
                        <h2 class="text-uppercase text-center pb-3">
                            <a href="index.html" class="text-success">
                                <span><img src="assets/images/logo-light.png" alt="" height="26"></span>
                            </a>
                        </h2>
                        <div class="text-center">
                            <h1 class="text-error">404</h1>
                            <h4 class="text-uppercase text-danger mt-3">Not Found</h4>
                            <p class="text-muted mt-3">{{$messages}}</p>
                            <a class="btn btn-md btn-block btn-primary waves-effect waves-light mt-3" href="{{ url()->previous() }}"> Return Home</a>
                        </div>
                    </div>
                </div>
            </div>
          <div class="mt-4 text-center">
              <p class="account-copyright">2018 - 2019 © Highdmin. <span class="d-none d-sm-inline-block"> - Coderthemes.com</span></p>
          </div>
        </div>
    </div>
    {{-- Vendor js --}}
    <script src="{{ asset('admini/js/vendor.min.js') }}"></script>
    <!-- App js -->
    <script src="{{asset('admini/js/app.min.js')}}"></script>
  </body>
</html>
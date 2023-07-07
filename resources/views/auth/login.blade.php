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
      {{-- <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css"> --}}
      <link href="{{asset('admini/css/app.min.css')}}" rel="stylesheet" type="text/css">

      {{-- <script src="https://kit.fontawesome.com/eb07484667.js" crossorigin="anonymous"></script> --}}

      @stack('page-styles')
  </head>
    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('{{asset('admini/images/bg.jpg')}}');background-size: cover;background-position: center;"></div>

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

                            <form method="POST" action="{{ route('administrator.login') }}">
                            @csrf
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="emailaddress">Tài Khoản</label>
                                        <input type="username" class="form-control @error('username') is-invalid @enderror" placeholder="Enter your username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        {{-- <a href="#" class="text-muted float-right"><small>Forgot your password?</small></a> --}}
                                        <label for="password">Mật Khẩu</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-primary">
                                            <input type="checkbox" id="remember" name="remember" class="peer" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row text-center">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-primary waves-effect waves-light" type="submit">Đăng Nhập</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center">
                <p class="account-copyright">2018 - 2019 © TungEncode. <span class="d-none d-sm-inline-block"> - pornhub.com</span></p>
            </div>
        </div>
        
        <!-- Vendor js -->
        <script src="{{asset('admini/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admini/js/app.min.js')}}"></script>
    </body>
</html>

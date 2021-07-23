@extends('homepage.layouts.app')

@push('libs-styles')
   <link href="{{ asset('homepage/css/jquery.nice-number.css') }}" rel="stylesheet">
   <link href="{{ asset('homepage/css/pretty-checkbox.min.css') }}" rel="stylesheet">
   <link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
@endpush

@push('page-styles')
   <style type="text/css">
   </style>
@endpush

@section('content')
   <div id="main" class="column1 wide clearfix no-breadcrumbs">
      <div class="row main-content-wrap">
         <div class="main-content col-lg-12">
                <div id="content" role="main">
                    <article class="post-143 page type-page status-publish hentry">
                        <div class="page-content">
                           {{-- super banner --}}
                           @include('homepage.includes.bigbanner')
                           {{-- breadcrumb --}}
                           <section class="page-top page-header-6" style="">
                              <div class="container hide-title">
                                 <div class="row" style="border: 1px solid #E9E4E4;border-radius: 15px;">
                                    <div class="col-lg-12" style="">
                                       <nav aria-label="breadcrumb bgc-white">
                                          <ol class="breadcrumb p-0 bgc-white mb-1 mt-1">
                                            <li><i class="fas fa-home brcr-icon-lr"></i><a href="#" class="link-black">Home</a></li>
                                            <li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">My Cart</a></li>
                                          </ol>
                                       </nav>
                                    </div>
                                 </div>
                              </div>
                           </section>
                           {{-- main --}}
                           <div id="main" class="column1 boxed">
                              <div class="container">
                                 <div class="row main-content-wrap">
                                    <div class="main-content col-lg-12">
                                       <div id="content" role="main">
                                          <article class="post-210 page type-page status-publish hentry">
                                             <div class="page-content">
                                                <div class="featured-box align-left porto-user-box">
                                                   <div class="box-content px-3 py-5">
                                                      {{-- <h3><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Đăng nhập giỏ hàng</h3> --}}
                                                      <p class="p-title mb-4"><i class="fas fa-sign-in-alt mr-2 p-icon-title" style="font-size: 20px;"></i>Đăng nhập</p>
                                                      {{-- số điện thoại --}}
                                                      <div class="input-group mb-4">
                                                         <div class="input-group-prepend mr-1">
                                                             <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-phone-volume"></i></span>
                                                         </div>
                                                         <input type="text" class="input-type-2" placeholder="Số Điện Thoại *" id="phone"/>
                                                      </div>
                                                      <button class="btn btn-borders btn-md btn-primary btn-update-info w-100 mb-3 phone-login"><i class="fas fa-sign-in-alt"></i> ĐĂNG NHẬP</button>
                                                      <button class="btn btn-borders btn-md btn-primary btn-update-info w-100"><i class="fab fa-facebook-square"></i> ĐĂNG NHẬP BẰNG FACEBOOK</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </article>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                    </article>
                </div>
         </div>
         <div class="sidebar-overlay"></div>
      </div>
   </div>
@endsection

@push('libs-scripts')

@endpush

@push('page-scripts')
   <script type="text/javascript">
      jQuery(document).ready(function($){
           $(".phone-login").click(function(event) {
               let phone = $("#phone").val();
               console.log(phone);
               if(phone){
                  $.ajax({
                     url: '{{ route('ajax.attach_customer_with_cookie') }}',
                     type: 'post',
                     data: {phone: phone},
                  })
                  .done(function(res){
                     if(res.success){
                        // let previous_url = getParameterByName('previous_url');
                        // if(previous_url){
                           window.location.replace('{{ route('mycart') }}');
                        // }else{
                           // window.location.replace('{{ route('mycart') }}');
                        // }
                        
                     }else{
                        Swal.fire(
                           'Thông báo',
                           'Vui lòng thử lại .',
                           'warning'
                        )
                     }
                  })
               }
           });

      });
   </script>
@endpush
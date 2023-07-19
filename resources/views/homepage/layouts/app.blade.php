<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="yes-js js_active js js touch csstransforms3d csstransitions webkit safari safariundefined iphone js mobile touch wf-opensans-n2-active wf-opensans-n3-active wf-opensans-n4-active wf-opensans-n5-active wf-opensans-n6-active wf-opensans-n7-active wf-opensans-n8-active wf-poppins-n2-active wf-poppins-n3-active wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-oswald-n4-active wf-oswald-n6-active wf-oswald-n7-active wf-active">
	<head>
	   	<meta charset="UTF-8">
	   	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	   	<meta name="csrf-token" content="{{ csrf_token() }}">

  	 	<link rel="shortcut icon" href="{{asset('homepage/images/favicon.ico')}}" type="image/x-icon">
	   	<script src="{{asset('homepage/js/webfont.js')}}" async=""></script>

	   	<title>T-store {{-- | Cửa hàng tạp pí lù --}}</title>

	   	<link rel="stylesheet" href="{{asset('homepage/css/header-cd6.min.css')}}" media="all">
	   	<link rel="stylesheet" href="{{asset('admini/css/alertify.min.css')}}"/>

	   	<script src="{{asset('homepage/js/header-cb05.min.js')}}"></script>
		<script src="{{asset('homepage/js/head-js-1.js')}}"></script>

		@stack('libs-styles')

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700,800%7CPoppins:200,300,400,500,600,700,800%7COswald:400,600,700" media="all">

	   	{{-- <script src="https://kit.fontawesome.com/eb07484667.js" crossorigin="anonymous"></script> --}}
        <script src="https://kit.fontawesome.com/c45d62faee.js" crossorigin="anonymous"></script>
        @stack('page-styles')
	</head>

	@include('admin.includes.animate-loading')

	<body class="home page-template-default page page-id-143 wp-embed-responsive full blog-116  theme-porto woocommerce-js yith-wcan-free login-popup">
		<div id="yith-wcwl-popup-message" style="display: none;"><div id="yith-wcwl-message"></div></div>
  		<div class="page-wrapper">
            {{-- banner lớn --}}
            @include('homepage.includes.bigbanner')
		   	<!-- header wrapper -->
		   	@include('homepage.includes.header')
		   	<!-- end header wrapper -->
		   	<div id="main" class="column1 wide clearfix no-breadcrumbs">
		      	{{-- <div class="container-fluid"> --}}
		         	<div class="row page-container">
		            	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 page-content">
                            @yield('content')
		   				</div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 sidebar-content">
                            @include('homepage.includes.side-bar')
                        </div>
		   				<div class="sidebar-overlay"></div>
		   			</div>
		   		{{-- </div> --}}
		   	</div>
		   	<!-- end main -->
		   	@include('homepage.includes.footer')
		</div>
		<div class="panel-overlay"></div>
		{{-- menu màn hình điện thoại --}}
		@include('homepage.includes.side-nav-panel')

		<script src="{{ asset('homepage/js/homepage-app-1.js') }}"></script>
		<script src="{{ asset('homepage/js/footer-982.min.js') }}"></script>

		{{-- sweer alert 2 and alertify --}}
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="{{ asset('admini/js/alertify.min.js') }}"></script>

		<div id="topcontrol" title="" style="position: fixed; bottom: 0px; opacity: 1; cursor: pointer;"><i class="fas fa-chevron-up"></i></div>

		<script type='text/javascript'>
			jQuery(document).ready(function($) {
				$("#loader").delay(2).fadeOut("slow");
			    $("#preloader").delay(2).fadeOut();

			    $(".direct-link").click(function(event){
		          	$("#loader").fadeIn();
			    	$("#preloader").fadeIn();
		        });

		        $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                }
	            });

	            // thêm sản phẩm vào giỏ hàng
	            $(".add_to_cart_button").click(function(event){
	                @if($customer)
	                    let product_id = $(this).data('product-id');
	                    let customer_id = {{ $customer->id }};
	                    if(product_id && customer_id){
	                        $.ajax({
	                            url: '{{ route('ajax.add_product_to_cart') }}',
	                            type: 'post',
	                            data: {
	                                product_id: product_id,
	                                customer_id: customer_id
	                            },
	                        })
	                        .done(function(res){
	                            if(res.success){
	                                if(res.status == 'create'){
	                                    let cart_items_count = parseInt( $(".cart-items-count").text() );
	                                    $(".cart-items-count").text(cart_items_count + 1);
	                                }
	                                alertify.success(`<p class="text-white m-0">${res.message}</p>`);
	                            }else{
	                                alertify.error(`<p class="text-white m-0">${res.message}</p>`);
	                            }
	                        })
	                    }else{
	                        Swal.fire(
	                            'Lỗi hệ thống !',
	                            'Vui lòng thử lại sau.',
	                            'error'
	                        )
	                    }
	                @else
	                  let page_path = window.location.pathname;
	                    window.location.replace(`{{ route('login') }}?page_path=${page_path}`);
	                @endif
	            });

	            function add_product_to_cart(customer_id,product_id,qty) {

	            }
			});
		</script>

		@stack('libs-scripts')

	    @stack('page-scripts')

	</body>
</html>

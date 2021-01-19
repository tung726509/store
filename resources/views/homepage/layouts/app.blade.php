<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="yes-js js_active js js touch csstransforms3d csstransitions webkit safari safariundefined iphone js mobile touch wf-opensans-n2-active wf-opensans-n3-active wf-opensans-n4-active wf-opensans-n5-active wf-opensans-n6-active wf-opensans-n7-active wf-opensans-n8-active wf-poppins-n2-active wf-poppins-n3-active wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-oswald-n4-active wf-oswald-n6-active wf-oswald-n7-active wf-active">
	<head>
	   	<meta charset="UTF-8">
	   	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	   	<meta name="csrf-token" content="{{ csrf_token() }}">
        
  	 	<link rel="shortcut icon" href="{{asset('homepage/images/favicon.ico')}}" type="image/x-icon">
	   	<script src="{{asset('homepage/js/webfont.js')}}" async=""></script>

	   	<script>document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script>
	   	<title>T-store {{-- | Cửa hàng tạp pí lù --}}</title>

	   	<style id="woocommerce-inline-inline-css">.woocommerce form .form-row .required { visibility: visible; }</style>

	   	<link rel="stylesheet" id="fvm-header-0-css" href="{{asset('homepage/css/header-cd6f63a9-1534170389.min.css')}}" media="all">

	   	<script src="{{asset('homepage/js/header-cb050ccd-1534170389.min.js')}}"></script>
		<script src="{{asset('homepage/js/head-js-1.js')}}"></script>
		@stack('libs-styles')

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700,800%7CPoppins:200,300,400,500,600,700,800%7COswald:400,600,700" media="all">

	   	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>

	   	<script src="https://kit.fontawesome.com/eb07484667.js" crossorigin="anonymous"></script>
        @stack('page-styles')
	</head>

	@include('admin.includes.animate-loading')

	<body class="home page-template-default page page-id-143 wp-embed-responsive full blog-116  theme-porto woocommerce-js yith-wcan-free login-popup">
		<div id="yith-wcwl-popup-message" style="display: none;"><div id="yith-wcwl-message"></div></div>
  		<div class="page-wrapper">
		   	<!-- header wrapper -->
		   	@include('homepage.includes.header')
		   	<!-- end header wrapper -->
		   	@yield('content')
		   	<!-- end main -->
		   	@include('homepage.includes.footer')
		</div>
		<div class="panel-overlay"></div>
		{{-- menu màn hình điện thoại --}}
		@include('homepage.includes.side-nav-panel')
	
		<script src="{{asset('homepage/js/homepage-app-1.js')}}"></script>
		<script src="{{asset('homepage/js/footer-982cab25-1534170389.min.js')}}"></script>
		<script src="{{asset('homepage/js/homepage-app-2.js')}}"></script>
		<script id="porto-script-jquery-scrollbar" src="{{asset('homepage/js/jquery.scrollbar.min.js')}}"></script>

		<div id="topcontrol" title="" style="position: fixed; bottom: 0px; opacity: 1; cursor: pointer;"><i class="fas fa-chevron-up"></i></div>

		@stack('libs-scripts')

		<script type='text/javascript'>
			jQuery(document).ready(function() {
				jQuery("#loader").delay(2).fadeOut("slow");
			    jQuery("#preloader").delay(2).fadeOut();

			    jQuery(".direct-link").click(function(event){
		          	jQuery("#loader").fadeIn();
			    	jQuery("#preloader").fadeIn();
		        });
			});
		</script>

	    @stack('page-scripts')
	    
	</body>
</html>
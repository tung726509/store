<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="yes-js js_active js js touch csstransforms3d csstransitions webkit safari safariundefined iphone js mobile touch wf-opensans-n2-active wf-opensans-n3-active wf-opensans-n4-active wf-opensans-n5-active wf-opensans-n6-active wf-opensans-n7-active wf-opensans-n8-active wf-poppins-n2-active wf-poppins-n3-active wf-poppins-n4-active wf-poppins-n5-active wf-poppins-n6-active wf-poppins-n7-active wf-poppins-n8-active wf-oswald-n4-active wf-oswald-n6-active wf-oswald-n7-active wf-active">
	<head>
	   	<meta charset="UTF-8">
	   	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	   	<meta name="csrf-token" content="{{ csrf_token() }}">
        
  	 	<link rel="shortcut icon" href="{{asset('homepage/images/favicon.ico')}}" type="image/x-icon">
	   	<script src="{{asset('homepage/js/webfont.js')}}" async=""></script>

	   	{{-- <script>document.documentElement.className = document.documentElement.className + ' yes-js js_active js'</script> --}}
	   	<title>T-store {{-- | Cửa hàng tạp pí lù --}}</title>

	   	<link rel="stylesheet" href="{{asset('homepage/css/header-cd6.min.css')}}" media="all">
	   	<link rel="stylesheet" href="{{asset('admini/css/alertify.min.css')}}"/>

	   	<script src="{{asset('homepage/js/header-cb05.min.js')}}"></script>
		<script src="{{asset('homepage/js/head-js-1.js')}}"></script>

		@stack('libs-styles')

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700,800%7CPoppins:200,300,400,500,600,700,800%7COswald:400,600,700" media="all">

	   	{{-- <noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript> --}}

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
		   	<div id="main" class="column1 wide clearfix no-breadcrumbs">
		      	<div class="container-fluid">
		         	<div class="row main-content-wrap">
		            	<div class="main-content col-lg-12">
		               		<div id="content" role="main">
		                  		<div class="page-content">
		                  			{{-- banner lớn --}}
							      	@include('homepage.includes.bigbanner')

							      	{{-- breadcrumb --}}
							      	<section class="page-top page-header-6"> 
									    <div class="container hide-title">
									        <div class="row" style="border: 1px solid #E9E4E4;border-radius: 15px;">
									          <div class="col-lg-12" style="">
									              <nav aria-label="breadcrumb bgc-white">
									                <ol class="breadcrumb p-0 bgc-white mb-1 mt-1">
												      	@section('breadcrumb')
										                    <li>
										                      <i class="fas fa-home brcr-icon-lr"></i><a href="{{ route('home') }}" class="link-black">Home</a>
										                    </li>
												      	@show
							      					</ol>
									            </nav>
									          </div>
									        </div>
									    </div>
									</section>
							      	
		   							@yield('content')
		   						</div>
		   					</div>
		   				</div>
		   				<div class="sidebar-overlay"></div>
		   			</div>
		   		</div>
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
				jQuery("#loader").delay(2).fadeOut("slow");
			    jQuery("#preloader").delay(2).fadeOut();

			    jQuery(".direct-link").click(function(event){
		          	jQuery("#loader").fadeIn();
			    	jQuery("#preloader").fadeIn();
		        });

		        jQuery.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
	                }
	            });
			});
		</script>

		@stack('libs-scripts')

	    @stack('page-scripts')
	    
	</body>
</html>
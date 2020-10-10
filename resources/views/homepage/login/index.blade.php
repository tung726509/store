@extends('homepage.layouts.app')

@push('page-styles')
<style type="text/css">
	.bgc-white{
		background-color: white;
	}
	.link-black{
		color: black;
	}
	.brcr-icon-lr{
		padding-left: 5px;
		padding-right: 5px;
	}
</style>
@endpush

@section('content')
{{-- super banner --}}
<div class="banner-container my-banner">
   <div id="banner-wrapper" class="">
      <div class="porto-block">
         <style>.vc_custom_1575508548829{padding-top: 4.25rem !important;padding-bottom: 4.25rem !important;background-color: #77e1ff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.coupon-sale-text b { background: #fff; color: inherit }</style>
         <div class="vc_row wpb_row vc_custom_1575508548829 text-left vc_row-has-fill porto-inner-container porto-lazyload lazy-load-loaded" style="background-image: url(&quot;https://www.portotheme.com/wordpress/porto/shop4/wp-content/uploads/sites/79/2019/12/shop1_shop_banner.jpg?id=2011&quot;);">
            <div class="porto-wrap-container container">
               <div class="row">
                  <div class="pl-lg-4 pl-xl-5 mb-4 mb-md-0 vc_column_container col-md-5 col-xl-4 col-lg-4 offset-1">
                     <div class="wpb_wrapper vc_column-inner">
                        <h2 style="font-size: 3rem;line-height: 1" class="vc_custom_heading mb-3 align-left text-uppercase">ELECTRONIC
                           DEALS
                        </h2>
                        <div class="vc_btn3-container  mb-0 vc_btn3-inline"> <button class="vc_btn3 vc_btn3-shape-default btn btn-modern btn-md btn-dark">GET YOURS!</button></div>
                     </div>
                  </div>
                  <div class="vc_column_container col-md-4 offset-md-0 offset-1">
                     <div class="wpb_wrapper vc_column-inner">
                        <div style="font-size: 0.7rem;line-height: 1.7" class="vc_custom_heading coupon-sale-text my-2 align-left heading-dark"><b>Exclusive COUPON</b></div>
                        <div style="font-size: 1rem;line-height: .9;font-weight:700" class="vc_custom_heading coupon-sale-text align-left heading-dark"><i>UP TO</i><b>$100</b> OFF</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- breadcrumb --}}
<section class="page-top page-header-6">
   	<div class="container hide-title">
      	<div class="row">
         	<div class="col-lg-12 clearfix">
           		<nav aria-label="breadcrumb bgc-white">
				  	<ol class="breadcrumb p-0 bgc-white">
				    	<li><i class="fas fa-home brcr-icon-lr"></i><a href="#" class="link-black">Home</a></li>
				    	<li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">Login</a></li>
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
                     <div class="woocommerce">
                        <div class="featured-box align-left porto-user-box">
                           <div class="box-content">
                              <div class="woocommerce-notices-wrapper"></div>
                              <h2><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;KIỂM TRA GIỎ HÀNG</h2>
                              <form class="woocommerce-form woocommerce-form-login login" method="post">
                                 <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide"> 
                                    <label for="username"> Nhập số điện thoại&nbsp;<span class="required">*</span></label> <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="">
                                 </p>
                                 <p class="status" style="display:;"></p>
                                 <p class="form-row"> 
                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="5f2e5e295c">
                                    <input type="hidden" name="_wp_http_referer" value="/wordpress/porto/gutenberg-shop4/my-account/"> 
                                    <button type="submit" class="woocommerce-Button button" name="login" value="Login">Kiểm Tra</button>
                                 </p>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </article>
               <div class=""></div>
            </div>
         </div>
      </div>
   </div>
</div>
         
@endsection

@push('libs-scripts')

@endpush

@push('page-scripts')

@endpush
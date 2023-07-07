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
                  <li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">About Us</a></li>
               </ol>
            </nav>
            </div>
         </div>
      </div>
</section>
<div id="main" class="column1 wide clearfix no-breadcrumbs">
   <!-- main -->
    <div class="container-fluid">
         <div class="row main-content-wrap">
            <!-- main content -->
            <div class="main-content col-lg-12">
               <div id="content" role="main">
                  <article class="post-143 page type-page status-publish hentry">
                     <div class="page-content">
                        {{-- freeship and porto watches --}}
                        {{-- <section class="vc_section porto-section porto-inner-container p-t-md pb-0">
                           <div class="container">
                              <div class="porto-carousel owl-carousel has-ccols ccols-xl-3 ccols-lg-3 ccols-md-2 ccols-sm-2 ccols-1 m-b-md home-bar owl-loaded owl-drag" data-plugin-options="{&quot;stagePadding&quot;:0,&quot;margin&quot;:2,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:3000,&quot;autoplayHoverPause&quot;:false,&quot;items&quot;:3,&quot;lg&quot;:3,&quot;md&quot;:2,&quot;sm&quot;:2,&quot;xs&quot;:1,&quot;nav&quot;:false,&quot;dots&quot;:false,&quot;animateIn&quot;:&quot;&quot;,&quot;animateOut&quot;:&quot;&quot;,&quot;loop&quot;:true,&quot;center&quot;:false,&quot;video&quot;:false,&quot;lazyLoad&quot;:false,&quot;fullscreen&quot;:false}">
                                 <!-- porto-sicon-box --><!-- porto-sicon-box --><!-- porto-sicon-box -->
                                 <div class="owl-stage-outer" style="margin-left: 0px; margin-right: 0px;">
                                    <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1182px;">
                                       <div class="owl-item active" style="width: 392px; margin-right: 2px;">
                                          <div class="porto-sicon-box style_1 default-icon">
                                             <div class="porto-sicon-default">
                                                <div id="porto-icon-20075240475e96bf4361bb5" class="porto-just-icon-wrapper" style="text-align:center;">
                                                   <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-shipping-fast"></i></div>
                                                </div>
                                             </div>
                                             <div class="porto-sicon-header">
                                                <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">FREE SHIPPING</h3>
                                                <p style="font-size:13px;line-height:17px;">cho tất cả đơn hàng trên 250k .</p>
                                             </div>
                                             <!-- header -->
                                          </div>
                                       </div>
                                       <div class="owl-item active" style="width: 392px; margin-right: 2px;">
                                          <div class="porto-sicon-box style_1 default-icon">
                                             <div class="porto-sicon-default">
                                                <div id="porto-icon-1565706665e96bf4361c6f" class="porto-just-icon-wrapper" style="text-align:center;">
                                                   <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                                </div>
                                             </div>
                                             <div class="porto-sicon-header">
                                                <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">BIRTHDAY GIẢM 10%</h3>
                                                <p style="font-size:13px;line-height:17px;">cho bạn có tháng sinh trùng với tháng hiện tại .</p>
                                             </div>
                                             <!-- header -->
                                          </div>
                                       </div>
                                       <div class="owl-item active" style="width: 392px; margin-right: 2px;">
                                          <div class="porto-sicon-box style_1 default-icon">
                                             <div class="porto-sicon-default">
                                                <div id="porto-icon-15879685035e96bf4361d2e" class="porto-just-icon-wrapper" style="text-align:center;">
                                                   <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                                </div>
                                             </div>
                                             <div class="porto-sicon-header">
                                                <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">CHUYỂN KHOẢN GIẢM 5%</h3>
                                                <p style="font-size:13px;line-height:17px;">áp dụng cho mọi đơn hàng .</p>
                                             </div>
                                             <!-- header -->
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"></button><button type="button" role="presentation" class="owl-next"></button></div>
                                 <div class="owl-dots disabled"></div>
                              </div>
                           </div>
                        </section> --}}
                        {{-- about us --}}
                        <section class="vc_section porto-section porto-inner-container">
                           <div class="container"><h2 class="porto-heading mb-3" style="font-size:19px;">OUR STORY</h2><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><h3 style="color: #21293c; font-size: 18px; line-height: 27px; font-weight: 400;">“ Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model search for evolved over sometimes by accident, sometimes on purpose ”</h3></div>
                        </section>
                        {{-- why choose us --}}
                        <section class="vc_section porto-section porto-inner-container pb-3" style="background-color:#f4f4f4;">
                           <div class="container">
                              <h2 class="porto-heading mb-3" style="font-size:19px;">WHY CHOOSE US</h2>
                              <div class="wp-block-columns">
                                 <div class="wp-block-column">
                                    <div class="porto-sicon-box style_1 top-icon bgc-white" style="padding: 50px;">
                                       <div class="porto-sicon-top">
                                          <div id="porto-icon-8102826345ea93302d7f92" class="porto-just-icon-wrapper" style="text-align:center;">
                                             <div class="porto-icon none" style="color:#0088cc;font-size:55px;display:inline-block;"><i class="fas fa-shipping-fast"></i></div>
                                          </div>
                                       </div>
                                       <div class="porto-sicon-header">
                                          <h3 class="porto-sicon-title" style="font-weight:600;font-size:18px;line-height:20px;">FREE SHIPPING</h3>
                                       </div>
                                       <!-- header -->
                                       <div class="porto-sicon-description" style="font-size:15px;line-height:27px;">cho tất cả đơn hàng trên 250k .</div>
                                       <!-- description -->
                                    </div>
                                    <!-- porto-sicon-box -->
                                 </div>
                                 <div class="wp-block-column">
                                    <div class="porto-sicon-box style_1 top-icon bgc-white" style="padding: 37px;">
                                       <div class="porto-sicon-top">
                                          <div id="porto-icon-9793955755ea93302d806d" class="porto-just-icon-wrapper" style="text-align:center;">
                                             <div class="porto-icon none" style="color:#0088cc;font-size:55px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                          </div>
                                       </div>
                                       <div class="porto-sicon-header">
                                          <h3 class="porto-sicon-title" style="font-weight:600;font-size:18px;line-height:20px;">BIRTHDAY GIẢM 10%</h3>
                                       </div>
                                       <!-- header -->
                                       <div class="porto-sicon-description" style="font-size:15px;line-height:27px;">cho bạn có tháng sinh trùng với tháng hiện tại .</div>
                                       <!-- description -->
                                    </div>
                                    <!-- porto-sicon-box -->
                                 </div>
                                 <div class="wp-block-column">
                                    <div class="porto-sicon-box style_1 top-icon bgc-white" style="padding: 50px;">
                                       <div class="porto-sicon-top">
                                          <div id="porto-icon-3888673005ea93302d8137" class="porto-just-icon-wrapper" style="text-align:center;">
                                             <div class="porto-icon none" style="color:#0088cc;font-size:55px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                          </div>
                                       </div>
                                       <div class="porto-sicon-header">
                                          <h3 class="porto-sicon-title" style="font-weight:600;font-size:18px;line-height:20px;">CHUYỂN KHOẢN GIẢM 5%</h3>
                                       </div>
                                       <!-- header -->
                                       <div class="porto-sicon-description" style="font-size:15px;line-height:27px;">áp dụng cho mọi đơn hàng .</div>
                                       <!-- description -->
                                    </div>
                                    <!-- porto-sicon-box -->
                                 </div>
                              </div>
                           </div>
                        </section>
                     </div>
                  </article>
               </div>
            </div>
            <!-- end main content -->
            <div class="sidebar-overlay"></div>
         </div>
    </div>
</div>
@endsection

@push('libs-scripts')

@endpush

@push('page-scripts')

@endpush
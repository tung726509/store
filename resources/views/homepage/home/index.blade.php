
@extends('homepage.layouts.app')

@push('page-styles')
  <style type="text/css">
    #count-down-wrap-9815 .porto_countdown-amount {  } #count-down-wrap-9815 .porto_countdown-period, #count-down-wrap-9815 .porto_countdown-row:before {}
    
    .title-t{
        font-weight:700;
        font-size:14px;
        line-height:1;
    }
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
    .bbi-text-0{
      right:5%;top: 50%;
      transform: translateY(-50%);
    }
    .bbi-text-1{
      font-size:4.3125em;
      line-height:1;
    }
    .bbi-text-2{
      font-size:2.125em;
      line-height:1;
    }
    .bbi-text-3{
      font-size:2.875em;
      line-height:1;
    }
    .mbi-text-1{
      font-size:2.25rem;
      line-height:1.15;
      color:#ffffff;
    }
    .mbi-text-2{
      background-color: #ff7272 !important;
      border-color: #ff7272 !important
    }
    .mbi-text-3{
      font-size:.7rem;
      font-weight:700;
      line-height:1.4;
      text-align:center;
    }
    .mbi-1{
      background-image: url(/homepage/images/{{ $dataImageOption['med_b_i']['name'][0] != '' ? $dataImageOption['med_b_i']['name'][0] : 'med-banner1.jpg' }});
      background-position: center center;
      background-size: cover;
      background-color: rgb(34, 37, 41);
      position: relative;
      overflow:
    }
    .mbi-2{
      background-image: url(/homepage/images/{{ $dataImageOption['med_b_i']['name'][0] != '' ? $dataImageOption['med_b_i']['name'][0] : 'med-banner1.jpg' }});
      background-size: cover;
      background-position: 50% 0%;
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100%;
    }
    .sbi-1{
      background-position: center center;
      background-size: cover;
      background-color: rgb(0, 136, 204);
      position: relative;
      overflow: hidden;
    }
    .sbi-2{
      background-image: url(/homepage/images/{{ $dataImageOption['small_b_i']['name'][0] != '' ? $dataImageOption['small_b_i']['name'][0] : 'small-banner.jpg' }});
      background-size: cover;
      background-position: 50% 0%;
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 150%;
    }
    .star-rating span:before{
    color: #ffea30;
   }
   .add-to-cart{
    background-color: #2b2b2d;
    border: 1px solid #2b2b2d;
   }
   .bor-radius-1{
    border-radius: 8px;
   }
   .sale-product-daily-deal{
    padding: 5px;
   }
   .sale-product-daily-deal:before{
    border-radius: 7px;
   }
    #porto-product-categories-3675 li.product-category .thumb-info-wrapper:after { background-color: rgba(27, 27, 23, 0); }#porto-product-categories-3675 li.product-category:hover .thumb-info-wrapper:after { background-color: rgba(27, 27, 23, 0.15); }
  </style>
@endpush

@section('content')
<div id="main" class="column1 wide clearfix no-breadcrumbs">
  	<!-- main -->
    <div class="container-fluid">
         <div class="row main-content-wrap">
            <!-- main content -->
            <div class="main-content col-lg-12">
               <div id="content" role="main">
                  <article class="post-143 page type-page status-publish hentry">
                     <div class="page-content">
                        @include('homepage.includes.bigbanner')
                        {{-- breadcrumb --}}
                        <section class="page-top page-header-6" style="">
                            <div class="container hide-title">
                                <div class="row" style="border: 1px solid #E9E4E4;border-radius: 15px;">
                                  <div class="col-lg-12" style="">
                                      <nav aria-label="breadcrumb bgc-white">
                                    <ol class="breadcrumb p-0 bgc-white mb-1 mt-1">
                                      <li><i class="fas fa-home brcr-icon-lr"></i><a href="#" class="link-black">Home</a></li>
                                    </ol>
                                </nav>
                                  </div>
                                </div>
                            </div>
                        </section>

                        {{-- ưu đãi khách hàng --}}
                        <section class="vc_section porto-section porto-inner-container p-t-md pb-0">
                          @if($ict_count > 0)
                            <div class="container">
                              <div class="porto-carousel owl-carousel has-ccols ccols-xl-3 ccols-lg-3 ccols-md-2 ccols-sm-2 ccols-1 m-b-md home-bar owl-loaded owl-drag" data-plugin-options="{&quot;stagePadding&quot;:0,&quot;margin&quot;:2,&quot;autoplay&quot;:true,&quot;autoplayTimeout&quot;:3000,&quot;autoplayHoverPause&quot;:false,&quot;items&quot;:{{ $ict_count }},&quot;lg&quot;:{{ $ict_count }},&quot;md&quot;:{{ $ict_count >= 3 ? 2 : $ict_count }},&quot;sm&quot;:1,&quot;xs&quot;:1,&quot;nav&quot;:false,&quot;dots&quot;:false,&quot;animateIn&quot;:&quot;&quot;,&quot;animateOut&quot;:&quot;&quot;,&quot;loop&quot;:true,&quot;center&quot;:false,&quot;video&quot;:false,&quot;lazyLoad&quot;:false,&quot;fullscreen&quot;:false}">
                                 <div class="owl-stage-outer">
                                    <div class="owl-stage">
                                      {{-- free ship --}}
                                      @if($use_free_ship['key'] == 1)
                                        <div class="owl-item active" style="">
                                          <div class="porto-sicon-box style_1 default-icon">
                                            <div class="porto-sicon-default">
                                              <div id="porto-icon-20075240475e96bf4361bb5" class="porto-just-icon-wrapper" style="text-align:center;">
                                                <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-shipping-fast"></i></div>
                                              </div>
                                            </div>
                                            <div class="porto-sicon-header">
                                              <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">FREE SHIP</h3>
                                              <p style="font-size:13px;line-height:17px;">cho đơn hàng trên {{ $use_free_ship['value'] / 1000 }}k .</p>
                                            </div>
                                          </div>
                                        </div>
                                      @endif
                                      {{-- sinh nhật --}}
                                      @if($use_birth_discount['key'] == 1)
                                        <div class="owl-item active" style="">
                                          <div class="porto-sicon-box style_1 default-icon">
                                            <div class="porto-sicon-default">
                                              <div id="porto-icon-15879685035e96bf4361d2e" class="porto-just-icon-wrapper" style="text-align:center;">
                                                <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-birthday-cake"></i></div>
                                              </div>
                                            </div>
                                            <div class="porto-sicon-header">
                                                <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">SINH NHẬT GIẢM {{ $use_birth_discount['value'] }}%</h3>
                                                <p style="font-size:13px;line-height:17px;">trong tháng sinh nhật khách hàng .</p>
                                            </div>
                                          </div>
                                        </div>
                                      @endif
                                      {{-- chuyển khoản --}}
                                      @if($use_transfer_discount['key'] == 1)
                                        <div class="owl-item active" style="">
                                          <div class="porto-sicon-box style_1 default-icon">
                                              <div class="porto-sicon-default">
                                                <div id="porto-icon-15879685035e96bf4361d2e" class="porto-just-icon-wrapper" style="text-align:center;">
                                                   <div class="porto-icon none" style="color:#222529;font-size:37px;display:inline-block;"><i class="fas fa-hand-holding-usd"></i></div>
                                                </div>
                                              </div>
                                              <div class="porto-sicon-header">
                                                <h3 class="porto-sicon-title" style="font-weight:700;font-size:14px;line-height:1;">CHUYỂN KHOẢN GIẢM {{ $use_transfer_discount['value'] }}%</h3>
                                                <p style="font-size:13px;line-height:17px;">áp dụng cho mọi đơn hàng .</p>
                                              </div>
                                          </div>
                                        </div>
                                      @endif
                                    </div>
                                 </div>
                                 <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"></button><button type="button" role="presentation" class="owl-next"></button></div>
                                 <div class="owl-dots disabled"></div>
                              </div>
                            </div>
                          @endif
                        </section>

                        {{-- bán chạy --}}
                        <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
                           <div class="container">
                              <div class="porto-products wpb_content_element mb-0">
                                 <h2 class="section-title slider-title"><span class="inline-title">BEST SELLING</span><span class="line"></span></h2>
                                 <div class="slider-wrapper">
                                    <div class="woocommerce columns-4">
                                       <ul class="products products-container products-slider owl-carousel nav-center-images-only nav-pos-outside nav-style-4 show-nav-hover pcols-lg-4 pcols-md-3 pcols-xs-3 pcols-ls-2 pwidth-lg-4 pwidth-md-3 pwidth-xs-2 pwidth-ls-1 owl-loaded owl-drag" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:4,&quot;md&quot;:3,&quot;xs&quot;:3,&quot;ls&quot;:2,&quot;nav&quot;:false}" data-product_layout="product-default">
                                          <div class="owl-stage-outer owl-height">
                                             <div class="owl-stage">
                                                @forelse($best_sell_products as $item)
                                                    @php
                                                    $now = Carbon\Carbon::now();
                                                    $now_timestamp = strtotime(Carbon\Carbon::now());
                                                    $expired_discount = $item->expired_discount;
                                                    $expired_discount_timestamp = strtotime($item->expired_discount);
                                                    if($now_timestamp <= $expired_discount_timestamp){
                                                       $diff = $now->diffAsCarbonInterval($expired_discount);
                                                    }
                                                    @endphp
                                                    <div class="owl-item">
                                                       <li class="product-col product-default product type-product post-1368 status-publish first instock product_cat-clothing product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-bag product_tag-clothes product_tag-fashion has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable">
                                                            <div class="product-inner">
                                                               <div class="product-image bor-radius-1">
                                                                  <a href="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
                                                                     <div class="labels">
                                                                         <div class="onhot">Hot</div>
                                                                         @php
                                                                         if($now_timestamp <= $expired_discount_timestamp){
                                                                         @endphp
                                                                         <div class="onsale">giảm {{ $item->discount }}%</div>
                                                                         @php
                                                                         }
                                                                         @endphp
                                                                     </div>
                                                                     <div class="inner img-effect bor-radius-1">
                                                                        @if($item->product_images->isNotEmpty())
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="">
                                                                           @if($item->product_images->count() >= 2)
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" class="hover-image" alt="" />
                                                                           @endif
                                                                        @else
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="">
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="hover-image" alt="" />
                                                                        @endif
                                                                     </div>
                                                                     @php
                                                                     if($now_timestamp <= $expired_discount_timestamp){
                                                                  @endphp
                                                                        <div class="sale-product-daily-deal">
                                                                           <h5 class="daily-deal-title">Discount Ends In: {{ ($diff->y > 0 ? $diff->y.' năm' : '') . ' ' . ($diff->m > 0 ? $diff->m.' tháng' : '') . ' ' . ($diff->d > 0 ? $diff->d.' ngày' : '') . ' ' . ($diff->hours > 0 ? $diff->hours.' giờ' : '') . ' ' . ($diff->minutes > 0 ? $diff->minutes.' phút' : '') }}</h5>
                                                                        </div>
                                                                     @php
                                                                     }
                                                                     @endphp
                                                                  </a>
                                                               </div>
                                                               <div class="product-content">
                                                                   <span class="category-list">
                                                                      @if($item->tags->isNotEmpty())
                                                                         @foreach($item->tags as $item_son)
                                                                           <a href="#" rel="tag">{{ $item_son->pretty_name }} ,</a>
                                                                         @endforeach
                                                                      @else
                                                                           <a href="{{route('categories',['code'=>$item->category->code])}}" rel="tag">
                                                                              {{ $item->category->pretty_name }}
                                                                           </a>
                                                                      @endif
                                                                   </span>
                                                                   <a class="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
                                                                      <h3 class="woocommerce-loop-product__title">{{ $item->pretty_name }}</h3>
                                                                   </a>
                                                                   <div class="rating-wrap">
                                                                      <div class="rating-content">
                                                                         <div class="star-rating" title="" data-original-title="4.00">
                                                                            <span style="width:{{ $item->star*20}}%"><strong class="rating">4.00</strong> out of 5</span>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                   <span class="price">
                                                                      @if($now <= $expired_discount)
                                                                         <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                               <span class="woocommerce-Price-currencySymbol"></span>{{$item->price}} vnđ
                                                                            </span>
                                                                         </del>
                                                                         <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>
                                                                            {{ $item->price*((100-$item->discount)/100) }} vnđ</span>
                                                                         </ins>
                                                                      @elseif($now > $expired_discount)
                                                                         <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"></span>{{$item->price}} vnđ
                                                                         </span>
                                                                      @else
                                                                         <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">Chưa cập nhật</span>
                                                                         </span>
                                                                      @endif
                                                                   </span>
                                                                   <div class="add-links-wrap">
                                                                      <div class="add-links clearfix bor-radius-1">
                                                                         <a href="#" data-quantity="1" class="viewcart-style-2 button product_type_variable add_to_cart_button bor-radius-1" data-product_id="1368" data-product_sku="" aria-label="Select options for “Brown Women Casual HandBag”" rel="nofollow">Thêm Vào Giỏ</a>
                                                                         <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1368  wishlist-fragment on-first-load" >
                                                                            {{-- <div class="yith-wcwl-add-button"> 
                                                                               <a href="https://www.portotheme.com/wordpress/porto/gutenberg-shop4?add_to_wishlist=1368" rel="nofollow" data-product-id="1368" data-product-type="variable" data-original-product-id="1368" class="add_to_wishlist single_add_to_wishlist" data-title="Add to Wishlist"> <span>Add to Wishlist</span> 
                                                                               </a>
                                                                            </div> --}}
                                                                         </div>
                                                                         {{-- <div class="quickview" data-id="1368" title="Quick View">Chi Tiết</div> --}}
                                                                      </div>
                                                                   </div>
                                                               </div>
                                                            </div>
                                                       </li>
                                                    </div>
                                                @empty
                                                   <h1>Chưa có sản phẩm nào</h1>
                                                @endforelse
                                             </div>
                                          </div>
                                          <div class="owl-dots disabled"></div>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </section>

                        {{-- NORMAL BANNER --}}
                        <section class="vc_section porto-section section-parallax porto-inner-container parallax-disabled mbi-1" data-image-src="" style="">
                          <div class="container">
                            <div class="wp-block-columns mb-0 align-items-center">
                                @if($dataImageOption['med_b_i']['text'][1] != '')
                                <div class="wp-block-column">
                                  <h3 class="porto-heading mb-0 py-2 text-center mbi-text-1" style="">{{ $dataImageOption['med_b_i']['text'][1] }}</h3>
                                </div>
                                @endif
                                @if($dataImageOption['med_b_i']['text'][2] != '')
                                <div class="wp-block-column col-xl-3">
                                  <div class="porto-button text-center">
                                    <a class="btn btn-lg btn-quaternary btn-modern my-3 mbi-text-2" href="#" style="border-radius: 5px">
                                      <span>{{ $dataImageOption['med_b_i']['text'][2] }}</span>
                                    </a>
                                  </div>
                                </div>
                                @endif
                                @if($dataImageOption['med_b_i']['text'][3] != '')
                                <div class="wp-block-column text-center py-2">
                                  <h5 class="porto-heading coupon-sale-text coupon-sale-light-bg m-b-sm mbi-text-3" style=""><b>{{ $dataImageOption['med_b_i']['text'][3] }}</b></h5>
                                </div>
                                @endif
                            </div>
                          </div>
                        </section>

                        {{-- sản phẩm mới  --}}
                        <section class="vc_section porto-section porto-inner-container pb-4">
                           <div class="container">
                              {{-- sản phẩm mới --}}
                              <div class="porto-products wpb_content_element mb-4">
                                 <h2 class="section-title slider-title"><span class="inline-title">Sản Phẩm Mới</span><span class="line"></span></h2>
                                 <div class="slider-wrapper">
                                    <div class="woocommerce columns-5">
                                       <ul class="products products-container products-slider owl-carousel nav-center-images-only nav-pos-outside nav-style-4 show-nav-hover pcols-lg-5 pcols-md-4 pcols-xs-3 pcols-ls-2 pwidth-lg-5 pwidth-md-4 pwidth-xs-3 pwidth-ls-2 owl-loaded owl-drag" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:4,&quot;md&quot;:3,&quot;xs&quot;:3,&quot;ls&quot;:2,&quot;nav&quot;:false}" data-product_layout="product-default">
                                          <div class="owl-stage-outer owl-height" style="">
                                             <div class="owl-stage" style="">
                                                @forelse($new_products as $item)
                                                    @php
                                                      $now = Carbon\Carbon::now();
                                                      $now_timestamp = strtotime(Carbon\Carbon::now());
                                                      $expired_discount = $item->expired_discount;
                                                      $expired_discount_timestamp = strtotime($item->expired_discount);
                                                      if($now_timestamp <= $expired_discount_timestamp){
                                                        $diff = $now->diffAsCarbonInterval($expired_discount);
                                                      }
                                                    @endphp
                                                    <div class="owl-item">
                                                       <li class="product-col product-default product type-product post-1368 status-publish first instock product_cat-clothing product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-bag product_tag-clothes product_tag-fashion has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable">
                                                            <div class="product-inner">
                                                               <div class="product-image bor-radius-1">
                                                                  <a href="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
                                                                     <div class="labels">
                                                                         <div class="onhot">Hot</div>
                                                                         @php
                                                                         if($now_timestamp <= $expired_discount_timestamp){
                                                                         @endphp
                                                                         <div class="onsale">giảm {{ $item->discount }}%</div>
                                                                         @php
                                                                         }
                                                                         @endphp
                                                                     </div>
                                                                     <div class="inner img-effect bor-radius-1">
                                                                        @if($item->product_images->isNotEmpty())
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="">
                                                                           @if($item->product_images->count() >= 2)
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" class="hover-image" alt="" />
                                                                           @endif
                                                                        @else
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="">
                                                                           <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="hover-image" alt="" />
                                                                        @endif
                                                                     </div>
                                                                     @php
                                                                     if($now_timestamp <= $expired_discount_timestamp){
                                                                  @endphp
                                                                        <div class="sale-product-daily-deal">
                                                                           <h5 class="daily-deal-title">Discount Ends In: {{ ($diff->y > 0 ? $diff->y.' năm' : '') . ' ' . ($diff->m > 0 ? $diff->m.' tháng' : '') . ' ' . ($diff->d > 0 ? $diff->d.' ngày' : '') . ' ' . ($diff->hours > 0 ? $diff->hours.' giờ' : '') . ' ' . ($diff->minutes > 0 ? $diff->minutes.' phút' : '') }}</h5>
                                                                        </div>
                                                                     @php
                                                                     }
                                                                     @endphp
                                                                  </a>
                                                               </div>
                                                               <div class="product-content">
                                                                   <span class="category-list">
                                                                      @if($item->tags->isNotEmpty())
                                                                         @foreach($item->tags as $item_son)
                                                                           <a href="#" rel="tag">{{ $item_son->pretty_name }} ,</a>
                                                                         @endforeach
                                                                      @else
                                                                           <a href="{{route('categories',['code'=>$item->category->code])}}" rel="tag">
                                                                              {{ $item->category->pretty_name }}
                                                                           </a>
                                                                      @endif
                                                                   </span>
                                                                   <a class="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
                                                                      <h3 class="woocommerce-loop-product__title">{{ $item->pretty_name }}</h3>
                                                                   </a>
                                                                   <div class="rating-wrap">
                                                                      <div class="rating-content">
                                                                         <div class="star-rating" title="" data-original-title="4.00">
                                                                            <span style="width:{{ $item->star*20}}%"><strong class="rating">4.00</strong> out of 5</span>
                                                                         </div>
                                                                      </div>
                                                                   </div>
                                                                   <span class="price">
                                                                      @if($now <= $expired_discount)
                                                                         <del>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                               <span class="woocommerce-Price-currencySymbol"></span>{{$item->price}} vnđ
                                                                            </span>
                                                                         </del>
                                                                         <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>
                                                                            {{ $item->price*((100-$item->discount)/100) }} vnđ</span>
                                                                         </ins>
                                                                      @elseif($now > $expired_discount)
                                                                         <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol"></span>{{$item->price}} vnđ
                                                                         </span>
                                                                      @else
                                                                         <span class="woocommerce-Price-amount amount">
                                                                            <span class="woocommerce-Price-currencySymbol">Chưa cập nhật</span>
                                                                         </span>
                                                                      @endif
                                                                   </span>
                                                                   <div class="add-links-wrap">
                                                                      <div class="add-links clearfix bor-radius-1">
                                                                         <a href="#" data-quantity="1" class="viewcart-style-2 button product_type_variable add_to_cart_button bor-radius-1" rel="nofollow">Thêm Vào Giỏ</a>
                                                                         <div class="yith-wcwl-add-to-wishlist add-to-wishlist-1368  wishlist-fragment on-first-load" >
                                                                            {{-- <div class="yith-wcwl-add-button"> 
                                                                               <a href="https://www.portotheme.com/wordpress/porto/gutenberg-shop4?add_to_wishlist=1368" rel="nofollow" data-product-id="1368" data-product-type="variable" data-original-product-id="1368" class="add_to_wishlist single_add_to_wishlist" data-title="Add to Wishlist"> <span>Add to Wishlist</span> 
                                                                               </a>
                                                                            </div> --}}
                                                                         </div>
                                                                         {{-- <div class="quickview" data-id="1368" title="Quick View">Chi Tiết</div> --}}
                                                                      </div>
                                                                   </div>
                                                               </div>
                                                            </div>
                                                       </li>
                                                    </div>
                                                @empty
                                                   <h1>Chưa có sản phẩm nào</h1>
                                                @endforelse
                                             </div>
                                          </div>
                                          <div class="owl-dots"></div>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </section>

                        {{-- small banner và danh mục  --}}
                        <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
                           <div class="container">
                              {{-- small banner --}}
                              @if($dataImageOption['small_b_i']['text'][1] != '' && $dataImageOption['small_b_i']['text'][2] != '' && $dataImageOption['small_b_i']['text'][3] != '')
                                <div class="vc_section porto-section section-parallax mx-0 py-3 mb-5 home-banner parallax-disabled sbi-1" data-plugin-parallax="" style="">
                                   <div class="parallax-background sbi-2" style=""></div>
                                   <div class="wp-block-columns mb-0" style="display: block;">
                                      <div class="wp-block-column" style="flex-basis:75%">
                                        <h2 class="porto-heading mb-0" style="font-size:1.275rem;line-height:1.2;color:#ffffff;">
                                          <strong>{{ $dataImageOption['small_b_i']['text'][1] != '' ? $dataImageOption['small_b_i']['text'][1] : '' }}</strong>
                                          {{ $dataImageOption['small_b_i']['text'][2] != '' ? $dataImageOption['small_b_i']['text'][2] : '' }}
                                          <small>{{ $dataImageOption['small_b_i']['text'][3] != '' ? $dataImageOption['small_b_i']['text'][3] : '' }}</small>
                                        </h2>
                                      </div>
                                      {{-- <div class="wp-block-column text-sm-right" style="flex-basis:25%"><a class="btn btn-lg btn-light btn-modern" href="#"><span>View Sale</span></a></div> --}}
                                   </div>
                                </div>
                              @endif
                              {{-- danh mục --}}
                              <div class="porto-products wpb_content_element">
                                 <h2 class="slider-title"><span class="inline-title">Danh Mục</span><span class="line"></span></h2>
                                 <div class="slider-wrapper">
                                    <div class="woocommerce columns-5">
                                       <ul class="products products-container products-slider owl-carousel category-pos-bottom category-text-center category-color-dark pcols-lg-5 pcols-md-4 pcols-xs-3 pcols-ls-2 pwidth-lg-5 pwidth-md-4 pwidth-xs-3 pwidth-ls-2 owl-loaded owl-drag" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:5,&quot;md&quot;:4,&quot;xs&quot;:3,&quot;ls&quot;:2}" data-product_layout="product-default">
                                          <div class="owl-stage-outer owl-height" style="height: 250px;">
                                             <div class="owl-stage">
                                                @forelse($categories as $item)
                                                  <div class="owl-item">
                                                    <li class="product-category product-col">
                                                      <a href="{{route('categories',['code' => $item->code])}}">
                                                        <span class="thumb-info align-center">
                                                          <span class="thumb-info-wrapper tf-none"><img src="{{asset('homepage/images/'.$item->image_name)}}" alt="Accessories" width="300" height="300"></span> 
                                                            <span class="thumb-info-wrap">
                                                              <span class="thumb-info-title">
                                                                <h3 class="sub-title thumb-info-inner">{{ $item->pretty_name }}</h3>
                                                                <span class="thumb-info-type"> <mark class="count">{{ $item->products_count }}</mark> Products </span> 
                                                              </span>
                                                          </span>
                                                        </span>
                                                      </a>
                                                    </li>
                                                  </div>
                                                @empty
                                                  
                                                @endforelse
                                             </div>
                                          </div>
                                          <div class="owl-dots disabled"></div>
                                       </ul>
                                    </div>
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
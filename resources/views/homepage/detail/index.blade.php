@extends('homepage.layouts.app')

@push('page-styles')
	<style type="text/css">
		#clockdiv{
			font-family: sans-serif;
			color: #fff;
			display: inline-block;
			font-weight: 100;
			text-align: center;
			font-size: 20px;
		}

		#clockdiv > div{
			padding: 5px;/
			border-radius: 3px;
			background: #EECBAD;
			display: inline-block;
		}

		#clockdiv div > span{
			padding: 10px;
			border-radius: 3px;	
			background: #8B7765;
			display: inline-block;
		}

		.smalltext{
			padding-top: 5px;
			font-size: 10px;
		}
		.social-icon{
			padding:17px;
			border-radius: 16px;
		}
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
	   background-image: url(/homepage/images/{{ $med_b_i['name'][0] != '' ? $med_b_i['name'][0] : 'med-banner1.jpg' }});
	   background-position: center center;
	   background-size: cover;
	   background-color: rgb(34, 37, 41);
	   position: relative;
	   overflow:
	 }
	 .mbi-2{
	   background-image: url(/homepage/images/{{ $med_b_i['name'][0] != '' ? $med_b_i['name'][0] : 'med-banner1.jpg' }});
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
	   background-image: url(/homepage/images/{{ $small_b_i['name'][0] != '' ? $small_b_i['name'][0] : 'small-banner.jpg' }});
	   background-size: cover;
	   background-position: 50% 0%;
	   position: absolute;
	   top: 0px;
	   left: 0px;
	   width: 100%;
	   height: 150%;
	 }
	 #porto-product-categories-3675 li.product-category .thumb-info-wrapper:after { background-color: rgba(27, 27, 23, 0); }#porto-product-categories-3675 li.product-category:hover .thumb-info-wrapper:after { background-color: rgba(27, 27, 23, 0.15); }
	</style>
@endpush

@section('content')
{{-- breadcrumb --}}
<section class="page-top page-header-6" style="">
   	<div class="container hide-title">
      	<div class="row" style="border: 1px solid #E9E4E4;border-radius: 15px;">
         	<div class="col-lg-12" style="">
           		<nav aria-label="breadcrumb bgc-white">
				  	<ol class="breadcrumb p-0 bgc-white mb-1 mt-1">
				    	<li><i class="fas fa-home brcr-icon-lr"></i><a href="{{route('home')}}" class="link-black">Home</a></li>
				    	<li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">Chi Tiết</a></li>
				    	<li><i class="fas fa-angle-right brcr-icon-lr"></i>{{$product->pretty_name}}</li>
				  	</ol>
				</nav>
         	</div>
      	</div>
   	</div>
</section>
<div id="main" class="column1 boxed">
   <!-- main -->
   	<div class="container">
      	<div class="row main-content-wrap">
         	<!-- main content -->
         	<div class="main-content col-lg-12">
            	<div id="content" role="main">
               		<main id="content" class="site-main" role="main">
                  		<div class="woocommerce-notices-wrapper"></div>
                  		<div id="product-1366" class="product type-product post-1366 status-publish first instock product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-clothes product_tag-fashion has-post-thumbnail sale downloadable shipping-taxable purchasable product-type-simple product-layout-default">
                  			{{-- ảnh sản phẩm và thông tin --}}
                  			@php
                          	$now = Carbon\Carbon::now();
                           	$now_timestamp = strtotime(Carbon\Carbon::now());
                           	$expired_discount = $product->expired_discount;
                           	$expired_discount_timestamp = strtotime($product->expired_discount);
                           	if($now_timestamp <= $expired_discount_timestamp){
                              	$diff = $now->diffAsCarbonInterval($expired_discount);
                           	}
                           	@endphp
	                     	<div class="product-summary-wrap">
		                        <div class="row">
		                        	{{-- ảnh sản phẩm --}}
		                           	<div class="summary-before col-md-5">
	                            		<div class="labels">
	                                		@php
                                          	if($now_timestamp <= $expired_discount_timestamp) {
                                          	@endphp
                                          		<div class="onsale">giảm {{ $product->discount }}%</div>
                                          	@php } @endphp
		                              	</div>
		                              	{{-- ảnh to --}}
		                              	<div class="product-images images">
		                                 	<div class="product-image-slider owl-carousel has-ccols ccols-1 owl-drag">
		                                    	<div class="owl-stage-outer">
		                                       		<div class="owl-stage">
		                                       			@forelse($product->product_images as $item)
		                                          		<div class="owl-item">
			                                             	<div class="img-thumbnail">
			                                                	<div class="inner">
			                                                		<img  class=" img-responsive" src="{{asset('admini/productImages/'.$item->name)}}"/>
			                                                	</div>
			                                             	</div>
		                                          		</div>
		                                          		@empty
		                                          		<div class="owl-item">
			                                             	<div class="img-thumbnail">
			                                                	<div class="inner">
			                                                		<img class="img-responsive" src="{{asset('admini/productImages/empty-product.jpg')}}" width="600" height="600">
			                                                	</div>
			                                             	</div>
		                                          		</div>
		                                          		@endforelse
		                                       		</div>
		                                    	</div>
		                                 	</div>
		                                 	<span class="zoom" data-index="0"><i class="fas fa-search" aria-hidden="true"></i></span>
		                              	</div>

		                              	{{-- ảnh thumbnail --}}
		                              	<div class="product-thumbnails thumbnails">
		                                 	<div class="product-thumbs-slider owl-carousel has-ccols ccols-4 owl-loaded owl-drag">
		                                    	<div class="owl-stage-outer">
		                                       		<div class="owl-stage">
		                                       			@forelse($product->product_images as $item)
			                                          	<div class="owl-item">
			                                             	<div class="img-thumbnail">
			                                             		<img class="img-responsive" src="{{asset('admini/productImages/'.$item->name)}}" width="150" height="150">
			                                             	</div>
			                                          	</div>
			                                          	@empty
			                                          	<div class="owl-item">
			                                             	<div class="img-thumbnail">
			                                             		<img class="img-responsive" src="{{asset('admini/productImages/empty-product.jpg')}}" width="150" height="150">
			                                             	</div>
			                                          	</div>
			                                          	@endforelse
	                                       			</div>
		                                    	</div>
			                                    <div class="thumb-nav">
			                                       <div class="thumb-prev"></div>
			                                       <div class="thumb-next"></div>
			                                    </div>
		                                 	</div>
		                              	</div>
		                           	</div>
		                           	{{-- thông tin --}}
		                           	<div class="summary entry-summary col-md-7">
		                              <h2 class="product_title entry-title show-product-nav">
		                                 {{$product->pretty_name}}	
		                              </h2>
		                              <div class="woocommerce-product-rating">
		                                 <div class="star-rating" title="" data-original-title="0">
		                                    <span style="width:{{ $product->star*20}}%">
		                                    <strong class="rating">0</strong> out of 5</span>
		                                 </div>
		                                 <div class="review-link noreview">
		                                    <a href="#review_form" class="woocommerce-write-review-link" rel="nofollow">( There are no reviews yet. )</a>
		                                 </div>
		                              </div>
		                              	<p class="price">
		                              	@if($now <= $expired_discount)
                                          	<del>
                                             	<span class="woocommerce-Price-amount amount">
                                                	<span class="woocommerce-Price-currencySymbol"></span>{{$product->price}} vnđ
                                             	</span>
                                          	</del>
                                          	<ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span>
                                             	{{ $product->price*((100-$product->discount)/100) }} vnđ</span>
                                          	</ins>
                                       	@elseif($now > $expired_discount)
                                          	<span class="woocommerce-Price-amount amount">
                                             	<span class="woocommerce-Price-currencySymbol"></span>{{$product->price}} vnđ
                                          	</span>
                                       	@else
                                          	<span class="woocommerce-Price-amount amount">
                                             	<span class="woocommerce-Price-currencySymbol">Chưa cập nhật</span>
                                          	</span>
                                       	@endif
		                              	</p>
                                       	@if($now_timestamp <= $expired_discount_timestamp)
		                              	<div class="sale-product-daily-deal">
		                                 	<h5 class="daily-deal-title">Thời gian giảm giá còn:</h5>
		                                 	<div id="clockdiv" class="mb-3"> 
											  	<div> 
											    	<span class="days" id="day"></span> 
											    	<div class="smalltext">Days</div> 
											  	</div> 
											  	<div> 
											    	<span class="hours" id="hour"></span> 
											    	<div class="smalltext">Hours</div> 
											  	</div> 
											  	<div> 
											    	<span class="minutes" id="minute"></span> 
											    	<div class="smalltext">Minutes</div> 
											  	</div> 
											  	<div> 
											    	<span class="seconds" id="second"></span> 
											    	<div class="smalltext">Seconds</div> 
											  	</div> 
											</div>
		                              	</div>
		                             	@endif
		                              	{{-- mô tả sản phẩm --}}
		                              	<div class="description woocommerce-product-details__short-description">
		                                 	<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
		                              	</div>
		                              	{{-- mã , danh mục , tags --}}
		                              	<div class="product_meta">
		                                 	<span class="sku_wrapper">SKU: <span class="sku">{{ $product->code }}</span></span>
		                                 	<span class="posted_in">Categories: 
		                                 		<a href="{{route('categories',['code'=>$product->category->code])}}" rel="tag">{{ $product->category->pretty_name }}</a>,
		                                 	</span>
		                                 	<span class="tagged_as">
		                                 		Tags:
		                                 		@forelse($product->tags as $item)
		                                 			<a href="#" rel="tag">{{$item->pretty_name}}</a>,
		                                 		@empty
		                                 			<a href="#" rel="tag"> ...</a>
		                                 		@endforelse
		                                 	</span>
		                              	</div>

		                              	<form class="cart" action="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/product/men-belt-double-set/" method="post" enctype="multipart/form-data">
		                                 	<div class="quantity buttons_added">
		                                 		<button type="button" value="-" class="minus">-</button>
		                                    	<input type="number" id="quantity_5e9005201d886" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric">
		                                    	<button type="button" value="+" class="plus">+</button>
		                                 	</div>
		                                 	<button type="" name="add-to-cart" value="1366" class="single_add_to_cart_button button alt">Add to cart</button>
		                              	</form>
		                              	<div class="product-share">
		                                 	<div class="share-links">
		                                 		<a href="#" target="_blank" rel="nofollow" data-tooltip="" data-placement="bottom" title="" class="share-facebook social-icon" data-original-title="Facebook">Facebook</a>
		                                    	<a href="#" target="_blank" rel="nofollow" data-tooltip="" data-placement="bottom" title="" class="share-twitter social-icon" data-original-title="Twitter">Twitter</a>
		                                    	<a href="#" target="_blank" rel="nofollow" data-tooltip="" data-placement="bottom" title="" class="share-linkedin social-icon" data-original-title="LinkedIn">LinkedIn</a>
		                                    	<a href="#" target="_blank" rel="nofollow" data-tooltip="" data-placement="bottom" title="" class="share-googleplus social-icon" data-original-title="Google +">Google +</a>
		                                    	<a href="#" target="_blank" rel="nofollow" data-tooltip="" data-placement="bottom" title="" class="share-email social-icon" data-original-title="Email">Email</a>
		                                 </div>
		                              </div>
		                           	</div>
		                        </div>
	                     	</div>

	                     	{{-- mô tả và size --}}
	                     	<div class="woocommerce-tabs woocommerce-tabs-p5efokul2m2uh3fin2md5f16n88aqhe resp-htabs" id="product-tab" style="display: block; width: 100%;">
		                        <ul class="resp-tabs-list">
		                           	<li class="description_tab resp-tab-item resp-tab-active" id="tab-title-description" role="tab" aria-controls="tab_item-0">Mô Tả</li>
		                           	<li class="global_tab_tab resp-tab-item" id="tab-title-global_tab" role="tab" aria-controls="tab_item-1">Size Guide</li>
		                           	<li class="additional_information_tab resp-tab-item" id="tab-title-additional_information" role="tab" aria-controls="tab_item-2">Additional information</li>
		                           	<li class="reviews_tab resp-tab-item" id="tab-title-reviews" role="tab" aria-controls="tab_item-3">Reviews (0)</li>
		                        </ul>
		                        <div class="resp-tabs-container">
		                           	<h2 class="resp-accordion" role="tab" aria-controls="tab_item-0">
		                           		<span class="resp-arrow"></span>Description				
		                           	</h2>
		                           	<div class="tab-content resp-tab-content" id="tab-description" aria-labelledby="tab_item-0">
		                              	<h2>Description</h2>
		                              	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
		                              	<style>#porto-info-list20719113585e9005201f196 i { color: #222529;font-size: 16px; }</style>
		                              	<ul id="porto-info-list20719113585e9005201f196" class="porto-info-list pl-4">
		                                 	<li class="porto-info-list-item">
		                                    	<i class="porto-info-icon fa fa-check-circle" aria-hidden="true"></i>
		                                    	<div class="porto-info-list-item-desc" font-size:="" 14px;="" style="font-size: 14px;">Any Product types that You want – Simple, Configurable</div>
		                                 	</li>
		                                 	<li class="porto-info-list-item">
		                                    	<i class="porto-info-icon fa fa-check-circle" aria-hidden="true"></i>
		                                    	<div class="porto-info-list-item-desc" font-size:="" 14px;="" style="font-size: 14px;">Downloadable/Digital Products, Virtual Products</div>
		                                 	</li>
		                                 	<li class="porto-info-list-item">
		                                    	<i class="porto-info-icon fa fa-check-circle" aria-hidden="true"></i>
		                                    	<div class="porto-info-list-item-desc" font-size:="" 14px;="" style="font-size: 14px;">Inventory Management with Backordered items</div>
		                                 	</li>
		                              	</ul>
		                              	<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		                           	</div>
		                           	<h2 class="resp-accordion" role="tab" aria-controls="tab_item-1">
		                           		<span class="resp-arrow"></span>
		                              	Size Guide				
		                           	</h2>
		                           	<div class="tab-content resp-tab-content" id="tab-global_tab" aria-labelledby="tab_item-1">
		                              	<div class="porto-block">
		                                 	<style>.vc_custom_1515734435831{margin-top: 20px !important;}.sizes-table { width: 100%; max-width: 100%; border-collapse: collapse; font-size: 14px; text-transform: uppercase; color: #21293c; }
		                                    .sizes-table thead th { background: #f4f4f2; }
		                                    .sizes-table tbody tr:nth-child(2n) > * { background: #ebebeb; }
		                                    .sizes-table thead th { padding: 30px 0 30px 10px; font-weight: 600; }
		                                    .sizes-table tbody td { padding: 12px 0 12px 10px; font-weight: bold; }
		                                    @media (min-width: 576px) {
		                                    .sizes-table thead th:first-child,
		                                    .sizes-table tbody th { padding-left: 30px; }
		                                    }
		                                 </style>
		                                 <div class="wp-block-columns">
		                                    <div class="wp-block-column" style="flex-basis:33.33%">
		                                       <div class="wp-block-image mt-3">
		                                          <figure class="aligncenter size-full"><img src="https://www.portotheme.com/wordpress/porto/gutenberg-shop1/wp-content/uploads/sites/112/2018/01/size_guide.png" alt="" class="wp-image-936"></figure>
		                                       </div>
		                                    </div>
		                                    <div class="wp-block-column" style="flex-basis:66.66%">
		                                       <table class="sizes-table">
		                                          <thead>
		                                             <tr>
		                                                <th>size</th>
		                                                <th>chest(in.)</th>
		                                                <th>waist(in.)</th>
		                                                <th>hips(in.)</th>
		                                             </tr>
		                                          </thead>
		                                          <tbody>
		                                             <tr>
		                                                <th>XS</th>
		                                                <td>34-36</td>
		                                                <td>27-29</td>
		                                                <td>34.5-36.5</td>
		                                             </tr>
		                                             <tr>
		                                                <th>S</th>
		                                                <td>36-38</td>
		                                                <td>29-31</td>
		                                                <td>36.5-38.5</td>
		                                             </tr>
		                                             <tr>
		                                                <th>M</th>
		                                                <td>38-40</td>
		                                                <td>31-33</td>
		                                                <td>38.5-40.5</td>
		                                             </tr>
		                                             <tr>
		                                                <th>L</th>
		                                                <td>40-42</td>
		                                                <td>33-36</td>
		                                                <td>40.5-43.5</td>
		                                             </tr>
		                                             <tr>
		                                                <th>XL</th>
		                                                <td>42-45</td>
		                                                <td>36-40</td>
		                                                <td>43.5-47.5</td>
		                                             </tr>
		                                             <tr>
		                                                <th>XXL</th>
		                                                <td>45-48</td>
		                                                <td>40-44</td>
		                                                <td>47.5-51.5</td>
		                                             </tr>
		                                          </tbody>
		                                       </table>
		                                    </div>
		                                 </div>
		                              </div>
		                           	</div>
		                           	<h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>
		                              	Additional information				
		                           	</h2>
		                           	<div class="tab-content resp-tab-content" id="tab-additional_information" aria-labelledby="tab_item-2">
		                              <h2>Additional information</h2>
		                              <table class="woocommerce-product-attributes shop_attributes table table-striped">
		                                 <tbody>
		                                    <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
		                                       <th class="woocommerce-product-attributes-item__label">Weight</th>
		                                       <td class="woocommerce-product-attributes-item__value">23 kg</td>
		                                    </tr>
		                                    <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--dimensions">
		                                       <th class="woocommerce-product-attributes-item__label">Dimensions</th>
		                                       <td class="woocommerce-product-attributes-item__value">12 × 23 × 56 cm</td>
		                                    </tr>
		                                    <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">
		                                       <th class="woocommerce-product-attributes-item__label">Color</th>
		                                       <td class="woocommerce-product-attributes-item__value">
		                                          <p>Green, Indigo</p>
		                                       </td>
		                                    </tr>
		                                    <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_size">
		                                       <th class="woocommerce-product-attributes-item__label">Size</th>
		                                       <td class="woocommerce-product-attributes-item__value">
		                                          <p>Extra Large</p>
		                                       </td>
		                                    </tr>
		                                 </tbody>
		                              </table>
		                           	</div>
		                           	<h2 class="resp-accordion" role="tab" aria-controls="tab_item-3"><span class="resp-arrow"></span>
		                              	Reviews (0)				
		                           	</h2>
		                           	<div class="tab-content resp-tab-content" id="tab-reviews" aria-labelledby="tab_item-3">
		                              <div id="reviews" class="woocommerce-Reviews">
		                                 <div id="comments">
		                                    <h2 class="woocommerce-Reviews-title">
		                                       Reviews		
		                                    </h2>
		                                    <p class="woocommerce-noreviews">There are no reviews yet.</p>
		                                 </div>
		                                 <hr class="tall">
		                                 <div id="review_form_wrapper">
		                                    <div id="review_form">
		                                       <div id="respond" class="comment-respond">
		                                          <h3 id="reply-title" class="comment-reply-title">Be the first to review “Men Belt Double Set” <small><a rel="nofollow" id="cancel-comment-reply-link" href="/wordpress/porto/gutenberg-shop4/product/men-belt-double-set/#respond" style="display:none;">Cancel reply</a></small></h3>
		                                          <form action="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
		                                             <div class="comment-form-rating">
		                                                <label for="rating">Your rating</label>
		                                                <p class="stars">						<span>							<a class="star-1" href="#">1</a>							<a class="star-2" href="#">2</a>							<a class="star-3" href="#">3</a>							<a class="star-4" href="#">4</a>							<a class="star-5" href="#">5</a>						</span>					</p>
		                                                <select name="rating" id="rating" required="" style="display: none;">
		                                                   <option value="">Rate…</option>
		                                                   <option value="5">Perfect</option>
		                                                   <option value="4">Good</option>
		                                                   <option value="3">Average</option>
		                                                   <option value="2">Not that bad</option>
		                                                   <option value="1">Very poor</option>
		                                                </select>
		                                             </div>
		                                             <p class="comment-form-comment"><label for="comment">Your review <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea></p>
		                                             <p class="comment-form-author"><label for="author">Name&nbsp;<span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" required=""></p>
		                                             <p class="comment-form-email"><label for="email">Email&nbsp;<span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" required=""></p>
		                                             <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
		                                             <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Submit"> <input type="hidden" name="comment_post_ID" value="1366" id="comment_post_ID">
		                                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
		                                             </p>
		                                          </form>
		                                       </div>
		                                       <!-- #respond -->
		                                    </div>
		                                 </div>
		                                 <div class="clear"></div>
		                              </div>
		                           	</div>

		                        </div>
	                     	</div>
                  		</div>
               		</main>
            	</div>	
         	</div>
         	<!-- end main content -->
         	<div class="sidebar-overlay"></div>
      	</div>
   	</div>
   	{{-- sản phẩm liên quan --}}
   	<div class="related products">
	   	<div class="container">
	      	<h2 style="font-size: 1.125rem;border-bottom: 1px solid rgba(0,0,0,.08);font-weight: 700;text-transform: uppercase;margin-bottom: 24px;">Related products</h2>
	      	<div class="slider-wrapper">
	         	<ul class="products products-container products-slider owl-carousel show-dots-title-right pcols-lg-4 pcols-md-3 pcols-xs-3 pcols-ls-2 pwidth-lg-4 pwidth-md-3 pwidth-xs-2 pwidth-ls-1 owl-loaded owl-drag" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:4,&quot;md&quot;:3,&quot;xs&quot;:3,&quot;ls&quot;:2,&quot;dots&quot;:true}">
	            	<div class="owl-stage-outer owl-height">
	               		<div class="owl-stage">
	               			@forelse($related_products as $item)
	                            @php
	                            // $now = Carbon\Carbon::now();
	                            // $now_timestamp = strtotime(Carbon\Carbon::now());
	                            $expired_discount_item = $item->expired_discount;
	                            $expired_discount_timestamp_item = strtotime($item->expired_discount);
	                            if($now_timestamp <= $expired_discount_timestamp_item){
	                               $diff = $now->diffAsCarbonInterval($expired_discount_item);
	                            }
	                            @endphp
	                            <div class="owl-item">
	                               <li class="product-col product-default product type-product post-1368 status-publish first instock product_cat-clothing product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-bag product_tag-clothes product_tag-fashion has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable">
	                                  	<div class="product-inner">
	                                     	<div class="product-image">
	                                        	<a href="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
	                                           	<div class="labels">
		                                              <div class="onhot">Hot</div>
		                                              @php
		                                              if($now_timestamp <= $expired_discount_timestamp_item){
		                                              @endphp
		                                              <div class="onsale">giảm {{ $item->discount }}%</div>
		                                              @php
		                                              }
		                                              @endphp
	                                           	</div>
	                                           	<div class="inner img-effect">
	                                           		@if($item->product_images->isNotEmpty())
	                                           			<img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="" />
	                                           			@if($item->product_images->count() >= 2)
	                                           			<img width="300" height="300" src="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" data-oi="{{asset('admini/productImages/'.$item->product_images[1]->name)}}" class="hover-image" alt="" />
	                                           			@endif
                                           			@else
                                           				<img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="" />
                                           				<img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="hover-image" alt="" />
                                           			@endif
	                                           	</div>
	                                           	@php
	                                           	if($now_timestamp <= $expired_discount_timestamp_item){
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
		                                           <div class="add-links clearfix">
		                                              <a href="#" data-quantity="1" class="viewcart-style-2 button product_type_variable add_to_cart_button" data-product_id="1368" data-product_sku="" aria-label="Select options for “Brown Women Casual HandBag”" rel="nofollow">Thêm Vào Giỏ</a>
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
	            	<div class="owl-nav disabled">
	            		<button type="button" role="presentation" class="owl-prev"></button>
                		<button type="button" role="presentation" class="owl-next"></button>
	            	</div>
	            	<div class="owl-dots">
	            	</div>
	         	</ul>
	      	</div>
	   	</div>
	</div>
</div>
@endsection

@push('libs-scripts')

@endpush

@push('page-scripts')
<script type="text/javascript">
   	jQuery(document).ready(function($) {
   		$('.resp-tab-item').click(function(event) {
   			var label = $(this).attr('aria-controls');
   			$('.resp-tabs-list').find('.resp-tab-item').removeClass('resp-tab-active');
   			$('.resp-tabs-container').find('.resp-tab-content').removeClass('resp-tab-content-active');
   			$(this).addClass('resp-tab-active');
   			$('.resp-tabs-container').find('.resp-tab-content[aria-labelledby="' + label + '"]').addClass('resp-tab-content-active');
   		});

   		$('.resp-accordion').click(function(event) {
   			var label = $(this).attr('aria-controls');
   			if($(this).next().hasClass('resp-tab-content-active')){
   				// $(this).removeClass('resp-tab-active');
   				$('.resp-tabs-container').find('h2.resp-tab-active').removeClass('resp-tab-active');
   				$('.resp-tabs-container').find('.resp-tab-content-active').removeClass('resp-tab-content-active');
   			}else{
   				$('.resp-tabs-list').find('.resp-tab-active').removeClass('resp-tab-active');
   				$('.resp-tabs-container').find('.resp-tab-content').removeClass('resp-tab-content-active');
   				$('.resp-tabs-container').find('.resp-tab-active').removeClass('resp-tab-active');
   				$(this).addClass('resp-tab-active');
   				$('.resp-tabs-container').find('.resp-tab-content[aria-labelledby="' + label + '"]').addClass('resp-tab-content-active');
   			}
   		});

   		@if($now_timestamp <= $expired_discount_timestamp)
	   		function getTimeRemaining(endtime) {
			  	var t = Date.parse(endtime) - Date.parse(new Date());
			  	var seconds = Math.floor((t / 1000) % 60);
			  	var minutes = Math.floor((t / 1000 / 60) % 60);
			  	var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
			  	var days = Math.floor(t / (1000 * 60 * 60 * 24));
			  	return {
			    	'total': t,
			    	'days': days,
			    	'hours': hours,
			    	'minutes': minutes,
			    	'seconds': seconds
			  	};
			}

			function initializeClock(id, endtime) {
			  	var clock = document.getElementById(id);
			  	var daysSpan = clock.querySelector('.days');
			  	var hoursSpan = clock.querySelector('.hours');
			  	var minutesSpan = clock.querySelector('.minutes');
			  	var secondsSpan = clock.querySelector('.seconds');

			  	function updateClock() {
			    	var t = getTimeRemaining(endtime);

			    	daysSpan.innerHTML = t.days;
			   	 	hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
			    	minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
			    	secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

			    	if (t.total <= 0) {
			      		clearInterval(timeinterval);
			    	}
			  	}

			  	updateClock();
			  	var timeinterval = setInterval(updateClock, 1000);
			}

			var deadline = new Date('{{ $product->expired_discount }}');
			initializeClock('clockdiv', deadline);
		@endif

   	});
</script>
@endpush
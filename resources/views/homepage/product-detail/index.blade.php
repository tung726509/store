{{-- master layout --}}
@extends('homepage.layouts.app')

{{-- css library --}}
@push('libs-styles')
	<link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
	<link href="{{ asset('admini/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

{{-- css page --}}
@push('page-styles')
	<style type="text/css">

	</style>
@endpush

{{-- bread_crumb --}}
@section('breadcrumb')
   	@parent
	<li>
		<i class="fas fa-angle-right brcr-icon-lr"></i><a href="{{ route('categories',['code'=>$product->category->code]) }}" class="link-black">{{$product->category->pretty_name}}</a>
	</li>
   	<li>
   		<i class="fas fa-angle-right brcr-icon-lr"></i>{{$product->pretty_name}}
   	</li>
@endsection

{{-- content --}}
@section('content')
	<div class="container">
  		<div class="product type-product post-1366 status-publish first instock product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-clothes product_tag-fashion has-post-thumbnail sale downloadable shipping-taxable purchasable product-type-simple product-layout-default">
  			{{-- ảnh sản phẩm và thông tin --}}
  				@php
	           	$expired_discount = $product->expired_discount;
	           	$expired_discount_timestamp = strtotime($product->expired_discount);
	           	if($now_timestamp <= $expired_discount_timestamp){
	              	$diff = $now->diffAsCarbonInterval($expired_discount);
	           	}
           	@endphp
         	<div class="product-summary-wrap">
          		{{-- ảnh sản phẩm --}}
               <div class="row">
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
                                         	<div class="inner bor-radius-1">
                                         		<img class="img-responsive bor-radius-1" src="{{asset('admini/productImages/'.$item->name)}}"/>
                                         	</div>
                                      	</div>
                               		</div>
                               		@empty
                               		<div class="owl-item">
                                      	<div class="img-thumbnail">
                                         	<div class="inner bor-radius-1">
                                         		<img class="img-responsive bor-radius-1" src="{{asset('admini/productImages/empty-product.jpg')}}" width="600" height="600">
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
                            		<div class="owl-stage ">
                            			@forelse($product->product_images as $item)
                                   	<div class="owl-item bor-radius-1">
                                      	<div class="img-thumbnail bor-radius-1">
                                      		<img class="img-responsive bor-radius-1" src="{{asset('admini/productImages/'.$item->name)}}" width="150" height="150">
                                      	</div>
                                   	</div>
                                   	@empty
                                   	<div class="owl-item">
                                      	<div class="img-thumbnail bor-radius-1">
                                      		<img class="img-responsive bor-radius-1" src="{{asset('admini/productImages/empty-product.jpg')}}" width="150" height="150">
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
                   	<h2 class="product_title entry-title show-product-nav">{{$product->pretty_name}}</h2>
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
									  	<div class="bor-radius-1"> 
									    	<span class="days" id="day"></span> 
									    	<div class="smalltext">Days</div> 
									  	</div> 
									  	<div class="bor-radius-1"> 
									    	<span class="hours" id="hour"></span> 
									    	<div class="smalltext">Hours</div> 
									  	</div> 
									  	<div class="bor-radius-1"> 
									    	<span class="minutes" id="minute"></span> 
									    	<div class="smalltext">Minutes</div> 
									  	</div> 
									  	<div class="bor-radius-1"> 
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

                  	<div class="quantity buttons_added bor-radius-1">
                  		<button type="button" value="-" class="minus">-</button>
                     	<input type="number" id="product_amount" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" size="4" placeholder="" inputmode="numeric">
                     	<button type="button" value="+" class="plus">+</button>
                  	</div>
                  	<button type="" name="add_to_cart" value="" class="button add-to-cart bor-radius-1"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                   	<div class="product-share">
                      	<div class="share-links">
                				<a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-facebook social-icon" data-original-title="Facebook">Facebook</a>
                         	<a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank" class="share-twitter social-icon" data-original-title="Twitter">Twitter</a>
                         	<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}" target="_blank" class="share-linkedin social-icon" data-original-title="LinkedIn">LinkedIn</a>

                      	</div>
                   	</div>
             		</div>
          		</div>
         	</div>
         	@if($product->description != null)
             	<div class="woocommerce-tabs resp-htabs fr-view" id="product_accordion" style="display: block; width: 100%;">
                 	<ul class="resp-tabs-list">
                    	@if($product->description->description != null)
                    		<li class="resp-tab-item resp-tab-active" id="heading_description" data-toggle="collapse" data-target="#product_accordion_description">Mô Tả Sản Phẩm</li>
                		@endif
                    	@if($product->description->size != null)
                    		<li class="resp-tab-item" id="heading_size" data-toggle="collapse" data-target="#product_accordion_size" aria-controls="product_accordion_size">Bảng kích cỡ</li>
                		@endif
                    	@if($product->description->user_manual != null)
                    		<li class="resp-tab-item" id="heading_user_manual" data-toggle="collapse" data-target="#product_accordion_user_manual" aria-controls="product_accordion_user_manual">Hướng dẫn sử dụng</li>
                		@endif
                    	@if($product->description->preservation != null)
                    		<li class="resp-tab-item" id="heading_preservation" data-toggle="collapse" data-target="#product_accordion_preservation" aria-controls="product_accordion_preservation">Hướng dẫn bảo quản</li>
                		@endif
                    	@if($product->description->note != null)
                    		<li class="resp-tab-item" id="heading_note" data-toggle="collapse" data-target="#product_accordion_note" aria-controls="product_accordion_note">Lưu ý</li>
                		@endif
                 	</ul>
                    	<div class="resp-tabs-container">
                    		@if($product->description->description != null)
                    			<h2 class="resp-accordion resp-tab-active" data-toggle="collapse" data-target="#product_accordion_description" aria-controls="product_accordion_description"><i class="fas fa-chevron-down mr-1"></i> Mô Tả Sản Phẩm</h2>
                        	<div class="tab-content collapse show" id="product_accordion_description" aria-labelledby="heading_description" data-parent="#product_accordion">{!! $product->description->description !!}</div>
                       	@endif
                       	@if($product->description->size != null)
                    			<h2 class="resp-accordion" data-toggle="collapse" data-target="#product_accordion_size" aria-controls="product_accordion_size"><i class="fas fa-chevron-down mr-1"></i> Bảng kích cỡ</h2>
                           	<div class="tab-content collapse" id="product_accordion_size" aria-labelledby="heading_size" data-parent="#product_accordion">{!! $product->description->size !!}</div>
                       	@endif
                       	@if($product->description->user_manual != null)
                       		<h2 class="resp-accordion" data-toggle="collapse" data-target="#product_accordion_user_manual" aria-controls="product_accordion_user_manual"><i class="fas fa-chevron-down mr-1"></i> Hướng dẫn sử dụng</h2>
                           	<div class="tab-content collapse" id="product_accordion_user_manual" aria-labelledby="heading_user_manual" data-parent="#product_accordion">{!! $product->description->user_manual !!}</div>
                       	@endif
                       	@if($product->description->preservation != null)
                       		<h2 class="resp-accordion" data-toggle="collapse" data-target="#product_accordion_preservation" aria-controls="product_accordion_preservation"><i class="fas fa-chevron-down mr-1"></i>Hướng dẫn bảo quản</h2>
                           	<div class="tab-content collapse" id="product_accordion_preservation" aria-labelledby="heading_preservation" data-parent="#product_accordion">{!! $product->description->preservation !!}</div>
                       	@endif
                       	@if($product->description->note != null)
                       		<h2 class="resp-accordion" data-toggle="collapse" data-target="#product_accordion_note" aria-controls="product_accordion_note"><i class="fas fa-chevron-down mr-1"></i> Lưu ý</h2>
                           	<div class="tab-content collapse" id="product_accordion_note" aria-labelledby="heading_note" data-parent="#product_accordion">{!! $product->description->note !!}</div>
                       	@endif
                    	</div>
             	</div>
         	@endif
  		</div>
	</div>

	{{-- sản phẩm liên quan --}}
	<div class="related products mt-5">
   	<div class="container">
      	<h2 style="font-size: 1.125rem;border-bottom: 1px solid rgba(0,0,0,.08);font-weight: 700;text-transform: uppercase;margin-bottom: 24px;">Related products</h2>
      	{{-- ds products --}}
         @include('homepage.includes.foreach-products',['data' => $related_products])
   	</div>
	</div>

	{{-- small banner và danh mục  --}}
  	@include('homepage.includes.small-banner')
@endsection

{{-- js library --}}
@push('libs-scripts')
@endpush

{{-- js page --}}
@push('page-scripts')
	<script type="text/javascript">
	   	jQuery(document).ready(function($) {
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

			$('div.tab-content p:last-child').remove();

			$('.resp-tab-item').click(function(event) {
				let _element = $(this);
				if(_element.hasClass('resp-tab-active')){
					$('.resp-tab-item').removeClass('resp-tab-active');
					_element.removeClass('resp-tab-active');
				}else{
					$('.resp-tab-item').removeClass('resp-tab-active');
					_element.addClass('resp-tab-active');
				}
			});
			
			$('.resp-accordion').click(function(event) {
				let _element = $(this);
				if(_element.hasClass('resp-tab-active')){
					$('.resp-accordion').removeClass('resp-tab-active');
					_element.removeClass('resp-tab-active');
				}else{
					$('.resp-accordion').removeClass('resp-tab-active');
					_element.addClass('resp-tab-active');
				}
			});
	   	});
	</script>
@endpush
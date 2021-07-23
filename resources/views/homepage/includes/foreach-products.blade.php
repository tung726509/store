<div class="slider-wrapper">
  	<div class="woocommerce columns-5">
     	<ul class="products products-container products-slider owl-carousel nav-center-images-only nav-pos-outside nav-style-4 show-nav-hover pcols-lg-5 pcols-md-4 pcols-xs-3 pcols-ls-2 pwidth-lg-5 pwidth-md-4 pwidth-xs-3 pwidth-ls-2 owl-loaded owl-drag" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:4,&quot;md&quot;:3,&quot;xs&quot;:3,&quot;ls&quot;:2,&quot;nav&quot;:false}">
        	<div class="owl-stage-outer owl-height">
           		<div class="owl-stage">
              		@forelse($data as $item)
                 		@php
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
		                             	<a class="direct-link" href="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
			                                <div class="labels">
			                                   	<div class="onhot">Hot</div>
	                                         	@if($now_timestamp <= $expired_discount_timestamp)
	                                            	<div class="onsale">giảm {{ $item->discount }}%</div>
	                                         	@endif
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
		                                   	@if($now_timestamp <= $expired_discount_timestamp)
			                                   	<div class="sale-product-daily-deal">
			                                      	<h5 class="daily-deal-title">Discount Ends In: {{ ($diff->y > 0 ? $diff->y.' năm' : '') . ' ' . ($diff->m > 0 ? $diff->m.' tháng' : '') . ' ' . ($diff->d > 0 ? $diff->d.' ngày' : '') . ' ' . ($diff->hours > 0 ? $diff->hours.' giờ' : '') . ' ' . ($diff->minutes > 0 ? $diff->minutes.' phút' : '') }}</h5>
			                                   	</div>
		                                   	@endif
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
		                                   		<a href="javascript:;" class="viewcart-style-2 bor-radius-1 add_to_cart_button" data-product-id="{{ $item->id }}">
		                                      		<i class="fas fa-cart-plus"></i> Thêm Vào Giỏ
		                                   		</a>
		                                   		<div class="quickview" title="Quick View">Chi Tiết</div>
		                                	</div>
		                             	</div>
		                          	</div>
		                       	</div>
	                    	</li>
	                 	</div>
              		@empty
                 		<h3>Chưa có sản phẩm nào</h3>
              		@endforelse
           		</div>
        	</div>
        	<div class="owl-dots"></div>
     	</ul>
   	</div>
</div>
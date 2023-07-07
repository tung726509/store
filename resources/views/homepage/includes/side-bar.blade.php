<style type="text/css">
	#side-nav-panel .accordion-menu .arrow:before {
    	content: '';
	}
	#side-nav-panel .accordion-menu .open>.arrow:before {
    	content: '';
	}
    .p-relate-title {
        display: block;
        width: 100%;
        overflow: hidden;
        margin: 0px !important;
        color: black !important;
        text-decoration: none;
        transition: 0.15s;
        font-size: 14px;
    }
    .fl-left {
        float: left;
    }
    .block-post-relate-t {
        color: #ff9900 !important;
        font-size: 18px;
        border-bottom: 1px solid rgb(60, 54, 54);
        margin-bottom: 24px;
        font-family: 'Roboto Slab';
    }
    .product {
        margin: 0px !important;
    }
</style>

<div class="relate-post">
    <div class="entry-header-outer">
        <div class="related products">
            <div class="container">
                <h3 class="block-post-relate-t">Giới thiệu</h3>
                <div class="slider-wrapper">
                    <div class="woocommerce columns-5">
                        <ul class="products products-container products-slider owl-carousel nav-center-images-only nav-pos-outside nav-style-4 show-nav-hover pcols-lg-5 pcols-md-3 pcols-xs-3 pcols-ls-2 pwidth-lg-5 pwidth-md-3 pwidth-xs-3 pwidth-ls-2 owl-loaded owl-drag mar-0" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:3,&quot;md&quot;:3,&quot;xs&quot;:2,&quot;ls&quot;:2,&quot;nav&quot;:false}">
                            <div class="owl-stage-outer owl-height p-0">
                                <div class="owl-stage">
                                    <div class="owl-item">
                                        <li class="product-col product-default product type-product post-1368 status-publish first instock product_cat-clothing product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-bag product_tag-clothes product_tag-fashion has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable">
                                            <div class="product-inner">
                                                <div class="product-image bor-radius-1">
                                                    <a class="direct-link" href="#">
                                                        <div class="inner img-effect bor-radius-1">
                                                            <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="porto-lazyload  wp-post-image lazy-load-loaded" alt="">
                                                            <img width="300" height="300" src="{{asset('admini/productImages/empty-product.jpg')}}" data-oi="{{asset('admini/productImages/empty-product.jpg')}}" class="hover-image" alt="" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="product-content">
                                                    {{-- <a class="{{ route('detail',['product_id' => base64_encode($item->code)]) }}"> --}}
                                                        <h3 class="p-relate-title fl-left">{{ $item->pretty_name }}</h3>
                                                        <p class="date meta-item tie-icon m-0">28 Tháng Tám, 2021</p>
                                                    {{-- </a> --}}
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                            <a class="direct-link" href="{{route('categories',['code' => $item->code])}}">
                                                <span class="thumb-info align-center">
                                                    <span class="thumb-info-wrapper tf-none"><img src="{{asset('homepage/images/'.$item->image_name)}}" alt="Accessories" width="300" height="300"></span> 
                                                    <span class="thumb-info-wrap">
                                                        <span class="thumb-info-title">
                                                            <h3 class="sub-title thumb-info-inner">{{ $item->pretty_name }}</h3>
                                                            <span class="thumb-info-type">
                                                                <mark class="count">{{ $item->products_count }}</mark> Products
                                                            </span> 
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
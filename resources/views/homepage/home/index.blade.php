{{-- master layout --}}
@extends('homepage.layouts.app')

{{-- css library --}}
@push('libs-styles')
    <link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/jquery.nice-number.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/pretty-checkbox.min.css') }}" rel="stylesheet">
@endpush

{{-- css page --}}
@push('page-styles')
    <style type="text/css">

    </style>
@endpush

{{-- bread_crumb --}}
@section('breadcrumb')
   @parent
@endsection

{{-- content --}}
@section('content')
      {{-- featured post --}}
      {{-- @include('homepage.includes.featured-post') --}}

      {{-- bán chạy --}}
      <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
         <div class="container">
            <div class="porto-products wpb_content_element mb-0">
               <h2 class="section-title slider-title">
                  <span class="inline-title">DANH SÁCH BÀI VIẾT</span><span class="line"></span>
               </h2>
               <div class="related products">
                  <div class="container">
                     <div class="row">
                        <div class="col-12">
                           <div class="owl-stage">
                              @forelse($products as $item)
                                  <div class="owl-item">
                                      <li class="product-col product-default product type-product post-1368 status-publish first instock product_cat-clothing product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-bag product_tag-clothes product_tag-fashion has-post-thumbnail sale featured shipping-taxable purchasable product-type-variable">
                                          <div class="product-inner">
                                              <div class="product-image bor-radius-1">
                                                  <a class="direct-link" href="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
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
                                                  </a>
                                              </div>
                                              <div class="product-content">
                                                  <a class="{{ route('detail',['product_id' => base64_encode($item->code)]) }}">
                                                      <h3 class="p-relate-title fl-left">{{ $item->pretty_name }}</h3>
                                                      <p class="date meta-item tie-icon m-0">28 Tháng Tám, 2021</p>
                                                  </a>
                                              </div>
                                          </div>
                                      </li>
                                  </div>
                              @empty
                                  {{-- {{ $data }} --}}
                                  <h3>Chưa có bài viết liên quan</h3>
                              @endforelse
                           </div>
                        </div>
                     </div>
                  </div>
              </div>
               {{-- @include('homepage.includes.foreach-products',['data' => $products]) --}}
            </div>
         </div>
      </section>

      {{-- NORMAL BANNER --}}
      {{-- @include('homepage.includes.normal-banner') --}}

      {{-- sản phẩm mới  --}}
      {{-- <section class="vc_section porto-section porto-inner-container pb-4">
         <div class="container">
            <div class="porto-products wpb_content_element mb-4">
               <h2 class="section-title slider-title"><span class="inline-title">Sản Phẩm Mới</span><span class="line"></span></h2>
               @include('homepage.includes.foreach-products',['data' => $new_products])
            </div>
         </div>
      </section> --}}

      {{-- small banner và danh mục  --}}
      {{-- @include('homepage.includes.small-banner') --}}
@endsection

{{-- js library --}}
@push('libs-scripts')
@endpush

{{-- js page --}}
@push('page-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($) {

        });
    </script>
@endpush

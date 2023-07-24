{{-- master layout --}}
@extends('homepage.layouts.app')

{{-- css library --}}
@push('libs-styles')
   <link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('homepage/css/owl.carousel.min.css')}}"> --}}
   {{-- <link rel="stylesheet" type="text/css" href="{{asset('homepage/css/owl.theme.default.min.css')}}"> --}}
@endpush

{{-- css page --}}
@push('page-styles')
@endpush

{{-- bread_crumb --}}
@section('breadcrumb')
   @parent
   <li>
      <i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">{{ $category->pretty_name }}</a>
   </li>
@endsection

{{-- content --}}
@section('content')
      {{-- ưu đãi khách hàng --}}
      {{-- @include('homepage.includes.featured-post') --}}

      {{-- ds sản phẩm theo category --}}
      <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
         <div class="container">
          <div class="porto-products wpb_content_element mb-4">
            <h2 class="section-title slider-title"><span class="inline-title">DANH SÁCH {{ $category->pretty_name }}</span><span class="line"></span></h2>
            {{-- sắp xếp và số lượng hiển thị --}}
            {{-- <form method="get" id="filterForm" action="{{ route('categories',['code'=>$category->code]) }}">
               @csrf
               <div class="pb-3 container" style="opacity: 1;">
                  <div class="row">
                     <div class="col-12 mb-2">
                        <div class="row">
                           <div class="col-4 col-md-2 align-self-center">
                              <label>Sắp xếp theo : </label>
                           </div>
                           <div class="col-7">
                              <select name="orderby" class="orderby" id="filter_price">
                                 <option value="l_to_h" {{$orderby == "l_to_h" ? 'selected' : ''}}>Giá thấp đến cao</option>
                                 <option value="h_to_l" {{$orderby == "h_to_l" ? 'selected' : ''}}>Giá cao đến thấp</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="row">
                           <div class="col-4 col-md-2 align-self-center">
                              <label>Hiển Thị : </label>
                           </div>
                           <div class="col-7">
                              <select name="count" class="count" id="filter_per" style="">
                                 <option value="10" {{$count == "10" ? 'selected' : ''}}>10</option>
                                 <option value="20" {{$count == "20" ? 'selected' : ''}}>20</option>
                                 <option value="30" {{$count == "30" ? 'selected' : ''}}>30</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form> --}}
            <div class="related products">
               <div class="container">
                   <div class="slider-wrapper">
                       <div class="woocommerce columns-5">
                           <ul class="products products-container products-slider owl-carousel nav-center-images-only nav-pos-outside nav-style-4 show-nav-hover pcols-lg-5 pcols-md-3 pcols-xs-3 pcols-ls-2 pwidth-lg-5 pwidth-md-3 pwidth-xs-3 pwidth-ls-2 owl-loaded owl-drag mar-0" data-plugin-options="{&quot;themeConfig&quot;:true,&quot;lg&quot;:3,&quot;md&quot;:3,&quot;xs&quot;:2,&quot;ls&quot;:2,&quot;nav&quot;:false}">
                               <div class="owl-stage-outer owl-height p-0">
                                   <div class="owl-stage">
                                       @forelse($category_products as $item)
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
                           </ul>
                       </div>
                   </div>
               </div>
           </div>

            {{-- ds bài viết --}}
            {{-- @include('homepage.includes.foreach-products',['data' => $category_products]) --}}

            {{-- điều hướng trang --}}
            {{ $category_products->render('vendor.pagination.custom-by-me') }}
          </div>
         </div>
      </section>

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
         var screen_width = $( window ).width();
         var itemsss = 1;

         if(screen_width < 576){
             console.log(screen_width,itemsss);
             itemsss = 2;
             $('#owl_carousel_categories').owlCarousel({
               items:itemsss,
               dots:false,
             });
         }else if(576 <= screen_width && screen_width <= 1024){
             console.log(screen_width,itemsss);
             itemsss = 4;
             $('#owl_carousel_categories').owlCarousel({
               items:itemsss,
               dots:false,
             });
         }else{
             console.log(screen_width,itemsss);
             itemsss = 5;
             $('#owl_carousel_categories').owlCarousel({
               items:itemsss,
               dots:false,
             });
         }

         $('#owl_carousel_bigbanner').owlCarousel({
           items:1,
           dots:false,
         });

         $("#filter_price").change(function(){
            $("#filterForm").submit();
         });

         $("#filter_per").on('change', function(){
            $("#filterForm").submit();
         });

         // $('#select-beast').selectize({
         //   create: true,
         //   sortField: 'text'
         // });
      });
   </script>
@endpush

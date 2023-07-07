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

            {{-- ds bài viết --}}
            @include('homepage.includes.foreach-products',['data' => $category_products])

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

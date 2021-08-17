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
      {{-- ưu đãi khách hàng --}}
      @include('homepage.includes.incentive')

      {{-- bán chạy --}}
      <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
         <div class="container">
            <div class="porto-products wpb_content_element mb-0">
               <h2 class="section-title slider-title"><span class="inline-title">BEST SELLING</span><span class="line"></span></h2>
               @include('homepage.includes.foreach-products',['data' => $best_sell_products])
            </div>
         </div>
      </section>

      {{-- NORMAL BANNER --}}
      @include('homepage.includes.normal-banner')

      {{-- sản phẩm mới  --}}
      <section class="vc_section porto-section porto-inner-container pb-4">
         <div class="container">
            {{-- sản phẩm mới --}}
            <div class="porto-products wpb_content_element mb-4">
               <h2 class="section-title slider-title"><span class="inline-title">Sản Phẩm Mới</span><span class="line"></span></h2>
               @include('homepage.includes.foreach-products',['data' => $new_products])
            </div>
         </div>
      </section>

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
            
        });
    </script>
@endpush
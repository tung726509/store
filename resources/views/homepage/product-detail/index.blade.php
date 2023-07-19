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
        .summary-before {
            border: 1px solid rgba(0,0,0,.125);
            padding: 0px;
        }
        .relate-post {
            border: 1px solid rgba(0,0,0,.125);
            padding: 0px;
        }
        .entry-header {
            margin-top: 20px;
        }
        .entry-header-outer {
            padding:30px 30px 20px;
        }
        .breadcrumb-detail a {
            font-size: 13px;
        }
        .breadcrumb-detail a:not(:hover) {
            color: #999999 !important;
        }
        .label-category {
            width: fit-content;
            background-color: #ff9900;
            color: #FFFFFF;
            padding: 2px 4px 2px 4px;
            border-radius: 3px;
        }
        .entry-title {
            margin: 15px 0 15px 0;
            font-family: 'Roboto Slab';
        }
        .post-meta {
            overflow: inherit;
            font-size: 12px;
            margin-top: 5px;
            margin-bottom: 0;
            line-height: 24px;
        }
        .meta-item {
            margin-right: 8px;
            display: inline-block;
        }
        .tie-alignright {
            display: inline;
        }
        .tie-alignright {
            float: right;
        }
        .entry-content {
            padding: 0 30px 0;
        }
        .entry {
            line-height: 26px;
            font-size: 15px;
        }
        .share-buttons-bottom {
            background: #fafafa;
            border-top: 1px solid rgba(0,0,0,0.1);
            border-color: #0a0000 !important;

            margin: 0;
        }
        .share-buttons {
            padding: 18px 28px;
            line-height: 0;
        }
        .share-links {
            margin: 0px !important;
        }
	</style>
@endpush

{{-- bread_crumb --}}
{{-- @section('breadcrumb')
   	@parent
	<li>
		<i class="fas fa-angle-right brcr-icon-lr"></i><a href="{{ route('categories',['code'=>$product->category->code]) }}" class="link-black">{{$product->category->pretty_name}}</a>
	</li>
   	<li>
   		<i class="fas fa-angle-right brcr-icon-lr"></i>{{$product->pretty_name}}
   	</li>
@endsection --}}

{{-- content --}}
@section('content')
	{{-- <div class="container"> --}}
    <div class="product type-product post-1366 status-publish first instock product_cat-shoes product_cat-t-shirts-fashion product_cat-watches product_tag-clothes product_tag-fashion has-post-thumbnail sale downloadable shipping-taxable purchasable product-type-simple product-layout-default">
        <div class="product-summary-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- tt bài viết --}}
                    <div class="summary-before">
                        {{-- title post --}}
                        <div class="entry-header-outer">
                            <ol class="breadcrumb breadcrumb-detail p-0 bgc-white mb-1 mt-1">
                                <li>
                                    <i class="fas fa-home brcr-icon-lr"></i><a href="/" class="link-black">Home</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-right brcr-icon-lr"></i><a href="{{ route('categories',['code'=>$product->category->code]) }}" class="link-black">{{$product->category->pretty_name}}</a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">{{$product->pretty_name}}</a>
                                </li>
                            </ol>
                            <div class="entry-header">
                                <span class="post-cat-wrap">
                                    <p class="post-cat label-category">{{$product->category->pretty_name}}</p>
                                </span>
                                <h1 class="post-title entry-title">
                                    {!! $product->pretty_name !!}
                                </h1>
                                <div class="post-meta clearfix">
                                    <span class="date meta-item tie-icon">1 Tháng Ba, 2023<i class="fa-brands fa-facebook"></i></span>
                                    <div class="tie-alignright">
                                        <span class="meta-views meta-item ">
                                            <span class="tie-icon-fire" aria-hidden="true"></span> 121  <i class="fa-brands fa-facebook"></i>
                                        </span>
                                        <span class="meta-reading-time meta-item"><span class="tie-icon-bookmark" aria-hidden="true"></span> 14 phút đọc</span>
                                    </div>
                                </div>
                            </div>
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
                        {{-- nội dung bài viết --}}
                        <div class="entry-content entry clearfix">
                            {!! $product->description->description !!}
                        </div>
                        {{-- button share bài viết --}}
                        <div class="row m-4">
                            <div class="col-12">
                                <a href="https://www.facebook.com/sharer.php?u=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/" rel="external noopener nofollow" title="Facebook" target="_blank" class="" data-raw="https://www.facebook.com/sharer.php?u={post_link}">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text=B%E1%BA%A1n%20%C4%91%C3%A3%20s%E1%BB%91ng%20%C4%91%C6%B0%E1%BB%A3c%20bao%20l%C3%A2u%20r%E1%BB%93i%3F&amp;url=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/" rel="external noopener nofollow" title="Twitter" target="_blank" class="" data-raw="https://twitter.com/intent/tweet?text={post_title}&amp;url={post_link}">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                                <a href="fb-messenger://share?app_id=5303202981&amp;display=popup&amp;link=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/&amp;redirect_uri=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/" rel="external noopener nofollow" title="Messenger" target="_blank" class="" data-raw="fb-messenger://share?app_id=5303202981&amp;display=popup&amp;link={post_link}&amp;redirect_uri={post_link}">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                                <a href="https://www.facebook.com/dialog/send?app_id=5303202981&amp;display=popup&amp;link=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/&amp;redirect_uri=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/" rel="external noopener nofollow" title="Messenger" target="_blank" class="" data-raw="https://www.facebook.com/dialog/send?app_id=5303202981&amp;display=popup&amp;link={post_link}&amp;redirect_uri={post_link}">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                                <a href="mailto:?subject=B%E1%BA%A1n%20%C4%91%C3%A3%20s%E1%BB%91ng%20%C4%91%C6%B0%E1%BB%A3c%20bao%20l%C3%A2u%20r%E1%BB%93i%3F&amp;body=https://nhatduong.co/ban-da-song-duoc-bao-lau-roi/" rel="external noopener nofollow" title="Share via Email" target="_blank" class="" data-raw="mailto:?subject={post_title}&amp;body={post_link}">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                                <a href="#" rel="external noopener nofollow" title="Print" target="_blank" class="print-share-btn " data-raw="#">
                                    <i class="fa-brands fa-facebook brcr-icon-lr"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- baì viết liên quan --}}
                    <div class="relate-post">
                        {{-- header post --}}
                        <div class="entry-header-outer">
                            @include('homepage.includes.foreach-products',['data' => $related_products])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	{{-- </div> --}}
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

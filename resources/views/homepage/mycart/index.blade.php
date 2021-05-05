@extends('homepage.layouts.app')

@push('libs-styles')
    <link href="{{ asset('homepage/css/jquery.nice-number.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/pretty-checkbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
@endpush

@push('page-styles')
    <style type="text/css">
        
    </style>
@endpush

@section('content')
<div id="main" class="column1 wide clearfix no-breadcrumbs">
    <!-- main -->
    {{-- <div class="container-fluid"> --}}
        <div class="row main-content-wrap">
            <!-- main content -->
            <div class="main-content col-lg-12">
                <div id="content" role="main">
                    <article class="post-143 page type-page status-publish hentry">
                        <div class="page-content">
                            {{-- super banner --}}
                            @include('homepage.includes.bigbanner')
                            {{-- breadcrumb --}}
                            <section class="page-top page-header-6" style="">
                                <div class="container hide-title">
                                    <div class="row" style="border: 1px solid #E9E4E4;border-radius: 15px;">
                                      <div class="col-lg-12" style="">
                                            <nav aria-label="breadcrumb bgc-white">
                                                <ol class="breadcrumb p-0 bgc-white mb-1 mt-1">
                                                  <li><i class="fas fa-home brcr-icon-lr"></i><a href="#" class="link-black">Home</a></li>
                                                  <li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">My Cart</a></li>
                                                </ol>
                                            </nav>
                                      </div>
                                    </div>
                                </div>
                            </section>
                            {{-- main --}}
                            <div class="column1 boxed mt-4">
                                <div class="container">
                                    {{-- <hr class="hr-style"/> --}}
                                    <div class="row main-content-wrap">
                                        <div class="main-content col-lg-12">
                                            <div id="content" role="main">
                                                <div class="page-content">
                                                    <div class="vc_row wpb_row row">
                                                        <div class="col-lg-12">
                                                            <p class="p-title mb-3"><i class="fas fa-shopping-cart mr-1 p-icon-title"></i>Giỏ hàng của bạn</p>
                                                            <div class="mycart">
                                                                <div class="mycart-header">
                                                                    <div class="h6">Có <span class="font-weight-bold">{{ $cart_items ? $cart_items->count() : '0' }}</span> sản phẩm trong giỏ hàng</div>
                                                                </div>
                                                                <div class="mycart-body">
                                                                    @forelse($cart_items as $item)
                                                                        <div class="mycart-item">
                                                                            <div class="mycart-item-p product-image">
                                                                                <div class="text-center">
                                                                                    <a href="#">
                                                                                        <img width="auto" src="{{asset('homepage/images/rsz_plain_backpack_1b-120x155.jpg')}}" class="" alt="" srcset="" sizes=""/>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mycart-item-p product-qty">
                                                                                <div class="form-row mb-2 pl-2">
                                                                                    <p class="text-lowercase mb-0">{{ $item->product->pretty_name }} <i class="fas fa-arrow-down text-info ml-2"></i><span class="text-info">{{ $item->product->discount }}%</span></p>
                                                                                </div>
                                                                                <div class="form-row mb-0 pl-2">
                                                                                    <input type="number" value="{{ $item->quantity }}" style="width: 4ch;">
                                                                                    <span class="ml-2 font-weight-bold">x {{ modifierVnd($item->product->price) }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mycart-item-p product-pick">
                                                                                <div class="form-row text-center mb-0 h-50">
                                                                                    <div class="align-auto">
                                                                                        <div class="pretty p-icon p-round p-pulse mr-0">
                                                                                            <input type="checkbox"/>
                                                                                            <div class="state p-success">
                                                                                                <i class="icon mdi mdi-check"></i>
                                                                                                <label></label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row text-center mb-0 h-50">
                                                                                    <div class="align-auto">
                                                                                        <i class="far fa-trash-alt"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @empty

                                                                    @endforelse
                                                                </div>
                                                                @if($cart_items->count() > 0)
                                                                    <div class="mycart-footer">
                                                                        <div class="clearfix">
                                                                            <p class="h6 float-left">Tạm Tính</p>
                                                                            <p class="h6 float-right" id="provisional">204,000đ</p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p class="h6 float-left">Sinh Nhật</p>
                                                                            <p class="h6 float-right">giảm <span id="sale_d_o_b" data-birth="false">10</span>%</p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p class="h6 float-left">Chuyển khoản</p>
                                                                            <p class="h6 float-right">giảm <span id="sale_transfer" data-transfer="false">5</span>%</p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p class="h6 float-left">Phí Ship</p>
                                                                            <p class="h6 float-right"><span id="ship_cost">từ 15k-30k</span></p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p class="font-weight-bold h5 float-left">Thành Tiền</p>
                                                                            <p class="font-weight-bold h5 float-right">2.000.000đ</p>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <p class="text-success">* dự kiến giao hàng trong 1 - 2 ngày</p>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <button class="btn btn-primary btn-pay py-3">Thanh Toán</button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="row mb-5 ">
                                                        {{-- thông tin người nhận hàng --}}
                                                        <div class="vc_column_container col-md-6 mt-3">
                                                            <div class="wpb_wrapper vc_column-inner">
                                                                <div class="box-content" style="">
                                                                    <p class="p-title m-0"><i class="fas fa-user mr-1 p-icon-title"></i>Thông tin người nhận hàng</p>
                                                                    <p class="text-muted align-left mb-4">Các trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc .</p>
                                                                    {{-- tên --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-user"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="Họ và Tên *"/>
                                                                    </div>
                                                                    {{-- địa chỉ --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-map-marked-alt"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="Địa Chỉ *"/>
                                                                    </div>
                                                                    {{-- số điện thoại --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-phone-volume"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="Số Điện Thoại *"/>
                                                                    </div>
                                                                    {{-- facebook --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fab fa-facebook"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="Facebook"/>
                                                                    </div>
                                                                    <button class="btn btn-borders btn-md btn-primary float-right btn-update-info">Cập Nhật</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- lịch sử mua bán --}}
                                                        {{-- <div class="vc_column_container col-md-6 mt-3">
                                                            <div class="wpb_wrapper vc_column-inner">
                                                                <p class="p-title mb-3"><i class="fas fa-history mr-1 p-icon-title"></i>Lịch sử mua hàng của bạn</p>
                                                                <div class="porto-toggles wpb_content_element toggle-lg">
                                                                    <section class="toggle">
                                                                        <label><i class="far fa-clock icon-pending"></i>Đơn Đang Xử Lý</label>
                                                                        <div class="toggle-content" style="display: none;">
                                                                            <table class="table table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Firstname</th>
                                                                                        <th>Lastname</th>
                                                                                        <th>Email</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>John</td>
                                                                                        <td>Doe</td>
                                                                                        <td>john@example.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Mary</td>
                                                                                        <td>Moe</td>
                                                                                        <td>mary@example.com</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </section>
                                                                    <section class="toggle">
                                                                        <label><i class="far fa-check-circle icon-success"></i>Đơn Giao Thành Công</label>
                                                                        <div class="toggle-content" style="display: none;">
                                                                            <table class="table table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Firstname</th>
                                                                                        <th>Lastname</th>
                                                                                        <th>Email</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>John</td>
                                                                                        <td>Doe</td>
                                                                                        <td>john@example.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Mary</td>
                                                                                        <td>Moe</td>
                                                                                        <td>mary@example.com</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </section>
                                                                    <section class="toggle">
                                                                        <label><i class="far fa-times-circle icon-cancel"></i>Đơn Đã Hủy</label>
                                                                        <div class="toggle-content" style="display: none;">
                                                                            <table class="table table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Firstname</th>
                                                                                        <th>Lastname</th>
                                                                                        <th>Email</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>John</td>
                                                                                        <td>Doe</td>
                                                                                        <td>john@example.com</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Mary</td>
                                                                                        <td>Moe</td>
                                                                                        <td>mary@example.com</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </section>
                                                                 </div>
                                                           </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <!-- end main content -->
            <div class="sidebar-overlay"></div>
        </div>
    {{-- </div> --}}
</div>
@endsection

@push('libs-scripts')
    <script src="{{ asset('admini/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.nice-number.js') }}"></script>
@endpush

@push('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type="number"]').niceNumber({
                autoSize:true,
                autoSizeBuffer: 1,
                buttonDecrement:'<i class="fas fa-chevron-down"></i>',
                buttonIncrement:"<i class='fas fa-chevron-up'></i>",
                buttonPosition:'around',
                onDecrement:false,
            });

            $(".input-type-2").focusin(function(event) {
                $(this).parent().find('.fas').css({
                    // 'font-weight': '100',
                });
            }).focusout(function(event) {
                // $(this).parent().find('.fas').css('font-weight', 'bold');
            });
            
        });

    </script>
@endpush

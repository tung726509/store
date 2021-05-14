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
                                                                        <div class="mycart-item" id="mc_item_{{ $item->id }}">
                                                                            <div class="mycart-item-p product-image">
                                                                                <div class="text-center">
                                                                                    <a href="#">
                                                                                        <img width="auto" src="{{asset('homepage/images/rsz_plain_backpack_1b-120x155.jpg')}}" class="" alt="" srcset="" sizes=""/>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mycart-item-p product-qty">
                                                                                <div class="form-row mb-2 pl-2">
                                                                                    @php
                                                                                        $now = Carbon\Carbon::now();
                                                                                        $price = $item->product->price;
                                                                                        if($item->product->expired_discount > $now){
                                                                                            $price = $item->product->price * (( 100 - $item->product->discount) / 100);
                                                                                        }
                                                                                    @endphp
                                                                                    <p class="text-lowercase mb-0">{{ $item->product->pretty_name }}
                                                                                        @if( $item->product->expired_discount > $now )
                                                                                            <i class="fas fa-arrow-down ml-2" style="color:#f46666"></i><span style="color:#f46666">{{ $item->product->discount }}%</span>
                                                                                        @else

                                                                                        @endif
                                                                                    </p>
                                                                                </div>
                                                                                <div class="form-row mb-0 pl-2">
                                                                                    <input id="item_qty_{{ $item->id }}" class="item-qty" type="number" value="{{ $item->quantity }}" style="width: 4ch;" data-price="{{ $price }}" data-total="{{ $price*$item->quantity }}" data-picked="0" min="0" max="10000">
                                                                                    <span class="ml-2 font-weight-bold">x {{ modifierVnd($price) }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mycart-item-p product-pick">
                                                                                <div class="form-row text-center mb-0 h-50">
                                                                                    <div class="align-auto">
                                                                                        <div id="pretty-scale-test" style="font-size: 16px;">
                                                                                            <div class="pretty p-icon p-jelly p-round p-bigger mr-0">
                                                                                                <input class="item-check" type="checkbox" id="item_check_{{ $item->id }}" data-status="0" data-id="{{ $item->id }}"/>
                                                                                                <div class="state p-info">
                                                                                                    <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                                                                                    <label></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row text-center mb-0 h-50">
                                                                                    <div class="align-auto">
                                                                                        <i class="far fa-trash-alt item-trash" style="font-size: 18px" data-id="{{ $item->id }}"></i>
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
                                                                            <p class="h6 float-right" id="provisional">0</p>
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
                                                                            <p class="h6 float-right"><span id="ship_cost" data-shipfee="false">từ 15k - 25k</span></p>
                                                                        </div>
                                                                        <div class="clearfix">
                                                                            <p class="font-weight-bold h5 float-left">Thành Tiền</p>
                                                                            <p class="font-weight-bold h5 float-right" id="total_money">2000000</p>
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
                                                                        <input type="text" class="input-type-2" placeholder="tên ..." value="{{ $customer != null ? $customer->name : '' }}" />
                                                                    </div>
                                                                    {{-- địa chỉ --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-map-marked-alt"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="địa chỉ ..." value="{{ $customer != null ? $customer->address : '' }}"/>
                                                                    </div>
                                                                    {{-- số điện thoại --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-phone-volume"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="sđt ..." value="{{ $customer != null ? $customer->phone : '' }}"/>
                                                                    </div>
                                                                    {{-- facebook --}}
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend mr-1">
                                                                            <span class="input-group-text px-3 i-next-input-t2"><i class="fab fa-facebook"></i></span>
                                                                        </div>
                                                                        <input type="text" class="input-type-2" placeholder="facebook ..." value="{{ $customer != null ? $customer->facebook : '' }}"/>
                                                                    </div>
                                                                    <button class="btn btn-borders btn-md btn-primary float-right btn-update-info">Cập Nhật</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- lịch sử mua bán --}}
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
    <script src="{{ asset('homepage/js/jquery-ui.min.js') }}"></script>
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


            // tăng giảm số lượng thì tính giá luôn
            $(".minus-qty,.plus-qty").click(function(event) {
                $(".item-qty").trigger('change');
            });


            // số lượng của item thay đổi
            $(".item-qty").on('change keyup',function() {
                let _this = $(this),
                    qty = _this.val(),
                    price = _this.attr('data-price'),
                    total = parseInt(qty) * parseInt(price);

                _this.attr('value',qty);
                _this.attr('data-total',total);
                update_total_money();
            });

            // click chọn sản phẩm
            $(".item-check").click(function(event) {
                let _this = $(this),
                    id = _this.data('id');

                if( _this.is(':checked') ){
                    // _this.attr('data-status',1);
                    $(`#item_qty_${id}`).attr('data-picked',1);
                }else{
                    // _this.attr('data-status',0);
                    $(`#item_qty_${id}`).attr('data-picked',0);
                }

                update_total_money();
            });

            // click xóa sản phẩm
            $(".item-trash").click(function(event) {
                let _this = $(this),
                    id = _this.attr('data-id');

                if(id){
                    Swal.fire({
                        // title: 'Xóa sản phẩm ?',
                        text: "Xóa sản phẩm ?",
                        icon: '',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#757575',
                        confirmButtonText: 'Xóa'
                    }).then((result) => {
                        if (result.isConfirmed){
                            $.ajax({
                                url: '{{ route('ajax.trash_item_in_cart') }}',
                                type: 'post',
                                data: {id: id},
                            })
                            .done(function(res){
                                if(res.success){
                                    $(`#mc_item_${id}`).hide( 'slide',300);
                                    setTimeout(function(){
                                        $(`#mc_item_${id}`).remove();
                                        update_total_money();
                                    },500);
                                }else{
                                    Swal.fire(
                                        'Lỗi hệ thống !',
                                        'Vui lòng thử lại sau.',
                                        'error'
                                    )
                                }
                            })
                        }
                    })
                }
            });

            // function up date giá tiền 
            function update_total_money(){
                let provisional = 0,
                    total_money = 0;

                $(".item-qty").each(function(index, el) {
                    let picked = parseInt( $(el).attr('data-picked') ),
                        total_of_item = 0;
                    if(picked == 1){
                        total_of_item = parseInt( $(el).attr('data-total') );
                    }else if(picked == 0){

                    }

                    provisional += total_of_item;
                });

                $('#provisional').html(provisional);
                total_money

                // let use_free_ship_val = 0;
                @if( $use_free_ship != null && is_array($use_free_ship) )
                    // use_free_ship = parseInt('{{ $use_free_ship['value'] }}');
                    if(provisional >= {{ $use_free_ship['value'] }}){
                        $("#ship_cost").attr('data-shipfee',true);
                        $("#ship_cost").html('miễn phí');
                    }else{
                        $("#ship_cost").attr('data-shipfee',false);
                        $("#ship_cost").html('từ 15k - 30k');
                    }
                @endif

                // test
                if(product_qty){
                    $("product_id").val();
                }else{
                    $("#ship_cost").attr('');
                }
                // end test
                console.log(provisional);
            }

        });
    </script>
@endpush

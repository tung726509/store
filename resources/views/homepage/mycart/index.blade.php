{{-- master layout --}}
@extends('homepage.layouts.app')

{{-- css library --}}
@push('libs-styles')
    <link href="{{ asset('homepage/css/store.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/jquery.nice-number.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/css/pretty-checkbox.min.css') }}" rel="stylesheet">
    <link href="{{asset('admini/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
@endpush

{{-- css page --}}
@push('page-styles')
    <style type="text/css">
        .color-pink{
            color: #f46666;
        }
        .not-empty{
            border :  1px solid #2ec928 !important;
        }
    </style>
@endpush

{{-- bread_crumb --}}
@section('breadcrumb')
   @parent
   <li>
      <i class="fas fa-angle-right brcr-icon-lr"></i><a href="{{ route('mycart') }}" class="link-black">Giỏ hàng</a>
   </li>
@endsection

{{-- content --}}
@section('content')
        {{-- ưu đãi khách hàng --}}
        @include('homepage.includes.incentive')

        {{-- giỏ hàng --}}
        <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
            <div class="container">
                <div class="vc_row wpb_row row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 p-0">
                        <p class="p-title mb-3"><i class="fas fa-shopping-cart mr-1 p-icon-title"></i>Giỏ hàng của bạn</p>
                        <div class="mycart">
                            <div class="mycart-header">
                                <div class="h6">Có <span class="font-weight-bold cart-items-count">{{ $cart_items->count() > 0  ? $cart_items->count() : '0' }}</span> sản phẩm trong giỏ hàng</div>
                            </div>
                            @if($cart_items->count() > 0)
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
                                                        $price = $item->product->price;
                                                        if($item->product->expired_discount > $now){
                                                            $price = $item->product->price * (( 100 - $item->product->discount) / 100);
                                                        }
                                                    @endphp
                                                    <p class="text-lowercase mb-0">{{ $item->product->pretty_name }}
                                                        @if( $item->product->expired_discount > $now )
                                                            <i class="fas fa-arrow-down color-pink ml-2"></i><span class="color-pink">{{ $item->product->discount }}%</span>
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
                            @endif
                            @if($cart_items)
                                @if($cart_items->count() > 0)
                                    <div class="mycart-footer">
                                        <div class="clearfix">
                                            <p class="h6 float-left">Tạm Tính</p>
                                            <p class="h6 float-right" id="provisional">đ0</p>
                                        </div>
                                        <div class="clearfix {{ $birth_discount ? '' : 'd-none' }}">
                                            <p class="h6 float-left">Sinh Nhật</p>
                                            <p class="h6 float-right color-pink">
                                                <i class="fas fa-arrow-down ml-2"></i><span id="sale_d_o_b" data-status="{{ $birth_discount ? 'true' : 'false' }}">{{ $use_birth_discount['value'] }}</span>%
                                            </p>
                                        </div>
                                        @if(is_array($use_transfer_discount) )
                                            <div class="clearfix">
                                                {{-- <p class="h6 float-left">Chuyển khoản</p> --}}
                                                <select class="float-left" name="payments_type" id="payments_type" style="padding:0px;margin-bottom: .5rem;font-size: 1rem;width: 150px">
                                                    <option value="ck">Chuyển khoản</option>
                                                    <option value="tm" selected>Tiền mặt</option>
                                                </select>
                                                <p class="h6 float-right color-pink"><i class="fas fa-arrow-down ml-2"></i> <span id="sale_transfer" data-transfer="tm">0</span>%</p> 
                                            </div>
                                        @endif
                                        <div class="clearfix">
                                            <p class="h6 float-left">Phí Ship</p>
                                            <p class="h6 float-right">
                                                <span id="ship_cost" data-status="false">đ0{{-- từ 15k - 20k --}}</span>
                                            </p>
                                        </div>
                                        <div class="clearfix">
                                            <p class="font-weight-bold h5 float-left">Thành Tiền</p>
                                            <p class="font-weight-bold h5 float-right" id="total_money">đ0</p>
                                        </div>
                                        <div class="form-row">
                                            <p class="text-success mb-0">* shop sẽ gọi điện xác nhận đơn hàng</p>
                                            <p class="text-success mb-0">* dự kiến giao hàng trong 1 - 2 ngày</p>
                                        </div>
                                        <div class="form-row">
                                            <button class="btn btn-primary btn-border-radius btn-order py-3">Đặt Hàng</button>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr/>

        {{-- thông tin người nhận hàng --}}
        <section class="vc_section porto-section porto-inner-container pb-4 pt-0">
            <div class="container">
                <div class="row mb-5 ">
                    <div class="vc_column_container col-md-6 mt-3">
                        <div class="wpb_wrapper vc_column-inner">
                            <div class="box-content" style="">
                                <p class="p-title m-0"><i class="fas fa-user mr-1 p-icon-title"></i>Thông tin người nhận hàng</p>
                                <p class="text-muted align-left mb-4">Các trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc .</p>
                                {{-- số điện thoại --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-phone-volume"></i></span>
                                    </div>
                                    <input type="text" id="customer_phone" class="input-type-2 customer-info" placeholder="sđt ... *" value="{{ $customer != null ? $customer->phone : '' }}" required/>
                                    <p class="w-100 text-danger mb-0 customer-error" id="customer_phone_error" style="margin-left: 50px;"></p>
                                </div>
                                {{-- tên --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" id="customer_name" class="input-type-2 customer-info" placeholder="tên ... *" value="{{ $customer != null ? $customer->name : '' }}" required/>
                                    <p class="w-100 text-danger mb-0" id="customer_name_error" style="margin-left: 50px;"></p>
                                </div>
                                {{-- địa chỉ --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text px-3 i-next-input-t2"><i class="fas fa-map-marked-alt"></i></span>
                                    </div>
                                    <input type="text" id="customer_address" class="input-type-2 customer-info" placeholder="địa chỉ ... *" value="{{ $customer != null ? $customer->address : '' }}" required/>
                                    <p class="w-100 text-danger mb-0" id="customer_address_error" style="margin-left: 50px;"></p>
                                </div>
                                {{-- sinh nhật --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text px-3 i-next-input-t2"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" id="customer_date" class="input-type-2 customer-info" placeholder="mm/dd/yyyy" value="{{ $customer != null ? ($customer->d_o_b ? $customer->d_o_b->format('m/d/Y') : '') : '' }}" data-date-end-date="0d" {{ $customer->d_o_b ? 'disabled' : ''}} required/>
                                    <p class="w-100 text-danger mb-0" id="customer_date_error" style="margin-left: 50px;"></p>
                                </div>
                                {{-- facebook --}}
                                {{-- <div class="input-group mb-2">
                                    <div class="input-group-prepend mr-1">
                                        <span class="input-group-text px-3 i-next-input-t2"><i class="fab fa-facebook"></i></span>
                                    </div>
                                    <input type="text" class="input-type-2 customer-info" placeholder="facebook ..." value="{{ $customer != null ? $customer->facebook : '' }}"/>
                                    <p class="w-100 text-danger mb-0" id="customer_phone_error" style="margin-left: 50px;"></p>
                                </div> --}}
                                <button class="btn btn-borders btn-md btn-primary float-right btn-update-info">Cập Nhật</button>
                            </div>
                        </div>
                    </div>
                    {{-- lịch sử mua bán --}}
                </div>
            </div>
        </section>
@endsection

{{-- js library --}}
@push('libs-scripts')
    {{-- <script src="{{ asset('admini/js/jquery-3.5.0.min.js') }}"></script> --}}
    <script src="{{ asset('homepage/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('admini/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery.nice-number.js') }}"></script>
@endpush

{{-- js page --}}
@push('page-scripts')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            // pretty date
            $( "#customer_date" ).datepicker({
                disableTouchKeyboard:true,
                todayHighlight: true,
            });

            // css ban đầu
            @if($cart_items == null)
                $('.mycart-body').css('border-bottom', '0px');
                $('.mycart-header').css('border-bottom', '0px');
            @endif
            $(".customer-info").each(function(index, el){
                let val = $(el).val();
                if(val){
                    $(el).addClass('not-empty')
                }else{
                    $(el).removeClass('not-empty');
                }
            });
            // end css ban đầu

            // đăng kí niceNumber
            $('input[type="number"]').niceNumber({
                autoSize:true,
                autoSizeBuffer: 1,
                buttonDecrement:'<i class="fas fa-chevron-down"></i>',
                buttonIncrement:"<i class='fas fa-chevron-up'></i>",
                buttonPosition:'around',
                onDecrement:false,
            });

            $(".customer-info").focusout(function(event){
                let val = $(this).val();
                if(val){
                    $(this).addClass('not-empty')
                }else{
                    $(this).removeClass('not-empty');
                }
            });

            // cập nhật tt khách
            $(".btn-update-info").click(function(event) {
                let name = $("#customer_name").val(),
                    phone = $("#customer_phone").val(),
                    address = $("#customer_address").val(),
                    date = $("#customer_date").val();

                if(name && phone && address && date){
                    $.ajax({
                        url: '{{ route('ajax.update_customer_info') }}',
                        type: 'POST',
                        data: {
                            name: name,
                            phone: phone,
                            address: address,
                            date: date
                        },
                    })
                    .done(function(res) {
                        if(res.success){
                            $("#sale_d_o_b").attr('data-status', res.birth_discount);
                            $(".customer-info").next().text('');    
                            if(res.birth_discount)
                                $("#sale_d_o_b").parent().parent().removeClass('d-none');
                            else
                                $("#sale_d_o_b").parent().parent().addClass('d-none');

                            update_total_money();

                            Swal.fire(
                                'Thành Công',
                                'Thông tin của bạn đã được cập nhật.',
                                'success'
                            )
                        }else if(res.success == false){
                            $.each(res.errors, function(index, val){
                                $(`#customer_${index}_error`).text(val[0]);
                            });
                        }else{
                            Swal.fire(
                                'Thông Báo',
                                'Lỗi hệ thống , vui lòng thử lại',
                                'error'
                            )
                        }
                    })
                }else{
                    Swal.fire(
                        'Lưu ý',
                        'Vui lòng điền đầy đủ các trường.',
                        'error'
                    )
                }
            });

            // tăng giảm số lượng thì tính giá luôn
            $(".minus-qty,.plus-qty").click(function(event){
                $(".item-qty").trigger('change');
            });

            // số lượng của item thay đổi
            $(".item-qty").on('change keyup',function(){
                let _this = $(this),
                    qty = _this.val(),
                    price = _this.attr('data-price'),
                    total = parseInt(qty) * parseInt(price);

                _this.attr('value',qty);
                _this.attr('data-total',total);
                update_total_money();
            });

            // click chọn sản phẩm
            $(".item-check").click(function(event){
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
            $(".item-trash").click(function(event){
                let _this = $(this),
                    id = _this.attr('data-id');

                if(id){
                    Swal.fire({
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
                                        if( $('.mycart-item').length == 0 ){
                                            $('.mycart-body').css('border-bottom', '0px');
                                            $('.mycart-header').css('border-bottom', '0px');
                                            $('.mycart-footer').remove();
                                        }
                                    },310);
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

            // thay đổi hình thức chuyển tiền
            $("#payments_type").change(function(event) {
                let _this = $(this),
                    payments_type = _this.val(),
                    payments_val = 0;

                $("#sale_transfer").attr('data-transfer',payments_type);
                switch(payments_type) {
                    @if(is_array($use_transfer_discount) )
                    case 'ck':
                        payments_val = {{ $use_transfer_discount['value'] }};
                        break;
                    @endif
                    default:
                        payments_val = 0;
                }
                $("#sale_transfer").text(payments_val);
                update_total_money();
            });

            $(".btn-order").click(function(event){
                
            });

            // function up date giá tiền 
            function update_total_money(){
                let provisional = 0,
                    birth_discount = 0,
                    transfer_discount = 0,
                    total_money = 0;
                
                // update số loại sản phẩm trong giỏ
                update_cart_items_count();

                // tính giá tam tính
                $(".item-qty").each(function(index, el){
                    let picked = parseInt( $(el).attr('data-picked') ),
                        total_of_item = 0;

                    if(picked == 1){
                        let total = $(el).attr('data-total');
                        if(total == 'NaN' ){
                            total_of_item = 0; 
                        }else{
                            total_of_item = parseInt( total );
                        }
                    }

                    provisional += total_of_item;
                });

                // giảm sinh nhật
                    @if(is_array($use_birth_discount) )
                        let birth_discount_status = $("#sale_d_o_b").attr('data-status');
                        if(birth_discount_status == "true"){
                            birth_discount = provisional * ( parseInt({{ $use_birth_discount['value'] }}) / 100 );
                        }else if(birth_discount_status == "false"){
                            birth_discount = 0;
                        }
                    @endif

                // giảm chuyển khoản
                    @if(is_array($use_transfer_discount) )
                        transfer_discount = provisional * ( parseInt({{ $use_transfer_discount['value'] }}) / 100 );
                    @endif

                    let payments_type = $("#payments_type").val();
                    
                    switch(payments_type) {
                        @if(is_array($use_transfer_discount) )
                        case 'ck':
                            payments_val = {{ $use_transfer_discount['value'] }};
                            break;
                        @endif
                        default:
                            payments_val = 0;
                    }

                    transfer_discount = provisional * ( parseInt(payments_val) / 100 );

                // phí ship
                    let text_ship = ' + ship';
                    @if( is_array($use_free_ship) )
                        if(provisional >= {{ $use_free_ship['value'] }}){
                            $("#ship_cost").attr('data-status',true);
                            $("#ship_cost").html('miễn phí');
                            text_ship = '';
                        }else{
                            $("#ship_cost").attr('data-status',false);
                            if(provisional == 0){
                                $("#ship_cost").html('đ0');
                                text_ship = '';
                            }
                            else{
                                $("#ship_cost").html('từ 15k - 20k');
                            }
                        }
                    @endif

                // hiển thị
                total_money = provisional - birth_discount - transfer_discount;
                console.log(birth_discount,transfer_discount,birth_discount_status);

                $('#provisional').html( modifierVnd(provisional) );
                $('#total_money').html( modifierVnd(total_money)+text_ship );
            }

            // convert to currency_vietnamese
            function modifierVnd(number){
                var x = number;
                x = x.toLocaleString('en-US', {style : 'currency', currency : 'VND'});

                return x;
            }

            // update số loại sản phẩm trong giỏ
            function update_cart_items_count() {
                $(".cart-items-count").text($(".mycart-item").length);
            }
        });

    </script>
@endpush



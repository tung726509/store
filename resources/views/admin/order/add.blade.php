@extends('admin.layouts.app')

@push('libs-styles')
  <link href="{{asset('admini/css/select2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admini/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
@endpush

@push('page-styles')
<style type="text/css">
  .money-form{
    border-style: dotted;
    border-width: thick;
  }
  .order-icon{
    top: 15%;
    right: 10px;
    background-color: white;
    border-radius: 50%;
    z-index: 1000;
    position: fixed;
  }
  .block{
    display: inline-block;
  }
  .hoverine:hover{
    text-decoration: underline;
  }
  .text-validate{
    font-size: .75rem;
    color : #f1556c;
  }
}
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Đơn Hàng</a></li>
      <li class="breadcrumb-item active">Thêm Mới</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-md-12 col-sm-12 col-12 p-0">
 		@include('admin.includes.form-alert')
    @if($products->isEmpty())
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body">
        <div>Danh sách sản phẩm trống . Vui lòng <span class="btn btn-primary btn-sm"><a href="{{route('administrator.product.add')}}">Thêm mới</a></span> sản phẩm.</div>
      </div>
    </div>
    @else
  	<div class="card pl-1 pr-1 pt-3 pb-3 animate__animated animate__rollIn animate__faster">
      {{-- <div class="card-body"> --}}
    		<h4 class="header-title"><i class="fas fa-print" aria-hidden="true"></i> THÊM MỚI ĐƠN HÀNG</h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
        <form method="post" action="{{ url()->current()}}" id="addForm">
      	 @csrf
          {{-- nhập thông tin đơn hàng --}}
  		   	<div class="form-row">
            {{-- phone --}}
  	      	<div class="form-group col-6 col-sm-6 col-md-6">
  	         	<label for="phone" class="col-form-label">Số đt <span class="text-danger">*</span></label>
  	         	<input type="text" class="form-control @error('phone') is-invalid @enderror {{old('phone') != null ? 'parsley-success':''}}" id="phone" name="phone" placeholder="Nhập sđt" value="{{old('phone')}}" required>
  	         	@error('phone')
  					    <p class="text-validate mb-1" id="t_valid_phone">{{ $message }}</p>
            	@enderror
  	      	</div>

            {{-- ten kh --}}
            <div class="form-group col-6 col-sm-6 col-md-6">
              <label for="name" class="col-form-label">Tên <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror {{old('name') != null ? 'parsley-success':''}}" id="name" name="name" placeholder="Nhập tên" value="{{old('name')}}" required>
              @error('name')
                <p class="text-validate mb-1" id="t_valid_name">{{ $message }}</p>
              @enderror
            </div>

            {{-- sinh nhật --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="d_o_b" class="col-form-label">Ngày sinh <span class="small text-info">(tháng/ngày/năm)</span></label>
              <div class="input-group">
                <input type="text" class="form-control @error('d_o_b') is-invalid @enderror {{old('d_o_b') != null ? 'parsley-success':''}}" placeholder="mm/dd/yyyy" id="d_o_b" name="d_o_b" value="{{old('d_o_b')}}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
              @error('d_o_b')
                <p class="text-validate mb-1" id="t_valid_d_o_b">{{ $message }}</p>
              @enderror
            </div>

            {{-- địa chỉ --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="address" class="col-form-label">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control @error('address') is-invalid @enderror {{old('address') != null ? 'parsley-success':''}}" id="address" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}" required data-address="">
                <div class="input-group-append">
                  <button class="btn btn-dark waves-effect waves-light btn-address-default" type="button">Mặc định</button>
                </div>
              </div>
              @error('address')
                <p class="text-validate mb-1" id="t_valid_address">{{ $message }}</p>
              @enderror
            </div>

            {{-- ngày xuất đơn --}}
  	      	<div class="form-group col-12 col-sm-6 col-md-6">
  	         	<label for="date" class="col-form-label">Ngày xuất đơn <span class="text-danger">*</span> <span class="small text-info">(tháng/ngày/năm)</span></label>
  	         	<div class="input-group">
                <input type="text" class="form-control @error('date') is-invalid @enderror parsley-success {{old('date(format)') != null ? 'parsley-success':''}}" placeholder="mm/dd/yyyy" id="datepicker_export" name="date" value="{{ old('date',date('m/d/Y',strtotime($now))) }}" required>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
              @error('date')
                <p class="text-validate mb-1" id="t_valid_date">{{ $message }}</p>
              @enderror
  	      	</div>

            {{-- phí ship --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Phí ship <span class="small text-info">( không nhập mặc định sẽ là FREE SHIP )</span></label>
              <div class="input-group">
                <input type="number" class="form-control @error('cost') is-invalid @enderror {{old('cost') != null ? 'parsley-success':''}}" placeholder="" id="cost" name="cost" value="{{old('cost')}}">
              </div>
              @error('cost')
                <p class="text-validate mb-1" id="t_valid_cost">{{ $message }}</p>
              @enderror
            </div>

            {{-- kho hàng --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Kho hàng <span class="text-danger">*</span></label>
              <select class="form-control select-warehouse" name="warehouse_id" required>
                <option value="">-- Chọn --</option>
                @forelse($warehouses as $item)
                <option value="{{ $item->id }}" {{$warehouse_main->id == $item->id ? 'selected':''}}>
                  <span class="text-uppercase">{{ $item->name }}
                </option>
                @empty
                @endforelse
              </select>
            </div>

            {{-- note --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="note" class="col-form-label">Note </label>
              <textarea class="form-control @error('note') is-invalid @enderror {{old('name') != null ? 'parsley-success':''}}" rows="1" id="note" name="note">{{old('note')}}</textarea>
              @error('note')
                <p class="text-validate mb-1" id="t_valid_note">{{$message}}</p>
              @enderror
            </div>

            {{-- phần sản phẩm trong đơn hàng --}}
            <div class="form-group col-12">
              <p class="mb-1 mt-4 font-weight-bold text-uppercase">Thêm sản phẩm vào đơn hàng</p>
              {{-- column title --}}
              <div class="form-row colunm-title-product d-none">
                <div class="form-group col-5">
                  <p class="mb-0">Sản phẩm</p>
                </div>
                <div class="form-group col-3">
                  <p class="mb-0">SL</p>
                </div>
                <div class="form-group col-2">
                  <p class="mb-0"><i class="fas fa-arrow-down"></i> %</p>
                </div>
                <div class="form-group col-1">
                </div>
              </div>
              {{-- danh sách sản phẩm và số lượng --}}
              <div id="products_wrapper">
                
              </div>
              {{-- thêm mới trường sản phẩm --}}
              <div class="form-row">
                <div class="form-group col-12">
                  <button type="button" class="btn btn-info waves-light waves-effect mt-35 add-product-field pl-3 pr-3"><i class="fas fa-plus"></i></button>
                </div>
              </div>
            </div>
  		   	</div>

          {{-- thành tiền --}}
          <div class="form-row pl-2 pr-2 create-order d-none">
            <div class="form-group col-12 col-md-12 col-sm-12">
              @if($use_birth_discount['key'] == 1)
              <div class="form-row">
                <div class="checkbox checkbox-success checkbox-circle">
                  <input class="checkbox-birthday" id="checkbox110" type="checkbox" disabled="" checked="">
                  <label for="checkbox110">Giảm giá {{$use_birth_discount['value']}}% trong tháng sinh nhật khách .</label>
                </div>
              </div>
              @endif
              @if($use_free_ship['key'] == 1)
              <div class="form-row">
                <div class="checkbox checkbox-success checkbox-circle">
                  <input class="checkbox-freeship" id="checkbox-10" type="checkbox" disabled="" checked="" data-status="on" name="checkbox_freeship">
                  <label for="checkbox-10">Đang bật FREESHIP cho đơn hàng trên {{ $use_free_ship['value']/1000 }}k</label>
                </div>
              </div>
              @endif
            </div>
            <div class="form-group col-12 col-md-9 col-sm-12 money-form">
              <p class="h5 text-center">Tạm Tính : <span id="provisional"></span>k</p>
              <p class="h5 text-center d-none">Sinh Nhật : giảm <span id="sale_d_o_b" data-birth="false"></span>%</p>
              <p class="h5 text-center">Phí Ship : <span id="ship_cost"></span></p>
              <p class="h3 text-center text-info">Tổng Tiền : <span id="order_total"></span>k VNĐ</p>
            </div>
            <div class="form-group col-12 col-md-3 col-sm-12 text-right mb-0 text-center pt-3">
                <button type="submit" class="btn btn-primary create-order d-none text-center p-3">Tạo đơn hàng</button>
            </div>
          </div>
        </form>
      {{-- </div> --}}
    </div>
    @endif
 	</div>
</div>
@endsection

@push('libs-scripts')
  <script src="{{asset('admini/js/select2.min.js') }}"></script>
  <script src="{{asset('admini/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('admini/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('admini/js/form-advanced.init.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
	jQuery(document).ready(function($){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('#addForm').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });

    $( "#d_o_b" ).datepicker();
    $( "#datepicker_export" ).datepicker();
    $('.select-warehouse').select2();

    // check phone exist
    var checkPhoneAjax = (phone) => {
      if(phone){
        $.ajax({
          url: '{{route('administrator.order.check_phone_ajax')}}',
          type: 'post',
          data: {phone:phone},
        })
        .done(function(res){
          if(res.success){
            if(res.message == 'exist'){
              $("input[name=name]").val(res.info['name']).addClass('parsley-success').attr('readonly',true);
              $("input[name=address]").val(res.info['address']).data('address',res.info['address']).addClass('parsley-success').attr('readonly', false);
              $("input[name=d_o_b]").val(res.info['d_o_b']).addClass('parsley-success').attr('disabled', true);
              $("input[name=phone]").addClass('parsley-success');
              let now = new Date();
              let month = now.getMonth();
              if(res.info['d_o_b'] != null && res.info['d_o_b'] != ""){
                if(res.info['m_o_b'] == month+1){
                  $("#sale_d_o_b").data("birth",true);
                }else{
                  $("#sale_d_o_b").data("birth",false);
                }
              }else{
                $("#sale_d_o_b").data("birth",false);
              }
            }else if(res.message == 'null'){
              $("input[name=name]").val('').removeClass('parsley-success').attr('readonly', false);
              $("input[name=address]").val('').data('address','').removeClass('parsley-success').attr('readonly', false);
              $("input[name=d_o_b]").val('').removeClass('parsley-success').attr('disabled', false);
              $("input[name=phone]").addClass('parsley-success');
              $("#sale_d_o_b").data("birth",false);
              $("#sale_d_o_b").parent().addClass('d-none');
            }
            update_money_form();
          }
        })
      }
    }

    // update money form
    var update_money_form = () => {
      // update tạm tính
      let sum = 0;
      $('.quantity').each(function(){
        sum += parseInt($(this).data('total'));
      });
      $("#provisional").data('value',sum).text(sum/1000);

      // update phí ship
      let cost = parseInt($("#cost").val());
      let ship_cost = 'Free ship';
      if(cost){
        ship_cost = (cost/1000)+"k";
      }else{
        cost = 0;
      }
      
      // freeship cho đơn hàng trên xxxk
      @if($use_free_ship['key'] == 1)
        let order_max = parseInt({{ $use_free_ship['value'] }});
        let check_freeship_status = $(".checkbox-freeship").data('status');
        if(check_freeship_status == "on"){
            if(sum >= order_max){
            ship_cost = 'Free ship';
            cost = 0;
          }
        }else if(check_freeship_status == "off"){

        }
      @endif
      $("#ship_cost").data('value',cost).text(ship_cost);

      // update sinh nhật
      let status = $("#sale_d_o_b").data('birth');
      let birth_discount = 0;
      if(status == true){//là sinh nhật
        @if($use_birth_discount['key'] == 1)// bật giảm giá sinh nhật
          birth_discount = parseInt({{ $use_birth_discount['value'] }});
          $("#sale_d_o_b").parent().removeClass('d-none');
          $("#sale_d_o_b").data('birth-discount',{{$use_birth_discount['value']}}).text({{ $use_birth_discount['value'] }});
        @elseif($use_birth_discount['key'] == 0)//tắt giảm giá sinh nhật
          $("#sale_d_o_b").parent().addClass('d-none');
          $("#sale_d_o_b").data('birth-discount',0).text({{ $use_birth_discount['value'] }});
        @endif
      }else if(status == false){//ko là sinh nhật
        $("#sale_d_o_b").parent().addClass('d-none');
        $("#sale_d_o_b").data('birth-discount',0).text({{ $use_birth_discount['value'] }});
      }

      // total money
      let order_total = sum;
      if(status == true){
        order_total = order_total*((100-birth_discount)/100);
      }

      if(ship_cost != 'Free ship'){
        order_total = order_total + cost;
      }
      $("#order_total").data('value',order_total).text(order_total/1000);
    }

    // load danh sách sản phẩm theo id kho
    var productListAjax = (warehouse_id) => {
      if(warehouse_id){
        $.ajax({
          url: '{{route('administrator.order.product_list_ajax')}}',
          type: 'post',
          data: {warehouse_id: warehouse_id},
        })
        .done(function(res) {
            if(res.success){
                if(res.message == 'have not products'){
                    Swal.fire({
                        icon: 'info',
                        title: 'Oops...',
                        text: 'Chưa có sản phẩm trong kho này !',
                    })
                }else if(res.message == 'have products'){
                    $(".colunm-title-product").removeClass('d-none');
                    let now = new Date();
                    let option_html = '';
                    $.each(res.wh_items, function(index,item){
                      let expired_discount = toTimeStamp(item.product.expired_discount);
                      let discount = item.product.discount;
                      if(now.getTime() > expired_discount){
                        discount = 0;
                      }
                      option_html += `
                        <option value="${item.product_id}" data-discount="${discount}" data-price="${item.product.price}" data-inventory="${item.quantity}">
                            <span class="text-uppercase">${item.product.pretty_name} - Tồn kho : ${item.quantity}
                        </option>
                      `
                    });

                    $('#products_wrapper').append(`<div class="form-row">
                      <div class="form-group col-5">
                        <select class="form-control select-product" name="product_id[]" required>
                          <option value="">-- Chọn --</option>
                          ${option_html}
                        </select>
                      </div>
                      <div class="form-group col-3">
                        <input type="number" class="form-control p-1 quantity" name="quantity[]" required placeholder="Nhập số" min="1" value="0" data-total="0" readonly>
                      </div>
                      <div class="form-group col-2">
                        <input type="number" class="form-control p-1 discount" name="discount[]" required placeholder="" min="1" max="100" value="0" readonly>
                        <input type="hidden" class="form-control p-1 price" name="price[]" required value="0">
                      </div>
                      <div class="form-group col-1">
                        <button type="button" class="btn btn-danger waves-light waves-effect remove-product-field"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>`);

                    $('.select-product').select2();

                    $(".create-order").removeClass('d-none');
                }
            }
        })
      }
    }

    // bật tắt freeship cho đơn hàng trên xxxk
    @if($use_free_ship['key'] == 1)
      $(".checkbox-freeship").click(function(event){
        let _this = $(this);
        let status = _this.data('status')
        if(status == "on"){
          _this.data('status','off');
          _this.attr('checked',false);
          console.log('off');
        }else if(status == "off"){
          _this.data('status','on');
          _this.attr('checked',true);
          console.log('on');
        }
        update_money_form();
      });
    @endif

    // focus out ô nhập số đt
    $("#phone").focusout(function(){
      let val = $(this).val();
      if(val != null && val != ""){
        checkPhoneAjax(val);
        $(this).addClass('parsley-success');
      }else{
        $("input[name=name]").val('').removeClass('parsley-success').attr('readonly', false);
        $("input[name=address]").val('').data('address','').removeClass('parsley-success').attr('readonly', false);
        $("input[name=d_o_b]").val('').removeClass('parsley-success').attr('disabled', false);
        $("input[name=phone]").addClass('parsley-success');
        $("#sale_d_o_b").data("birth",false);
        $("#sale_d_o_b").parent().addClass('d-none');
        update_money_form();
      }
    });

    // focusout ô chọn ngày tháng năm sinh
    $("input[name=d_o_b]").change(function(){
      let now = new Date();
      let month = now.getMonth();
      let date = $(this).val();
      month_of_pick = parseInt(date.substr(0,2));
      if(month_of_pick){
        if(month_of_pick == month+1){
          $("#sale_d_o_b").data("birth",true);
        }else{
          $("#sale_d_o_b").data("birth",false);
        }
      }else{
        $("#sale_d_o_b").data("birth",false);
      }
      update_money_form();
    });

    // sử dụng button địa chỉ mặc định
    $(".btn-address-default").click(function(event) {
      let address_default = $("input[name=address]").data('address');
      $("input[name=address]").val(address_default);
      if(address_default){
        $("input[name=address]").addClass('parsley-success');
      }else{
        $("input[name=address]").removeClass('parsley-success');
      }
    });

    // keyup phí ship
    $("#cost").keyup(function(event){
      update_money_form();
    });

    // focusout form-control
    $(".form-control").focusout(function(event){
      let input_id = $(this).attr('id');
      let val = $(this).val();
      if(val != null && val != ""){
        $(`#${input_id}`).addClass('parsley-success').removeClass('is-invalid');
      }else{
        $(`#${input_id}`).removeClass('parsley-success').removeClass('is-invalid');
      }
      $(`#t_valid_${input_id}`).remove();
      // riêng cho ô cost
      if(input_id == "cost"){
        update_money_form();
      }
    });

    //select kho hàng
    $(".select-warehouse").change(function(event) {
      $('#products_wrapper').html('');
      let warehouse_id = $(this).val();
      if(warehouse_id != null && warehouse_id != ""){
        $(".select-warehouse").addClass('parsley-success');
      }else{
        $(".select-warehouse").removeClass('parsley-success');
      }
      $(".colunm-title-product").addClass('d-none');
      $(".create-order").addClass('d-none');
      $('.select-warehouse').select2();
    });

    // thêm 1 trường sản phẩm
    $('.add-product-field').click(function(event){
      let warehouse_id = $(".select-warehouse").val();
      if(warehouse_id == null || warehouse_id == "" || warehouse_id == undefined){
        Swal.fire({
          icon: 'info',
          title: 'Oops...',
          text: 'Bạn chưa chọn kho hàng !',
        })
      }else{
        productListAjax(warehouse_id);
        update_money_form();
      }
    });

    // set các thuộc tính sau khi chọn sản phẩm
    $("#products_wrapper").on('change','.select-product',function(event){
      let product_id = $(this).val();
      let discount = $('option:selected', this).data('discount');
      let quantity = $('option:selected', this).data('quantity');
      let inventory = $('option:selected', this).data('inventory'); 
      let price = $('option:selected', this).data('price');
      $(this).parent().next().next().find(".discount").val(discount);
      $(this).parent().next().find(".quantity").attr("max",inventory);
      $(this).parent().next().find(".quantity").data("discount",discount);
      $(this).parent().next().find(".quantity").data("price",price);
      $(this).parent().next().next().find(".price").val(price);
      $(this).parent().next().find(".quantity").data('total',0);

      if(product_id != null && product_id != ""){
        $(this).parent().next().next().find(".discount").val(discount);
        $(this).parent().next().find(".quantity").val('');  
        $(this).parent().next().find(".quantity").attr('readonly', false);
      }else{
        $(this).parent().next().next().find(".discount").val(0);
        $(this).parent().next().find(".quantity").val(0);
        $(this).parent().next().find(".quantity").attr('readonly', true);
      }

      update_money_form();
    });

    // xóa 1 trường sản phẩm
    $("#products_wrapper").on('click', '.remove-product-field', function(e){
        e.preventDefault();
        $(this).parent().parent('div.form-row').remove();
        update_money_form();
        let product_count = $(".select-product").length;
        if(product_count == 0){
          $(".create-order").addClass('d-none');
          $(".colunm-title-product").addClass('d-none');
        }
    });

    // nhập số lượng thì tính giá
    $("#products_wrapper").on('keyup','.quantity',function(event){
      let quantity = parseInt($(this).val());
      if(quantity){
        if(quantity > 0){
          let price = parseInt($(this).data('price'));
          let discount = parseInt($(this).data('discount'));
          let total = (quantity * price)*((100 - discount)/100);
          console.log(price,discount,total);
          $(this).data('total',total);
        }else{
          $(this).data('total',0);
        }
      }else{
        $(this).data('total',0);
      }
      update_money_form();
    });

    // convert datetime to timestamp
    function toTimeStamp(date_string){
      let dateString = date_string,
          dateTimeParts = dateString.split(' '),
          timeParts = dateTimeParts[1].split(':'),
          dateParts = dateTimeParts[0].split('-'),
          date;

      date = new Date(dateParts[0], dateParts[1], dateParts[2], timeParts[0], timeParts[1], timeParts[2]);
      // console.log(dateTimeParts,dateParts,timeParts);
      return date.getTime();
    }
	});
</script>
@endpush
@extends('admin.layouts.app')

@push('page-styles')
<style type="text/css">

</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Khách Hàng</a></li>
      <li class="breadcrumb-item active">Chỉnh Sửa</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-md-12 col-sm-12 col-12">
 		@include('admin.includes.form-alert')
  	<div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body">
    		<h4 class="header-title">CHỈNH SỬA KHÁCH HÀNG <a class="direct-link" href="{{route('administrator.customer.detail',['id'=>base64_encode($customer->id)])}}"><span class="text-info">#{{ $customer->name }}</span></a></h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
        <form method="post" action="{{ url()->current()}}" id="editForm">
        	@csrf
  	   	  <div class="form-row">
                {{-- ten kh --}}
                <div class="form-group col-6 col-sm-6 col-md-6">
                  <label for="name" class="col-form-label">Tên khách hàng <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror {{$customer->name != null ? 'parsley-success':''}}" id="name" name="name" placeholder="Nhập tên" value="{{old('name',$customer->name != null ? $customer->name:'')}}" required>
                  @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>

                {{-- sđt --}}
  			      	<div class="form-group col-6 col-sm-6 col-md-6">
                  <label for="phone" class="col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror {{$customer->phone != null ? 'parsley-success':''}}" id="phone" name="phone" placeholder="Nhập sđt" value="{{old('phone',$customer->phone != null ? $customer->phone:'')}}" required>
                  @error('phone')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>

                {{-- sinh nhật --}}
                <div class="form-group col-12 col-sm-6 col-md-6">
                  <label for="d_o_b" class="col-form-label">Ngày sinh <span class="small text-info">(tháng/ngày/năm)</span></label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('d_o_b') is-invalid @enderror {{$customer->d_o_b != null ? 'parsley-success':''}}" placeholder="mm/dd/yyyy" id="datepicker_dob" name="d_o_b" value="{{old('d_o_b',$customer->d_o_b != null ? $customer->d_o_b->format('m/d/Y'):'')}}">
                    <input type="hidden" name="d_o_b_1" value="{{old('d_o_b',$customer->d_o_b != null ? $customer->d_o_b->format('m/d/Y'):'')}}">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                    </div>
                  </div>
                  @error('d_o_b')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>

                {{-- địa chỉ --}}
                <div class="form-group col-12 col-sm-6 col-md-6">
                  <label for="address" class="col-form-label">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('address') is-invalid @enderror {{$customer->address != null ? 'parsley-success':''}}" id="address" name="address" placeholder="Nhập địa chỉ" value="{{old('address',$customer->address != null ? $customer->address:'')}}" data-address="{{$customer->address != null ? $customer->address:''}}" required>
                    <div class="input-group-append">
                      <button class="btn btn-dark waves-effect waves-light btn-address-default" type="button">Mặc định</button>
                    </div>
                  </div>
                  @error('address')
                    <p class="text-validate"><strong>{{ $message }}</strong></p>
                  @enderror
                </div>
  	   	  </div>
  			   	<div class="form-group text-right mb-0">
  		      	<button type="submit" class="btn btn-primary direct-link">Cập nhật</button>
  			   	</div>
  			</form>
      </div>
    </div>
 	</div>
</div>
@endsection

@push('libs-scripts')
<script src="{{asset('admini/js/select2.min.js') }}"></script>
<script src="{{asset('admini/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('admini/js/jquery.validate.min.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
  $(document).ready(function() {

    $( "#datepicker_dob" ).datepicker();

    // focusout form-control
    $(".form-control").focusout(function(event){
      let input_id = $(this).attr('id');
      let val = $(this).val();
      if(val != null && val != ""){
        $(`#${input_id}`).addClass('parsley-success');
      }else{
        $(`#${input_id}`).removeClass('parsley-success');
      }
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

  });
</script>
@endpush
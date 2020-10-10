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
      <li class="breadcrumb-item active">Thêm Mới</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-md-12 col-sm-12 col-12">
 		@include('admin.includes.form-alert')
  	<div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body">
    		<h4 class="header-title">THÊM MỚI KHÁCH HÀNG</h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
        <form method="post" action="{{ url()->current()}}" id="addForm">
        	@csrf
  	   	  <div class="form-row">
                {{-- ten kh --}}
                <div class="form-group col-6 col-sm-6 col-md-6">
                  <label for="name" class="col-form-label">Tên khách hàng <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập tên" value="{{old('name')}}" required>
                  @error('name')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>

                {{-- sđt --}}
  			      	<div class="form-group col-6 col-sm-6 col-md-6">
                  <label for="phone" class="col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Nhập sđt" value="{{old('phone')}}" required>
                  @error('phone')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>

                {{-- sinh nhật --}}
                <div class="form-group col-12 col-sm-6 col-md-6">
                  <label for="d_o_b" class="col-form-label">
                   sinh <span class="small text-info">(tháng/ngày/năm)</span></label>
                  <div class="input-group">
                    <input type="text" class="form-control @error('d_o_b') is-invalid @enderror" placeholder="mm/dd/yyyy" id="datepicker_dob" name="d_o_b" value="{{old('d_o_b')}}">
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
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}" required>
                  </div>
                  @error('address')
                    <p class="text-validate"><strong>{{ $message }}</strong></p>
                  @enderror
                </div>
  	   	  </div>
  			   	<div class="form-group text-right mb-0">
  		      	<button type="submit" class="btn btn-primary direct-link">Thêm Mới</button>
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
    
  });
</script>
@endpush
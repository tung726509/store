@extends('admin.layouts.app')

@push('libs-styles')
  <link href="{{asset('admini/css/switchery.min.css')}}" rel="stylesheet" type="text/css">
@endpush

@push('page-styles')
<style type="text/css">

</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Cài Đặt</a></li>
      <li class="breadcrumb-item"><a href="#">Hệ Thống</a></li>
      <li class="breadcrumb-item active">Chung</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-md-12 col-sm-12 col-12 p-0">
 		@include('admin.includes.form-alert')
  	<div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body p-2">
    		<h4 class="header-title">Cài đặt hệ thống</h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
        <form method="post" action="{{ url()->current()}}" id="commonForm">
        	@csrf
  	   	  <div class="form-row mt-2">
            {{-- sinh nhật --}}
            <div class="col-12 col-sm-12 col-md-6 col-xl-4">
              <label for="phone" class="col-form-label">Sinh nhật khách hàng giảm ( %/đơn hàng ) <span class="text-danger">*</span></label>
              <div class="form-row">
                <div class="col-8">
                  <div class="input-group">
                    <input type="number" class="form-control @error('bd_discount') is-invalid @enderror" id="bd_discount" name="bd_discount" placeholder="VD : 10" value="{{old('bd_discount',$bd_val)}}" required>
                    <div class="input-group-append">
                        <button class="btn btn-dark waves-effect waves-light save-option" type="button" data-value="0" id="save_bd_discount">Lưu</button>
                    </div>
                  </div>
                </div>
                <div class="col-4 text-center">
                  <input type="checkbox" {{$bd_check != '' ? $bd_check : ''}} data-plugin="switchery" data-color="#039cfd" class="pt-1 save-option" id="bd_check_btn" name="bd_check_btn" data-value=""/>
                </div>
              </div>
              @error('phone')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            {{-- freeship --}}
            <div class="col-12 col-sm-12 col-md-6 col-xl-4">
              <label for="phone" class="col-form-label">Freeship cho đơn hàng trên ( VNĐ ) <span class="text-danger">*</span></label>
              <div class="form-row">
                <div class="col-8">
                  <div class="input-group">
                    <input type="text" class="form-control @error('fs_discount') is-invalid @enderror" id="fs_discount" name="fs_discount" placeholder="VD : 100000" value="{{old('fs_discount',$fs_val)}}" required>
                    <div class="input-group-append">
                        <button class="btn btn-dark waves-effect waves-light save-option" type="button" data-value="0" id="save_fs_discount">Lưu</button>
                    </div>
                  </div>
                </div>
                <div class="col-4 text-center">
                  <input class="pt-1 save-option" type="checkbox" {{$fs_check != '' ? $fs_check : ''}} data-plugin="switchery" data-color="#039cfd" id="fs_check_btn" name="fs_check_btn" data-value=""/>
                </div>
              </div>
              @error('phone')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
            {{-- transfer --}}
            <div class="col-12 col-sm-12 col-md-6 col-xl-4">
              <label for="phone" class="col-form-label">Chuyển khoản giảm ( %/đơn hàng ) <span class="text-danger">*</span></label>
              <div class="form-row">
                <div class="col-8">
                  <div class="input-group">
                    <input type="text" class="form-control @error('tf_discount') is-invalid @enderror" id="tf_discount" name="tf_discount" placeholder="VD : 5" value="{{old('tf_discount',$tf_val)}}" required>
                    <div class="input-group-append">
                        <button class="btn btn-dark waves-effect waves-light save-option" type="button" data-value="0" id="save_tf_discount">Lưu</button>
                    </div>
                  </div>
                </div>
                <div class="col-4 text-center">
                  <input class="pt-1 save-option" type="checkbox" {{$tf_check != '' ? $tf_check : ''}} data-plugin="switchery" data-color="#039cfd" id="tf_check_btn" name="tf_check_btn" data-value=""/>
                </div>
              </div>
              @error('phone')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
              @enderror
            </div>
  	   	  </div>
  			</form>
      </div>
    </div>
 	</div>
</div>
@endsection

@push('libs-scripts')
<script src="{{asset('admini/js/switchery.min.js')}}"></script>
<script src="{{asset('admini/js/select2.min.js')}}"></script>
<script src="{{asset('admini/js/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('admini/js/form-advanced.init.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var bd_fs_save_val_ajax = (type,value) => {
      $.ajax({
          url: '{{ route('administrator.option.bd_fs_save_val_ajax') }}',
          type: 'post',
          data: {type: type,value: value},
        })
        .done(function(res) {
          if(res.success){
            if(res.message == "validate fail"){
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${res.errors.value[0]} !`,
              });
            }else if(res.message == "update success"){
              Swal.fire({
                icon: 'success',
                title: 'Thành công !',
                text: `Cập nhật thành công !`,
              });
            }
          }
        })
    }

    $(".save-option").click(function(event){
        let type = $(this).attr('id');
        let value = 0;
        if(type == "save_bd_discount"){
            if($("#bd_discount").val()){
              value = $("#bd_discount").val();
            }
            bd_fs_save_val_ajax(type,value);
        }else if(type == "save_fs_discount"){
            if($("#fs_discount").val()){
              value = $("#fs_discount").val();
            }
            bd_fs_save_val_ajax(type,value);
        }else if(type == "save_tf_discount"){
            if($("#tf_discount").val()){
              value = $("#tf_discount").val();
            }
            bd_fs_save_val_ajax(type,value);
        }
    });

    $(".save-option").change(function(event){
        let type = $(this).attr('id');
        let value = 0;
        if(type == "bd_check_btn" || type == "fs_check_btn" || type == "tf_check_btn"){
          if(this.checked){
            value = 1;
          }else{
            value = 0;
          }
          bd_fs_save_val_ajax(type,value);
        }
    });
  });
</script>
@endpush
@extends('admin.layouts.app')

@push('page-styles')
<style type="text/css">
.border-img{
  border: 10px solid transparent;
  padding: 15px;
  /*border-image: url('/admini/images/border-image.png') 50 round;*/
  border-image: url(/admini/images/border-image.png) 30 stretch;
}
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Thẻ Tag</a></li>
      <li class="breadcrumb-item active">Chỉnh Sửa</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   	<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
   		@include('admin.includes.form-alert')
      	<div class="card animate__animated animate__rollIn animate__faster">
          <div class="card-body">
            <div class="row">
              <div class="container-fluid col-5 col-sm-5 col-md-5 col-xl-3">
                <h4 class="header-title">CHỈNH SỬA THẺ TAGS</h4>
                <p class="sub-header">
                    Thẻ <a href="{{route('administrator.tag.index')}}">tags</a> giúp tổng hợp các loại sản phẩm có cùng tag , tốt cho việc lọc hay tìm kiếm sản phẩm cùng tag .
                </p>
                <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
              </div>
              <div class="container-fluid col-7 col-sm-5 col-md-4 col-xl-4">
                <h4 class="header-title">ẢNH MINH HỌA</h4>
                <div class="">
                  <img src="{{asset('admini/images/tags.png')}}" alt="placeholder+image" width="100%" height="auto" class="img-fluid border-img">
                </div>
              </div>
            		
              
          </div>
          <hr class="mb-0">
          <div class="row">
            <div class="container-fluid col-12 col-sm-12 col-md-10">
              <form method="post" action="{{ url()->current()}}" id="addForm">
                @csrf
                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="code" class="col-form-label">Mã tag <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Bấm nút tạo mã -->>" value="{{old('code',$tag->code)}}" required readonly>
                          <div class="input-group-append">
                              <button class="btn btn-dark waves-effect waves-light random-string" type="button">Tạo mã</button>
                          </div>
                        </div>
                        @error('code')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                              @enderror
                      </div>
                      <div class="form-group col-md-12">
                        <label for="pretty_name" class="col-form-label">Tên tag <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('pretty_name') is-invalid @enderror" id="pretty_name" name="pretty_name" placeholder="Nhập tên tag" value="{{old('pretty_name',$tag->pretty_name)}}" required>
                        @error('pretty_name')
                      <div class="text-danger small">{{ $message }}</div>
                              @enderror
                      </div>
                  </div>
                  <div class="form-group text-right mb-0">
                      <button type="submit" class="btn btn-primary">Lưu</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
   	</div>
</div>
@endsection

@push('libs-scripts')
@endpush

@push('page-scripts')
<script type="text/javascript">
  $(document).ready(function() {
    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        return result;
    }

    $('.random-string').click(function(event) {
      let r_str = makeid(10);
      $('input[name="code"]').val(r_str);
    });
  });
</script>
@endpush
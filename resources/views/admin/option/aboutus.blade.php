@extends('admin.layouts.app')

@push('libs-styles')
    <link rel="stylesheet" href="{{asset('admini/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admini/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('admini/css/dropzone.min.css')}}"  type="text/css" />
@endpush

@push('page-styles')
  <style type="text/css">
    .img-bigbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-medbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-fg-t{
      /*border: 1px solid #F3EEEE;*/
      /*border-radius: 20px;*/    
    }
  </style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Cài Đặt</a></li>
      <li class="breadcrumb-item"><a href="#">Website Bán Hàng</a></li>
      <li class="breadcrumb-item active">Thông Tin Cửa Hàng</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-12">
    @include('admin.includes.form-alert')
  </div>
  {{-- mô tả sản phẩm --}}
  <div class="col-md-12 col-sm-12 col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body">
        <h4 class="header-title">1 . Thông tin liên hệ</h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
          <form method="post" action="{{ url()->current()}}" id="aboutUsForm">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="company_phone" class="col-form-label">Số ĐT</label>
                  <input type="text" class="form-control @error('company_phone') is-invalid @enderror" id="company_phone" name="company_phone" placeholder="" value="{{ old('company_phone',$data['com_phone']['content']) }}">
                  @error('company_phone')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_address" class="col-form-label">Địa chỉ</label>
                  <input type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" placeholder="" value="{{ old('company_address',$data['com_address']['content']) }}">
                  @error('company_address')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_email" class="col-form-label">Email</label>
                  <input type="text" class="form-control @error('company_email') is-invalid @enderror" id="company_email" name="company_email" placeholder="vd : abc@gmail.com" value="{{ old('company_email',$data['com_email']['content']) }}">
                  @error('company_email')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_facebook" class="col-form-label">Facebook</label>
                  <input type="text" class="form-control @error('company_facebook') is-invalid @enderror" id="company_facebook" name="company_facebook" placeholder="vd : https://www.facebook.com/tung726509" value="{{ old('company_facebook',$data['fb']['content']) }}">
                  @error('company_facebook')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_instagram" class="col-form-label">Instagram</label>
                  <input type="text" class="form-control @error('company_instagram') is-invalid @enderror" id="company_instagram" name="company_instagram" placeholder="vd : https://www.instagram.com/tung.encode.97/?hl=vi" value="{{ old('company_instagram',$data['ins']['content']) }}">
                  @error('company_instagram')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_twitter" class="col-form-label">Twitter</label>
                  <input type="text" class="form-control @error('company_twitter') is-invalid @enderror" id="company_twitter" name="company_twitter" placeholder="vd :" value="{{ old('company_twitter',$data['twt']['content']) }}">
                  @error('company_twitter')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="company_opentime" class="col-form-label">Thời gian hoạt động</label>
                  <input type="text" class="form-control @error('company_opentime') is-invalid @enderror" id="company_opentime" name="company_opentime" placeholder="vd : Thứ Hai - Chủ Nhật / 9:00 AM - 8:00 PM" value="{{ old('company_opentime',$data['open_time']['content']) }}">
                  @error('company_opentime')
                    <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
            </div>
            <div class="form-group text-right mb-0">
                <button type="submit" class="btn btn-primary" name="aboutUsForm">Cập Nhật</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('libs-scripts')
  <script src="{{ asset('admini/js/dropzone.min.js') }}"></script>
  <script src="{{ asset('admini/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>
@endpush  

@push('page-scripts')
  <script type="text/javascript">
    $(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    });
  </script>
@endpush
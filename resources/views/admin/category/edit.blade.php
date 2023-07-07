@extends('admin.layouts.app')

@push('page-styles')
  <style type="text/css">
    .img-bigbanner{
      border-radius: 50%;
      border: 1px solid #645F5F;
    }
    .img-medbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-fg-t{
    }
  </style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Danh Mục</a></li>
      <li class="breadcrumb-item active">Chỉnh Sửa</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   	<div class="col-12 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
   		@include('admin.includes.form-alert')
      	<div class="card animate__animated animate__rollIn animate__faster">
          <div class="card-body">
        		<h4 class="header-title">CHỈNH SỬA DANH MỤC</h4>
            <div class="text-muted m-b-20 font-13 position-relative mb-3">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
            <form method="post" action="{{ url()->current()}}" id="editForm" enctype="multipart/form-data">
            	@csrf
              {{-- input chọn Ảnh --}}
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                      <div class="form-group mb-1">
                        <input type="file" class="filestyle @error('category_image') is-invalid @enderror" name="category_image" data-buttonBefore="true" data-size="sm" >
                        @error('category_image')
                          <div class="text-danger small"><strong>{{ $message }}</strong></div>
                        @enderror
                      </div>
                      <div class="m-b-20 font-11 position-relative small text-danger mb-2"> - Kích thước khuyến nghị 200x200 pixel , ảnh </div>
                    </div>
                </div>
                
                {{-- bannner --}}
                <div class="row mb-2">
                  <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                    <div class="owl-carousel owl-theme big-banner-owl">
                      <div class="item img-fg-t text-center">
                        <img class="img-bigbanner" src="{{ asset('homepage/images/'.$category->image_name) }}" alt="placeholder+image" width="200px" height="200px">
                      </div>
                    </div>
                  </div>
                </div>
      			   	<div class="form-row">
      			      	<div class="form-group col-md-12">
      			         	<label for="code" class="col-form-label">Mã danh mục <span class="text-danger">*</span> <span class="small text-info">( viết thường , liền nhau và không dấu )</span></label>
      			         	<input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Nhập Mã" value="{{old('code',$category->code)}}" required>
      			         	@error('code')
      							<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          	@enderror
      			      	</div>
      			      	<div class="form-group col-md-12">
      			         	<label for="pretty_name" class="col-form-label">Tên danh mục <span class="text-danger">*</span></label>
      			         	<input type="text" class="form-control @error('pretty_name') is-invalid @enderror" id="pretty_name" name="pretty_name" placeholder="Nhập tên" value="{{old('code',$category->pretty_name)}}" required>
      			         	@error('pretty_name')
      							<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
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
@endsection

@push('libs-scripts')
  <script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>
@endpush

@push('page-scripts')
@endpush
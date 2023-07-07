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
      <li class="breadcrumb-item"><a href="#">Tài Khoản</a></li>
      <li class="breadcrumb-item"><a href="#">Quyền Hạn</a></li>
      <li class="breadcrumb-item active">Thêm Mới</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   	<div class="col-12">
   		@include('admin.includes.form-alert')
      	<div class="card animate__animated animate__rollIn animate__faster">
          <div class="card-body">
        		<h4 class="header-title">Thêm Mới Quyền Hạn</h4>
            <div class="text-muted m-b-20 font-13 position-relative mb-3">Các trường đánh dấu<span class="text-danger">*</span> là bắt buộc</div>
            <form method="post" action="{{ url()->current()}}" id="addForm" enctype="multipart/form-data">
            	@csrf
      			   	<div class="form-row">
      			      	<div class="form-group col-md-12">
      			         	<label for="code" class="col-form-label">Mã danh mục <span class="text-danger">*</span> <span class="small text-info">( viết thường , liền nhau và không dấu )</span></label>
      			         	<input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Nhập Mã" value="{{old('code')}}" required>
      			         	@error('code')
      							<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          	@enderror
      			      	</div>
      			      	<div class="form-group col-md-12">
      			         	<label for="pretty_name" class="col-form-label">Tên danh mục <span class="text-danger">*</span></label>
      			         	<input type="text" class="form-control @error('pretty_name') is-invalid @enderror" id="pretty_name" name="pretty_name" placeholder="Nhập tên" value="{{old('pretty_name')}}" required>
      			         	@error('pretty_name')
      							<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                          	@enderror
      			      	</div>
      			   	</div>
      			   	<div class="form-group text-right mb-0">
      			      	<button type="submit" class="btn btn-primary">Thêm mới</button>
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
<script type="text/javascript">
	jQuery(document).ready(function($) {

	});
</script>
@endpush
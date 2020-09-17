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
      <li class="breadcrumb-item"><a href="#">Kho Hàng</a></li>
      <li class="breadcrumb-item active">Thêm Mới</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   <div class="col-12 col-md-8">
   		@include('admin.includes.form-alert')
      	<div class="card animate__animated animate__rollIn animate__faster">
      		<div class="card-body">
	      		<h4 class="header-title">THÊM MỚI KHO HÀNG</h4>
	      		<p class="sub-header">
	                Giúp bạn theo dõi số lượng sản phẩm còn tồn trong mỗi kho .
	            </p>
	            <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
	            <form method="post" action="{{ url()->current()}}" id="addForm">
	            	@csrf
				   	<div class="form-row">
				      	<div class="form-group col-md-6">
				         	<label for="name" class="col-form-label">Tên kho hàng <span class="text-danger">*</span></label>
				         	<div class="input-group">
				         		<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập tên kho hàng" value="{{old('name')}}" required>
				         	</div>
				         	@error('name')
								<div class="text-small text-danger"><strong>{{ $message }}</strong></div>
	                    	@enderror
				      	</div>
				      	<div class="form-group col-md-6">
				         	<label for="address" class="col-form-label">Địa chỉ</label>
				         	<input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}">
				         	@error('address')
								<div class="text-small text-danger"><strong>{{ $message }}</strong></div>
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

@endpush

@push('page-scripts')
<script type="text/javascript">

</script>
@endpush
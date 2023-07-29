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
      <li class="breadcrumb-item"><a href="#">Bài Viết</a></li>
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
	      		<h4 class="header-title">THÊM MỚI Bài Viết</h4>
	            <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
	            <form method="post" action="{{ url()->current()}}" id="addForm">
	            	@csrf
				   	<div class="form-row">
				      	{{-- <div class="form-group col-md-6">
				         	<label for="sku" class="col-form-label">Mã Bài Viết <span class="text-danger">*</span></label>
			         		<input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="vd : sp01" value="{{old('sku')}}">
				         	@error('sku')
								<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
	                    	@enderror
				      	</div> --}}
				      	<div class="form-group col-md-6">
				         	<label for="pretty_name" class="col-form-label">Tên Bài Viết <span class="text-danger">*</span></label>
				         	<input type="text" class="form-control @error('pretty_name') is-invalid @enderror" id="pretty_name" name="pretty_name" placeholder="vd : Bài Viết số 1" value="{{old('pretty_name')}}">
				         	@error('pretty_name')
								<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
	                    	@enderror
				      	</div>
				      	<div class="form-group col-md-6">
				         	<label for="category_id" class="col-form-label">Danh Mục <span class="text-danger">*</span></label>
				         	<select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
	                            <option value="">-- Chọn --</option>
	                        @foreach($categories as $item)
	                            <option value="{{ $item->id }}">{{ $item->pretty_name }}</option>
	                        @endforeach
	                        </select>
	                        @error('category_id')
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

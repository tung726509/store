@extends('admin.layouts.app')

@push('page-styles')
<style type="text/css">

</style>
@endpush

@section('breadcrumb')
<h4 class="page-title-main">Dashboard</h4>
<ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
 <li class="breadcrumb-item"><a href="#">Kho Hàng</a></li>
 <li class="breadcrumb-item"><a href="#">Chi tiết kho Hàng</a></li>
 <li class="breadcrumb-item active">Nhập Mới</li>
</ol>
@endsection

@section('content')
<div class="row">
   <div class="col-12">
   		@include('admin.includes.form-alert')
      	<div class="card-box">
      		<h4 class="header-title">Nhập sản phẩm mới vào kho <span><a href="{{route('administrator.warehouse.detail',['id'=>$warehouse->id])}}">#{{ $warehouse->name }}</a></span></h4>
      		<p class="sub-header">
                Nếu sản phẩm bạn muốn nhập kho không có trong danh sách bên dưới có nghĩa sản phẩm đó đã có trong kho hàng này . Nhập mới chỉ áp dụng cho lần đầu nhập sản phẩm vào kho hàng.
            </p>
            <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
            <form method="post" action="{{ url()->current()}}" id="addForm">
            	@csrf
			   	<div class="form-row">
			      	<div class="form-group col-md-6">
			         	<label for="product_id" class="col-form-label">Chọn sản phẩm<span class="text-danger">*</span></label>
			         	<select id="product_id" name="product_id" class="form-control @error('product_id') is-invalid @enderror" required>
                            <option value="">-- Chọn --</option>
                        @foreach($products_notin_wh as $item)
                            <option value="{{ $item->id }}">{{ $item->pretty_name }}</option>
                        @endforeach
                        </select>
			      	</div>
			      	<div class="form-group col-md-6">
			         	<label for="quantity" class="col-form-label">Số lượng</label>
			         	<input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Nhập số lượng" value="{{old('quantity')}}" required>
			         	@error('quantity')
							<div class="text-small text-danger"><strong>{{ $message }}</strong></div>
                    	@enderror
			      	</div>
			   	</div>
			   	<div class="form-group text-right mb-0">
			   		<input type="hidden" class="" id="warehouse_id" name="warehouse_id" value="{{ $warehouse->id }}">
			      	<button type="submit" class="btn btn-primary">Nhập kho</button>
			   	</div>
			</form>
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
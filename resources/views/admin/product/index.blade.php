@extends('admin.layouts.app')

@push('page-styles')
<style type="text/css">
	.icon-action{
		padding-right: 5px;
	}
	.display-inblock{
		display: inline-block;
	}
	.display-block{
		display: block;
	}
	.breadcrumb-item+.breadcrumb-item::before {
		content: ">"
	}
	.font-size-t{
		font-size: 17px;
	}
   .hr-t{
      color: white;
      border: 1px solid;
      margin-top: 0px;
   }
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
   <div class="col-12">
      <div class="card animate__animated animate__rollIn animate__faster">
         <div class="card-body">
           	<div class="table-rep-plugin">
               {{-- filter form --}}
           		<div class="row mb-2">
                  <form class="" id="filterForm" method="get" style="width: 100%">
         		   	<div class="col-sm-12 col-md-12 p-0">
                        {{-- per_page --}}
                        <div class="row mb-2">
                           <div class="col-4">
                              <p class="text-center m-0">Hiển Thị</p>
                           </div>
                           <div class="col-7">
                              <select name="per" id="per" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                 <option value="10" {{ $per_page == 10 ? 'selected' : '' }}>10</option>
                                 <option value="20" {{ $per_page == 20 ? 'selected' : '' }}>20</option>
                                 <option value="30" {{ $per_page == 30 ? 'selected' : '' }}>30</option>
                              </select>
                           </div>
                        </div>
                        {{-- filter discount --}}
                        <div class="row mb-2">
                           <div class="col-4">
                              <p class="text-center m-0">Discount</p>
                           </div>
                           <div class="col-7">
                              <select name="sale" id="sale" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                                 <option value="" {{ $sale == '' ? 'selected' : '' }}>Tất Cả</option>
                                 <option value="sale" {{ $sale == 'sale' ? 'selected' : '' }}>Đang giảm</option>
                                 <option value="not_sale" {{ $sale == 'not_sale' ? 'selected' : '' }}>Không giảm</option>
                              </select>
                           </div>
                        </div>
                        {{-- search --}}
                        <div class="row mb-2">
                           <div class="col-4">
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary btn-rounded waves-light waves-effect btn-sm pl-1 pr-1 ">Tìm kiếm</button>
                              </div>
                           </div>
                           <div class="col-7">
                              <input type="search" name="s" id="s" class="form-control form-control-sm" placeholder="mã sản phẩm" aria-controls="datatable-buttons" value="{{$search}}">
                           </div>
                        </div>
         		   	</div>
                  </form>
      			</div>
               <hr class="hr-t">
               {{-- bảng dữ liệu --}}
               <div class="table-responsive mb-0" data-pattern="priority-columns">
                  	<table id="" class="table">
                        <thead>
                           <tr>
                              <th class="text-center"><i class="far fa-sun"></i></th>
                              <th data-priority="1" class="text-center">Mã</th>
                              <th data-priority="1" class="text-center">Tên</th>
                              <th data-priority="1" class="text-center">Giá bán</th>
                              <th data-priority="1" class="text-center">Discount</th>
                              <th data-priority="1" class="text-center">Kết Thúc</th>
                           </tr>
                        </thead>
                        <tbody>
                        	@forelse($products as $item)
                           <tr>
                              <td class="text-center">
                                 <div class="btn-group">
                                     <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true"> <i class="fas fa-cog"></i> </button>
                                     <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                                         <a class="dropdown-item" href="#"><i class="fas fa-info text-info icon-action"></i> Chi Tiết</a>
                                         <a class="dropdown-item" href="{{ route('administrator.product.edit',['id'=>$item->id]) }}"><i class="far fa-edit icon-action" style="color: #F4FA58"></i> Chỉnh Sửa</a>
                                         <a class="dropdown-item" href="#"><i class="far fa-trash-alt text-danger"></i> Xóa</a>
                                     </div>
                                 </div>
                              </td>
                              <td class="text-center">{{$item->sku}}</td>
                              <td class="text-center">
                              	{{-- <a href="#" class="text-danger"> --}}
                                    <p class="badge badge-primary p-1 mb-0">{{$item->pretty_name}}</p>
                                 {{-- </a> --}}
                              	<small class="text-muted display-block">Tồn kho : <span class="font-size-t">{{$item->wh_items->sum('quantity')}}</span></small>
                              </td>
                              <td class="text-center">{{$item->price / 1000}}k VNĐ</td>
                              <td class="text-center">
                                 @if($item->discount != null && $item->discount != "")
                                 <span class="font-size-t">{{$item->discount}}</span> %
                                 @endif
                              </td>
                              <td class="text-center">
                              	@php
                              	$expired_discount = strtotime($item->expired_discount);
                              	@endphp
                              	@if($now <= $expired_discount)
                              		<span class="badge badge-success p-1">{{ date('d/m/Y',$expired_discount) }}</span>
                              	@elseif($now > $expired_discount)
                              		<span class="badge badge-danger p-1">Hết giảm</span>

                              	@endif
                              </td>
                           </tr>
                           @empty
                           <h3>Chưa có dữ liệu</h3>
                           @endforelse
                        </tbody>
                  	</table>
               </div>
               <hr class="hr-t">
               {{-- phần trang --}}
               <div class="row mt-2 mb-2">
                  <div class="col-12">
                     {{ $products->appends(request()->query())->links() }}
                  </div>
               </div>
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

      $("#sale").on('change', function(){
         $("#filterForm").submit();
      });

      $("#per").on('change', function(){
         $("#filterForm").submit();
      });

   });
</script>
@endpush
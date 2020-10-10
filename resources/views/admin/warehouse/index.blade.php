@extends('admin.layouts.app')

@push('libs-styles')

@endpush


@push('page-styles')
<style type="text/css">
   .dis-block-store{
      display: block;
   }
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Kho Hàng</a></li>
      <li class="breadcrumb-item active">Tất Cả</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   @forelse($warehouses as $item)
   <div class="col-12 col-md-6">
      <div class="card project-box animate__animated animate__rollIn animate__faster">
         <div class="card-body">
            <div class="row">
            <div class="col-7 col-md-7">
               <p class="text-muted text-uppercase mb-2 font-13">Orange Limited</p>
               <h4 class="mt-0 mb-2">
                  <a href="{{ route('administrator.warehouse.detail',['id'=>$item->id]) }}" class="text-dark text-uppercase">{{$item->name}}</a>
               </h4>
               <p class="text-muted font-13">Địa chỉ : {{$item->address != '' ? $item->address : '...'}}
               </p>
               <label class="dis-block-store">Sản phẩm : <span class="text-primary">{{$item->wh_items->count() > 0 ? $item->wh_items->count().' loại':'trống'}}</span></label>
               <label class="dis-block-store">Tồn kho : <span class="text-primary">{{$item->wh_items->count() > 0 ? $item->wh_items->sum('quantity'):'0'}}</span></label>
            </div>
            <div class="col-5 col-md-5">
               <a class="btn btn-outline-info waves-light waves-effect float-right mb-1" href="{{ route('administrator.warehouse.detail',['id'=>$item->id]) }}">
                  <i class="fas fa-info text-info icon-action mr-1"></i></i>Chi Tiết
               </a>
               <a class="btn btn-outline-warning waves-light waves-effect float-right mb-1 pl-3 pr-3" href="{{ route('administrator.warehouse.edit',['id'=>$item->id]) }}">
                  <i class="far fa-edit mr-1" style="color: #f9bc0b"></i>Sửa
               </a>
               <a class="btn btn-outline-danger waves-light waves-effect float-right pl-3 pr-3" href="#">
                  <i class="far fa-trash-alt mr-1" style="color: #f1556c"></i>Xóa
               </a>
            </div>
            </div>
         </div>
      </div>
   </div>

   @empty
   <div class="col-12">
      <label>Chưa có kho hàng , vui lòng bấm &nbsp;<a href="{{route('administrator.warehouse.add')}}" class="text-uppercase btn btn-sm btn-primary">thêm mới</a> &nbsp;để tạo kho hàng .</label>
   </div>
   @endforelse
   @if($warehouses->isNotEmpty())
   <div class="col-12">
      <a href="{{route('administrator.warehouse.add')}}" class="text-uppercase btn btn-sm btn-primary">thêm mới</a>
   </div>
   @endif
</div>
@endsection

@push('libs-scripts')
<script src="{{asset('admini/js/companies.init.js')}}"></script>
@endpush
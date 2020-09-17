@extends('admin.layouts.app')

@push('page-styles')
<style type="text/css">
  .icon-action{
    padding-right: 5px;
  }
  .display-inblock{
    display: inline-block;
  }
  .breadcrumb-item+.breadcrumb-item::before {
    content: ">"
  }
  .hr-t{
      color: white;
      border: 1px solid;
      margin-top: 0px;
  }
  .hover_link:hover{
    text-decoration: underline;
  }
  .car-move{
    color:#45bbe0;
  }
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Đơn Hàng</a></li>
      <li class="breadcrumb-item active">Tất Cả</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="table-rep-plugin">
        {{-- TICKET --}}
        <h4 class="ml-3"><i class="fas fa-chart-pie"></i> Thống Kê Đơn Hàng</h4>
        <div class="text-center m-3">
          <div class="row">
              <div class="col-md-4 col-6">
                <div class="card widget-flat border-blue bg-blue text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="fe-tag"></i>
                    <h4 class="text-white">{{ $total_orders != null ? $total_orders : 0 }}</h4>
                    <p class="text-uppercase font-14 font-weight-bold mb-0">Tổng Đơn</p>
                </div>
              </div>
              <div class="col-md-4 col-6">
                <div class="card bg-light widget-flat border-light text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="fas fa-microchip"></i>
                    <h4 class="text-white">{{ $un_process_orders != null ? $un_process_orders : 0 }}</h4>
                    <p class="text-uppercase font-7 font-weight-bold mb-0">Chưa Xử Lý</p>
                </div>
              </div>
              <div class="col-md-4 col-6">
                <div class="card bg-info widget-flat border-info text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="fas fa-check"></i>
                    <h4 class="text-white">{{ $confirm_orders != null ? $confirm_orders : 0 }}</h4>
                    <p class="text-uppercase font-14 font-weight-bold mb-0">Xác Nhận</p>
                </div>
              </div>
              <div class="col-md-4 col-6">
                <div class="card widget-flat border-warning bg-warning text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="far fa-trash-alt"></i>
                    <h4 class="text-white">{{ $cancel_orders != null ? $cancel_orders : 0 }}</h4>
                    <p class="text-uppercase font-14 font-weight-bold mb-0">Đã Hủy</p>
                </div>
              </div>
              <div class="col-md-4 col-6">
                <div class="card bg-success widget-flat border-success text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="fas fa-check-double"></i>
                    <h4 class="text-white">{{ $success_orders != null ? $success_orders : 0 }}</h4>
                    <p class="text-uppercase font-14 font-weight-bold mb-0">Thành Công</p>
                </div>
              </div>
              <div class="col-md-4 col-6">
                <div class="card bg-danger widget-flat border-danger text-white pl-2 pr-2 pt-1 pb-1">
                    <i class="fas fa-file-excel"></i>
                    <h4 class="text-white">{{ $fail_orders != null ? $fail_orders : 0 }}</h4>
                    <p class="text-uppercase font-14 font-weight-bold mb-0">Thất Bại</p>
                </div>
              </div>
          </div>
        </div>
        {{-- filter form --}}
        <div class="row mb-2">
          <form class="" id="filterForm" method="get" style="width: 100%">
            <div class="col-sm-12 col-md-12">
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
                   <p class="text-center m-0">Phân loại</p>
                </div>
                <div class="col-7">
                  <select name="o_status" id="o_status" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm">
                    <option value="" {{ $o_status == '' ? 'selected' : '' }}>Tất Cả</option>
                    <option value="1" {{ $o_status == 1 ? 'selected' : '' }}>Chưa xử lý</option>
                    <option value="2" {{ $o_status == 2 ? 'selected' : '' }}>Đã hủy</option>
                    <option value="3" {{ $o_status == 3 ? 'selected' : '' }}>Xác nhận</option>
                    <option value="6" {{ $o_status == 6 ? 'selected' : '' }}>Đang giao</option>
                    <option value="4" {{ $o_status == 4 ? 'selected' : '' }}>Thành công</option>
                    <option value="5" {{ $o_status == 5 ? 'selected' : '' }}>Thất bại</option>
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
                   <input type="search" name="s" id="s" class="form-control form-control-sm" placeholder="mã đơn hàng" aria-controls="datatable-buttons">
                </div>
              </div>
            </div>
          </form>
        </div>
        <hr class="hr-t">
        {{-- bảng giữ liệu --}}
        <div class="table-responsive mb-0" data-pattern="priority-columns">
          <table id="" class="table">
            <thead>
               <tr>
                  <th class="text-center"><i class="far fa-sun"></i></th>
                  <th data-priority="1" class="text-center">Đơn Hàng</th>
                  <th data-priority="2" class="text-center">Thành tiền</th>
                  <th data-priority="1" class="text-center">Khách hàng</th>
                  <th data-priority="1" class="text-center">Người tạo</th>
               </tr>
            </thead>
            <tbody>
              @forelse($orders as $item)
               <tr id="order_{{$item->id}}">
                  <td class="text-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true"> <i class="fas fa-cog"></i> </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                        {{-- chi tiết --}}
                        <a class="dropdown-item" href="{{route('administrator.order.detail',['id'=>base64_encode($item->id)])}}"><i class="fas fa-info text-info icon-action"></i> Chi Tiết</a>

                        {{-- đang giao hàng --}}
                        @if($item->status == 3)
                        <a class="dropdown-item" href="{{route('administrator.order.edit',['id'=>base64_encode($item->id)])}}"><i class="fas fa-truck icon-action animate__animated animate__bounce" style="color: #F9FFFA"></i>Giao Hàng</a>
                        @endif

                        {{-- giao thành công hoặc thất bại --}}
                        @if($item->status == 6)
                        <a class="dropdown-item" href="#"><i class="fas fa-check-double icon-action" style="color: #0acf97!important"></i>Thành Công</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-file-excel icon-action" style="color: #f1556c!important"></i></i>Thất Bại</a>
                        @endif

                        {{-- chỉnh sửa --}}
                        @if($item->status == 1 || $item->status == 2 || $item->status == 3)
                        <a class="dropdown-item" href="{{route('administrator.order.edit',['id'=>base64_encode($item->id)])}}"><i class="far fa-edit icon-action" style="color: #F4FA58"></i>Chỉnh Sửa</a>
                        @endif

                        {{-- trở lại --}}
                        @if($item->status == 2 || $item->status == 6)
                        <a class="dropdown-item" href="#"><i class="fas fa-undo icon-action"></i> Trở Lại</a>
                        @endif

                        {{-- xóa --}}
                        {{-- <a class="dropdown-item" href="#"><i class="far fa-trash-alt text-danger"></i> Xóa</a> --}}
                      </div>
                    </div>
                  </td>
                  </div>
                    <td class="text-center">
                    @php
                    $code = $item->code;
                    @endphp
                    @switch($item->status)
                      @case(1)
                        <p class="badge badge-light p-1 mb-0">{{$code}}</p>{{-- chưa xử lý --}}
                        @break
                      @case(2)
                        <p class="badge badge-warning p-1 mb-0">{{$code}}</p>{{-- đã hủy --}}
                        @break
                      @case(3)
                        <p class="badge badge-info p-1 mb-0">{{$code}}</p>{{-- xác nhận --}}
                        @break
                      @case(4)
                        <p class="badge badge-success p-1 mb-0">{{$code}}</p>{{-- giao thành công --}}
                        @break
                      @case(5)
                        <p class="badge badge-danger p-1 mb-0">{{$code}}</p>{{-- thất bại --}}
                        @break
                      @case(6)
                        <div class="badge badge-info p-1 mb-0">{{$code}}</div>{{-- đang giao hàng --}}
                        @break
                      @default
                    @endswitch
                    @if($item->status == 6)
                    <p class="mb-0 car-move animate__animated animate__backOutRight animate__infinite animate__slower">
                      delivered ...... <i class="fas fa-truck" style="font-size: 20px"></i>
                    </p>
                    @endif
                    <p class="mb-0">{{ $item->status_at->format('H:i d/m/Y') }}</p>
                  </td>
                  <td class="text-center">
                    <p class="mb-0">{{$item->price / 1000}}k VNĐ</p>
                    @php
                      $ship_fee = 'Freeship';
                      if($item->ship_fee != null){
                        $types_of_fee = json_decode($item->types_of_fee,true);
                        if(Arr::has($types_of_fee,"ufs")){
                          $ship_fee = 'Freeship';
                        }else{
                          $ship_fee = 'Phí ship : '.$item->ship_fee;
                        }
                      }
                    @endphp
                    <p class="mb-0 {{ $ship_fee == 'Freeship' ? 'badge badge-success p-1' : ''}}">{{ $ship_fee }}</p>
                  </td>
                  <td class="text-center">
                    @if($item->customer_id != null && $item->customer_id != "")
                      <p class="text-warning mb-0 text-uppercase">
                        <a class="hover_link" style="color:#f9bc0b!important" href="{{route('administrator.customer.detail',['id'=>base64_encode($item->customer->id)])}}">
                          {{ $item->customer->name }}
                        </a>
                      </p>
                      <p class="mb-0 text-warning">{{ $item->customer->phone }}</p>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($item->user_id != null && $item->user_id != "")
                      <p class="text-info mb-0 text-uppercase">{{ $item->user->name }}</p>
                    @else
                      <p class="text-warning mb-0 text-uppercase">{{ $item->customer->name }}</p>
                    @endif
                    <p class="mb-0">{{ $item->created_at->format('H:i d/m/Y') }}</p>
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
              {{ $orders->appends(request()->query())->links() }}
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('libs-scripts')
{{-- <script src="{{asset('admini/js/rwd-table.min.js')}}"></script> --}}
{{-- <script src="{{asset('admini/js/responsive-table.init.js')}}"></script> --}}
@endpush

@push('page-scripts')
<script type="text/javascript">
   $(document).ready(function() {

      $("#o_status").on('change', function(){
         $("#filterForm").submit();
      });

      $("#per").on('change', function(){
         $("#filterForm").submit();
      });

   });
</script>
@endpush
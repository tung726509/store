@extends('admin.layouts.app')

@push('libs-styles')
  <link href="{{asset('admini/css/select2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admini/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">

@endpush

@push('page-styles')
<style type="text/css">
  .money-form{
    border-style: dotted;
    border-width: thick;
  }
  .order-icon{
    top: 15%;
    right: 10px;
    background-color: white;
    border-radius: 50%;
    z-index: 1000;
    position: fixed;
  }
     
}
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Khách Hàng</a></li>
      <li class="breadcrumb-item active">Chi Tiết</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <div class="card pt-0 animate__animated animate__rollIn animate__faster">
      <div class="card-body">
        {{-- tt khách hàng và thống kê --}}
        <div class="row">
          <div class="col-12 col-md-4 col-xl-3 mt-3 offset-xl-1">
            <h4><i class="far fa-user"></i> TT khách hàng</h4>
            <div class="row">
              <div class="col-4">Tên :</div>
              <div class="col-8">
                <a class="direct-link" href="{{route('administrator.customer.edit',['id'=>base64_encode($customer->id)])}}"><span class="badge badge-success mb-1 p-1">{{$customer->name}}</span></a><br>
              </div>
              <div class="col-4">Ngày sinh :</div>
              <div class="col-8">
                <span class="badge badge-success mb-1 p-1">{{$customer->d_o_b != null ? $customer->d_o_b->format('d/m/Y') : '...'}}</span><br>
              </div>
              <div class="col-4">Số đt :</div>
              <div class="col-8">
                <span class="badge badge-success mb-1 p-1">{{$customer->phone}}</span><br>
              </div>
              <div class="col-4">Địa Chỉ :</div>
              <div class="col-8">
                <span class="badge badge-success mb-1 p-1">{{$customer->address}}</span><br>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8 col-xl-7 mt-3">
            <div class="float-left">
              <h4><i class="fas fa-chart-pie"></i> THỐNG KÊ ĐƠN HÀNG</h4>
              <div class="text-center mt-2 mb-4">
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
            </div>
          </div>
        </div>
        {{-- danh sách đơn hàng --}}
        <div class="row">
          <div class="col-md-12">
            <h4><i class="fas fa-print"></i> Danh sách đơn hàng</h4>
            <div class="table-responsive">
              <table class="table mt-2 mb-2">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Mã đơn hàng</th>
                    <th>Thành tiền</th>
                    <th>Người tạo</th>
                  </tr></thead>
                  <tbody>
                    @forelse($orders->load(['user','customer']) as $item)
                    <tr>
                      @php
                        $types_of_fee = json_decode($item->types_of_fee,true);
                      @endphp
                      <td>{{$loop->iteration}}</td>
                      <td>
                        @php
                        $code = $item->code;
                        @endphp
                        <a class="direct-link" href="{{route('administrator.order.detail',['id'=>base64_encode($item->id)])}}">
                        @switch($item->status)
                          @case(1){{-- chưa xử lý --}}
                            <p class="badge badge-light p-1 mb-0">{{$code}}</p>
                            @break
                          @case(2){{-- đã hủy --}}
                            <p class="badge badge-warning p-1 mb-0">{{$code}}</p>
                            @break
                          @case(3){{-- xác nhận và đang giao --}}
                            <p class="badge badge-info p-1 mb-0">{{$code}}</p>
                            @break
                          @case(4){{-- giao thành công --}}
                            <p class="badge badge-success p-1 mb-0">{{$code}}</p>
                            @break
                          @case(5){{-- thất bại --}}
                            <p class="badge badge-danger p-1 mb-0">{{$code}}</p>
                            @break  
                          @default
                        @endswitch
                        </a>
                        <P>{{ $item->status_at->format('H:i:s d-m-Y') }}</P>
                      </td>
                      <td class="product-total" data-value="{{$item->price}}">
                        {{ modifierVnd($item->price != null ? $item->price : 0,' VNĐ') }}
                        @php
                          if(Arr::has($types_of_fee,"utd"))
                            $text = 'Chuyển khoản';
                          else
                            $text = 'Tiền mặt';

                          if($item->payed_at != null)
                            $time = $item->payed_at;
                          else
                            $time = '';
                        @endphp
                        <p class="pay-type-text {{ $time == '' ? 'text-secondary' : 'text-success' }}">{!! $time == '' ? '' : '<i class="fas fa-check-circle"></i>' !!} {{ $text }}</p>

                      </td>
                      <td>
                        @if($item->user_id != null)
                          <p class="text-info mb-0 text-uppercase">{{$item->user->name}}</p>
                        @else
                          <p class="text-warning mb-0 text-uppercase">{{$item->customer->name}}</p>
                        @endif
                        <p>{{ $item->created_at->format('H:i:s d-m-Y') }}</p>
                      </td>
                    </tr>
                    @empty
                      
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
        {{-- tổng tiền --}}
        <div class="row">
          <div class="col-12 col-md-5 offset-md-7 col-xl-4 offset-xl-8 money-form">
            <div class="form-row">
              <div class="col-12 col-md-12">
                <h5 class="">
                  <i class="fe-tag"></i> Tổng đơn hàng : {{ $total_orders_money }}
                </h5>
                <h5 class=""><i class="fas fa-check-double icon-action text-success"></i> Giao thành công : {{ $total_money_success }}</h5>
                <h5 class=""><i class="fas fa-hand-holding-usd icon-action" style="color: #4f50d6"></i> Thực nhận : {{ $total_payed }}</h5>
                <h4 class=""><i class="fas fa-check icon-action text-warning"></i> Còn lại : {{ $not_pay }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 	</div>
</div>
@endsection

@push('libs-scripts')
  <script src="{{asset('admini/js/select2.min.js') }}"></script>
@endpush

@push('page-scripts')
  <script type="text/javascript">

  </script>
@endpush
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
      <li class="breadcrumb-item"><a href="#">Đơn Hàng</a></li>
      <li class="breadcrumb-item active">Chi Tiết</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
 	<div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <div class="card pt-0 animate__animated animate__rollIn animate__faster">
      <div class="card-body pt-0">
        <div class="row">
          <div class="col-12 col-md-5 mt-3">
            <div class="float-left">
              <h4>Đơn Hàng {{$order->id}} &nbsp;&nbsp;<span class="text-info"><a style="display: inline-block;" href="{{route('administrator.order.edit',['id'=>base64_encode($order->id)])}}"><i class="fas fa-pencil-alt"></i> {{$order->code}}</a></span></h4>
              <p class="m-0">Tạo Đơn : <span class="{{$order->user_id != null ? 'text-info':'text-warning'}}">{{$order->user_id != null ? $order->user->name : 'khách hàng'}}</span><span>{{' ( '.$order->created_at->format('H:i | d-m-Y').' )'}}</span></p>
              <p class="m-0">Xuất Đơn : <span class="{{$order->export_by != null ? 'text-info':'badge badge-light pl-1 pr-1'}}">{{$order->export_by != null ? $order->confirm_by->name : '...'}}</span><span>{{$order->export_at != null ? ' ( '.$order->export_at->format('H:i | d-m-Y').' )' : ''}}</span></p>
              <p class="m-0">Trạng Thái :
                @switch($order->status)
                  @case(1)
                    <span class="badge badge-light pl-1 pr-1 mb-0">Chưa xử lý</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    @break
                  @case(2)
                    <span class="badge badge-warning pl-1 pr-1 mb-0">Đã hủy</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    @break
                  @case(3)
                    <span class="badge badge-info pl-1 pr-1 mb-0">Xác nhận</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    @break
                  @case(4)
                    <span class="badge badge-success pl-1 pr-1 mb-0">Giao thành công</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    @break
                  @case(5)
                    <span class="badge badge-danger pl-1 pr-1 mb-0">Giao thất Bại</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    @break  
                  @case(6)
                    <span class="badge badge-danger pl-1 pr-1 mb-0">Đang giao hàng</span>
                    <span>{{'( '.$order->status_at->format('H:i | d-m-Y').' )'}}</span>
                    <i class="fas fa-truck" style="font-size: 20px"></i>
                    @break  
                  @default
                @endswitch
              </p>
              @if($order->status == 5)
              <p class="m-0">Lý Do : {{$order->reason}}</p>
              @endif
            </div>
          </div>
          <div class="col-8 col-md-4 mt-3"> 
              <h4>TT khách hàng</h4>
              <div class="row">
                <div class="col-4">Tên :</div>
                <div class="col-8">
                  <a href="{{route('administrator.customer.detail',['id'=>base64_encode($order->customer->id)])}}"><span class="badge badge-success mb-1 p-1">{{$order->customer->name}}</span></a><br>
                </div>
                <div class="col-4">Ngày sinh :</div>
                <div class="col-8">
                  <span class="badge badge-success mb-1 p-1">{{$order->customer->d_o_b != null ? $order->customer->d_o_b->format('d/m/Y') : '...'}}</span><br>
                </div>
                <div class="col-4">Số đt :</div>
                <div class="col-8">
                  <span class="badge badge-success mb-1 p-1">{{$order->customer->phone}}</span><br>
                </div>
                <div class="col-4">Địa Chỉ :</div>
                <div class="col-8">
                  <span class="badge badge-success mb-1 p-1">{{$order->customer->address}}</span><br>
                </div>
              </div>
          </div>
          <div class="col-4 col-md-3 mt-3 p-0">
            <h5>QR Đơn Hàng</h5>
              <p>
                {!! QrCode::margin(1)->size(100)->generate(route('administrator.order.detail',['id'=>base64_encode($order->id)])) !!}
              </p>
          </div>
        </div>
        {{-- sản phẩm trong đơn --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mt-2 mb-2">
                        <thead>
                        <tr><th>#</th>
                            <th>Sản Phẩm</th>
                            <th>SL</th>
                            <th>Giá</th>
                            <th>Discount</th>
                            <th class="text-right">Tổng</th>
                        </tr></thead>
                        <tbody>
                          @forelse($order_items->where('quantity','>',0)->load(['product']) as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <b>{{ $item->product->pretty_name }}</b>
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price/1000 }}k VNĐ</td>
                            <td>{{ $item->discount }}</td>
                            <td class="text-right product-total text-info" data-product-total="{{ ($item->quantity * $item->price) * ((100-$item->discount)/100) }}">
                              {{ (($item->quantity * $item->price) * ((100-$item->discount)/100))/1000 }}k VNĐ
                            </td>
                          </tr>
                          @empty

                          @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- note --}}
        <div class="row">
          <div class="col-12 col-md-5 offset-md-7 col-xl-4 offset-xl-8 money-form">
            @if($ubd != null)
            <div class="form-row">
              <div class="checkbox checkbox-success checkbox-circle">
                <input class="checkbox-birthday" id="checkbox110" type="checkbox" disabled="" checked="" name="checkbox_birthday">
                <label for="checkbox110">Giảm giá {{$ubd}}% trong tháng sinh nhật khách .</label>
              </div>
            </div>
            @endif
            @if($ufs != null)
            <div class="form-row">
              <div class="checkbox checkbox-success checkbox-circle">
                <input class="checkbox-freeship" id="checkbox-10" type="checkbox" disabled="" checked="" data-status="on" name="checkbox_freeship">
                <label for="checkbox-10">Đang bật FREESHIP cho đơn hàng trên {{ $ufs/1000 }}k</label>
              </div>
            </div>
            @endif
            <div class="form-row">
              <div class="col-4">
                <div class="clearfix">
                  <h4 class="text-warning">Notes:</h4>
                  <p>{{$order->note}}</p>
                </div>
              </div>
              <div class="col-8 mt-2">
                <div class="float-right">
                  <p class="mb-0"><b>Tạm Tính : </b><span id="provisional" data-value=""></span>k VNĐ</p>
                  @if($ubd != null && $ubd != '')
                  <p class="mb-0"><b>Sinh Nhật : </b>giảm <span id="sale_d_o_b" data-value="{{$ubd}}">{{$ubd}}</span>%</p>
                  @endif
                  @if($ufs != null && $ufs != '')
                  <p class="mb-0"><b>Phí Ship : </b>
                    <span id="ship_cost" data-value="{{$ship_fee != null ? $ship_fee : 0}}">
                      @if($ship_fee != null && $ship_fee != "")
                        <del class="text-muted">{{ $ship_fee/1000 }}k VNĐ</del>
                      @else
                        Free ship
                      @endif
                    </span>
                  </p>
                  @else
                  <p class="mb-0"><b>Phí Ship : </b>
                    <span id="ship_cost" data-value="{{$ship_fee != null ? $ship_fee : 0}}">
                      @if($ship_fee != null && $ship_fee != "")
                        {{ $ship_fee/1000 }}k VNĐ
                      @else
                        Free ship
                      @endif
                    </span>
                  </p>
                  @endif
                  <h4 class="text-info">Tổng : <span id="order_total"></span>k VNĐ</h4>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12 pt-3 pr-1">
            <div class="text-right d-print-none float-right">
              <a href="#" class="btn btn-blue waves-effect waves-light p-2"><i class="fa fa-print mr-1"></i> Print</a>
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
  $(document).ready(function() {
    var update_money_form = () => {
      let provisional = 0;
      let sale_d_o_b = 0;
      let ship_cost = {{ $ship_fee != null ? $ship_fee : 0 }};
      $(".product-total").each(function(index,el){
        provisional += parseInt($(this).data('product-total'));
      });
      $('#provisional').data('value',provisional).text(provisional/1000);
      
      @if($ubd != null && $ubd != '')
        sale_d_o_b = parseInt($('#sale_d_o_b').data('value'));
      @endif

      @if($ufs != null && $ufs != '')
        ship_cost = 0;
      @else
      @endif

      let order_total = provisional * ((100 - sale_d_o_b) / 100) + ship_cost;
      console.log(provisional,sale_d_o_b,ship_cost);
      $("#order_total").text(order_total/1000);
    }

    update_money_form();
  });
</script>
@endpush
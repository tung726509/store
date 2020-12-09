@extends('admin.layouts.app')

@push('libs-styles')
  <link href="{{asset('admini/css/select2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admini/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('admini/css/switchery-text.min.css')}}" rel="stylesheet"/>
  <link href="{{asset('admini/css/jquery-ui.min.css')}}" rel="stylesheet"/>
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
    .order-icon:hover {
      border: 2px solid;
      box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
      outline-color: rgba(255, 255, 255, 0);
      outline-offset: 15px;
      text-shadow: 1px 1px 2px #427388;
    }
    .block{
      display: inline-block;
    }
    .hoverine:hover{
      text-decoration: underline;
    }
    .text-validate{
      font-size: .75rem;
      color : #f1556c;
    }
    .switchery {
      width: 200px;    
    }
    .switchery:before {
      content: 'Chưa thanh toán';
      color: black;
      position: absolute;
      left: 60px;
      top: 50%;
      -webkit-transform: translateY(-50%);
              transform: translateY(-50%);
    }
    .js-switch:checked + .switchery:before {
      color: white;
      left: 43px;
      content: 'Đã thanh toán';
    }
  </style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Đơn Hàng</a></li>
      <li class="breadcrumb-item active">Chỉnh Sửa</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-12 p-0">
    @include('admin.includes.form-alert')
    @if($products->isEmpty())
    <div class="card animate__animated animate__rollIn animate__faster">
        <div>Danh sách sản phẩm trống . Vui lòng <span class="btn btn-primary btn-sm"><a href="{{route('administrator.product.add')}}">Thêm mới</a></span> sản phẩm .</div>
    </div>
    @else
    <div class="card pl-1 pr-1 pt-3 pb-3 animate__animated animate__rollIn animate__faster">
        <h4 class="header-title">
          <i class="fas fa-print" aria-hidden="true"></i> CHỈNH SỬA ĐƠN HÀNG {{$order->id}}
          <a href="{{route('administrator.order.detail',['id'=>base64_encode($order->id)])}}"><span class="text-info pl-2 pt-1 hoverine direct-link">#{{$order->code}}</span></a>
          <span class="text-info pl-2 pt-1 hoverine" id="customer_edit"><i class="fas fa-pencil-alt"></i> {{$order->customer->name}}</span>
        </h4>
        <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
        <form method="post" action="{{ url()->current()}}" id="editForm">
         @csrf
          {{-- nhập thông tin đơn hàng --}}
          <div class="form-row">
            {{-- phone --}}
            <div class="form-group col-6 col-sm-6 col-md-6">
              <label for="phone" class="col-form-label">Số đt <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror {{$order->customer->phone != null ? 'parsley-success':''}}" id="phone" name="phone" placeholder="Nhập sđt" value="{{old('phone',$order->customer->phone != null ? $order->customer->phone:'')}}" required>
              @error('phone')
                <p class="text-validate mb-1" id="t_valid_phone">{{ $message }}</p>
              @enderror
            </div>

            {{-- ten kh --}}
            <div class="form-group col-6 col-sm-6 col-md-6">
              <label for="name" class="col-form-label">Tên <span class="text-danger">*</span></label>
              <input type="text" class="form-control @error('name') is-invalid @enderror {{$order->customer->name != null ? 'parsley-success':''}}" id="name" name="name" placeholder="Nhập tên" value="{{old('name',$order->customer->name != null ? $order->customer->name:'')}}" required readonly>
              @error('name')
                <p class="text-validate mb-1" id="t_valid_name">{{ $message }}</p>
              @enderror
            </div>

            {{-- sinh nhật --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="d_o_b" class="col-form-label">Ngày sinh <span class="small text-info">(tháng/ngày/năm)</span></label>
              <div class="input-group">
                <input type="text" class="form-control @error('d_o_b') is-invalid @enderror {{$order->customer->d_o_b != null ? 'parsley-success':''}}" placeholder="mm/dd/yyyy" id="d_o_b" name="d_o_b" value="{{old('d_o_b',$order->customer->d_o_b != null ? $order->customer->d_o_b->format('m/d/Y'):'')}}" disabled>
                <input type="hidden" name="d_o_b_1" value="{{old('d_o_b',$order->customer->d_o_b != null ? $order->customer->d_o_b->format('m/d/Y'):'')}}">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
              @error('d_o_b')
                <p class="text-validate mb-1" id="t_valid_d_o_b">{{ $message }}</p>
              @enderror
            </div>

            {{-- địa chỉ --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="address" class="col-form-label">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="text" class="form-control @error('address') is-invalid @enderror {{$order->address != null ? 'parsley-success':''}}" id="address" name="address" placeholder="Nhập địa chỉ" value="{{old('address',$order->address != null ? $order->address:'')}}" data-address="{{$order->customer->address != null ? $order->customer->address:''}}" required>
                <div class="input-group-append">
                  <button class="btn btn-dark waves-effect waves-light btn-address-default" type="button">Mặc định</button>
                </div>
              </div>
              @error('address')
                <p class="text-validate mb-1" id="t_valid_address">{{ $message }}</p>
              @enderror
            </div>

            {{-- ngày xuất đơn --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="date" class="col-form-label">Ngày xuất đơn <span class="text-danger">*</span> <span class="small text-info">(tháng/ngày/năm)</span></label>
              <div class="input-group">
                <input type="text" class="form-control @error('date') is-invalid @enderror parsley-success" placeholder="mm/dd/yyyy" id="date" name="date" value="{{ $order->export_at == null ? date('m/d/Y',strtotime($now)) : date('m/d/Y',strtotime($order->export_at)) }}" required>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                </div>
              </div>
              @error('date')
                <p class="text-validate mb-1" id="t_valid_date">{{ $message }}</p>
              @enderror
            </div>

            {{-- phí ship --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Phí ship <span class="small text-info">( không nhập mặc định sẽ là FREE SHIP )</span></label>
              <div class="input-group">
                <input type="number" class="form-control @error('cost') is-invalid @enderror {{old('d_o_b',$order->ship_fee != null ? 'parsley-success':'')}}" placeholder="" id="cost" name="cost" value="{{old('ship_fee',$order->ship_fee != null ? $order->ship_fee:'')}}">
              </div>
              @error('cost')
                <p class="text-validate mb-1" id="t_valid_cost">{{ $message }}</p>
              @enderror
            </div>

            {{-- hình thức chuyển khoản --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Hình thức thanh toán</label>
              <select class="form-control select2 select-pay-type" data-style="btn-light" name="pay_type" data-type="{{ $utd == null ? 'cash' : 'transfer'}}" data-value="{{$utd != null ? $utd : '0'}}" required>
                <option value="cash" {{ $utd == null ? 'selected' : '' }} data-value="0">Tiền mặt</option>
                @if($use_transfer_discount['key'] == 1)
                  <option value="transfer" {{ $utd != null ? 'selected' : '' }} data-value="{{ $use_transfer_discount['value'] }}">Chuyển khoản</option>
                @else
                  @if($utd != null)
                    <option value="transfer" {{ $utd != null ? 'selected' : '' }} data-value="{{ $use_transfer_discount['value'] }}">Chuyển khoản</option>
                  @else
                    <option value="transfer" disabled>Chuyển 
                     (khóa)</option>
                  @endif
                @endif
              </select>
            </div>

            {{-- xác nhận thanh toán --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Xác nhận thanh toán</label>
              <div class="row m-0 text-center">
                <input type="checkbox" class="js-switch confirm-pay-checkbox" name="confirm-pay" {{ $order->payed_at != null ? 'checked' : ''}}>
              </div>
            </div>

            {{-- note --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="note" class="col-form-label">Note </label>
              <textarea class="form-control @error('note') is-invalid @enderror {{old('note',$order->note != null ? 'parsley-success':'')}}" rows="1" id="note" name="note">{{old('note',$order->note != null ? $order->note:'')}}</textarea>
              @error('note')
                <p class="text-validate mb-1" id="t_valid_note">{{ $message }}</p>
              @enderror
            </div>

            {{-- kho hàng --}}
            <div class="form-group col-12 col-sm-6 col-md-6">
              <label for="cost" class="col-form-label">Kho hàng <span class="text-danger">*</span> <span class="text-danger d-none alert-wh text-uppercase">Không đủ cho đơn hàng</span></label>
              <select class="form-control select2 select-warehouse" data-style="btn-light" name="warehouse_id" required>
                <option value="">-- Chọn --</option>
                @forelse($warehouses as $item)
                <option value="{{ $item->id }}" {{$order->warehouse_id == $item->id ? 'selected':''}}>
                  <span class="text-uppercase">{{ $item->name }}
                </option>
                @empty
                @endforelse
              </select>
            </div>

            {{-- thông báo kho hàng có phú hợp với đơn hàng --}}
            @if($order->status != 1)
              <div class="form-group col-12 col-md-12 col-sm-12 text-right mb-0">
                <button type="submit" class="btn btn-primary update-order text-center" name="btn_update_1">Cập nhật</button>
              </div>
            @endif

            {{-- phần sản phẩm trong đơn hàng --}}
            <div class="form-group col-12 btn-add-pf">
              @if($order->status != 6)
                <p class="mb-1 mt-3 font-weight-bold text-uppercase">Thêm sản phẩm vào đơn hàng</p>
              @endif
              {{-- column title --}}
              <div class="form-row colunm-title-product d-none">
                <div class="form-group col-5">
                  <p class="mb-0">Sản phẩm</p>
                </div>
                <div class="form-group col-3">
                  <p class="mb-0">SL</p>
                </div>
                <div class="form-group col-2">
                  <p class="mb-0"><i class="fas fa-arrow-down"></i> %</p>
                </div>
                <div class="form-group col-1">
                </div>
              </div>
              {{-- danh sách sản phẩm và số lượng --}}
              <div id="products_wrapper" class="d-none">
                @if($order->warehouse_id != null)
                    @forelse($order_items->where('quantity','>',0)->load(['product']) as $item)
                        <div class="form-row">
                          {{-- chọn sản phẩm --}}
                          <div class="form-group col-5">
                            <select class="form-control select2 select-product" data-style="btn-light" name="product_id[]" required>
                              <option value="">-- Chọn --</option>
                              @forelse($warehouse_selected->wh_items as $wh_item)
                                <option value="{{ $wh_item->product_id }}" data-discount="{{ $wh_item->product_id == $item->product_id ? $item->discount : $wh_item->product->discount }}" data-price="{{ $item->price }}" data-inventory="{{ $wh_item->quantity }}" {{ $wh_item->product_id == $item->product_id ? 'selected' : '' }}>
                                  <span class="text-uppercase">{{ $wh_item->product->pretty_name }} - Tồn kho : {{ $wh_item->quantity }}
                                </option>
                              @empty
                              @endforelse
                            </select>
                          </div>
                          {{-- số lượng --}}
                          <div class="form-group col-3">
                            <input type="number" class="form-control p-1 quantity" name="quantity[]" required placeholder="Nhập số" min="1" max="" value="{{ $item->quantity }}" data-discount="{{ $item->discount }}" data-price="{{ $item->price }}" data-total="{{ ($item->quantity * $item->price)*((100 - $item->discount)/100) }}">
                          </div>
                          {{-- discount --}}
                          <div class="form-group col-2">
                            <input type="number" class="form-control p-1 discount" name="discount[]" required placeholder="" min="1" max="100" value="{{ $item->discount }}" readonly>
                            <input type="hidden" class="form-control p-1 price" name="price[]" required value="{{ $item->price }}">
                          </div>
                          <div class="form-group col-1">
                            <button type="button" class="btn btn-danger waves-light waves-effect remove-product-field"><i class="fas fa-minus"></i></button>
                          </div>
                        </div>
                    @empty
                    @endforelse
                @endif
              </div>
              {{-- thêm mới trường sản phẩm --}}
              @if($order->status != 6)
                <div class="form-row">
                  <div class="form-group col-12">
                    <button type="button" class="btn btn-info waves-light waves-effect mt-35 add-product-field pl-3 pr-3"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              @endif
            </div>
          </div>

          {{-- thành tiền --}}
          <div class="form-row pl-2 pr-2 create-order d-none">
            <div class="form-group col-12 col-md-12 col-sm-12">
              @if($use_birth_discount['key'] == 1)
                <div class="form-row">
                  <div class="checkbox checkbox-success checkbox-circle">
                    <input class="checkbox-birthday" id="checkbox110" type="checkbox" disabled="" checked="" name="checkbox_birthday">
                    <label for="checkbox110">Giảm giá {{$use_birth_discount['value']}}% trong tháng sinh nhật khách .</label>
                  </div>
                </div>
              @endif
              @if($use_transfer_discount['key'] == 1)
                <div class="form-row">
                  <div class="checkbox checkbox-success checkbox-circle">
                    <input class="checkbox-birthday" id="checkbox110" type="checkbox" disabled="" checked="" name="checkbox_birthday">
                    <label for="checkbox110">Giảm giá {{$use_transfer_discount['value']}}% cho khách hàng chuyển khoản .</label>
                  </div>
                </div>
              @endif
              @if($use_free_ship['key'] == 1)
                <div class="form-row">
                  <div class="checkbox checkbox-success checkbox-circle">
                    <input class="checkbox-freeship" id="checkbox-10" type="checkbox" disabled="" checked="" data-status="on" name="checkbox_freeship">
                    <label for="checkbox-10">Đang bật FREESHIP cho đơn hàng trên {{ $use_free_ship['value']/1000 }}k</label>
                  </div>
                </div>
              @endif
            </div>
            <div class="form-group col-12 col-md-9 col-sm-12 money-form">
              <p class="h5 text-center">Tạm Tính : <span id="provisional"></span></p>
              <p class="h5 text-center d-none">Sinh Nhật : giảm <span id="sale_d_o_b" data-birth="false"></span>%</p>
              <p class="h5 text-center d-none">Chuyển khoản : giảm <span id="sale_transfer" data-transfer="false"></span>%</p>
              <p class="h5 text-center">Phí Ship : <span id="ship_cost"></span></p>
              <p class="h3 text-center text-info">Tổng Tiền : <span id="order_total"></span></p>
            </div>
            <div class="form-group col-12 col-md-3 col-sm-12 text-right mb-0 text-center pt-3">
              <input type="hidden" name="arr_ois_origin" value="{{ $arr_ois_origin }}">
              <button type="submit" class="btn btn-primary create-order d-none text-center p-3 update-order" name="btn_update_2">Cập nhật</button>
            </div>
          </div>
        </form>
    </div>
    @endif
  </div>
</div>

{{-- icon mở thông tin đơn hàng --}}
<div class="order-icon-parent">
  <img src="{{asset('admini/images/order-icon.png')}}" id="fixed_order" class="order-icon">
</div>

{{-- modal chỉnh sửa thông tin khách hàng --}}
<div class="modal fade" id="customerEditModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
       <div class="modal-content">
          <div class="modal-body">
            <div class="card-box">
              <h4 class="header-title">CHỈNH SỬA KHÁCH HÀNG <span class="text-info modal-header-customer-name">#{{ $order->customer->name }}</span></h4>
              <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
                <div class="form-row">
                      {{-- ten kh --}}
                      <div class="form-group col-12 col-sm-6 col-md-6 mb-1">
                        <label for="name" class="col-form-label">Tên khách hàng <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{$order->customer->name != null ? 'parsley-success':''}}" id="name_m" name="name_m" placeholder="Nhập tên" value="{{old('name',$order->customer->name != null ? $order->customer->name:'')}}" required>
                        <p class="text-validate mb-0" id="tv_name_m"></p>
                      </div>

                      {{-- sđt --}}
                      <div class="form-group col-12 col-sm-6 col-md-6 mb-1">  
                        <label for="phone" class="col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{$order->customer->phone != null ? 'parsley-success':''}}" id="phone_m" name="phone_m" placeholder="Nhập sđt" value="{{old('phone',$order->customer->phone != null ? $order->customer->phone:'')}}" required>
                        <p class="text-validate mb-0" id="tv_phone_m"></p>
                      </div>

                      {{-- sinh nhật --}}
                      <div class="form-group col-12 col-sm-6 col-md-6 mb-1">
                        <label for="d_o_b" class="col-form-label">Ngày sinh <span class="small text-info">(tháng/ngày/năm)</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control {{$order->customer->d_o_b != null ? 'parsley-success':''}}" placeholder="mm/dd/yyyy" id="d_o_b_m" name="d_o_b_m" value="{{old('d_o_b',$order->customer->d_o_b != null ? $order->customer->d_o_b->format('m/d/Y'):'')}}">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                          </div>
                        </div>
                        <p class="text-validate mb-0" id="tv_d_o_b_m"></p>
                      </div>

                      {{-- địa chỉ --}}
                      <div class="form-group col-12 col-sm-6 col-md-6 mb-1">
                        <label for="address" class="col-form-label">Địa chỉ nhận hàng <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{$order->customer->address != null ? 'parsley-success':''}}" id="address_m" name="add
                        ress_m" placeholder="Nhập địa chỉ" value="{{old('address',$order->customer->address != null ? $order->customer->address:'')}}" required>
                        <p class="text-validate mb-0" id="tv_address_m"></p>
                      </div>
                </div>
                <div class="form-group text-right mb-0">
                  <button type="submit" class="btn btn-primary btn-customer-edit">Lưu</button>
                </div>
            </div>
          </div>
       </div>
   </div>
</div>

{{-- modal thông tin khách hàng và đơn hàng --}}
<div class="modal fade" id="orderDetailModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
       <div class="modal-content">
          <div class="modal-header">
             <div class="">
                <h4 class="modal-title">Đơn Hàng <span class="text-info">#{{$order->code}}</span></h4>
                <p class="text-small text-muted mb-0">Khách Hàng : {{$order->customer->name != null ? $order->customer->name : ''}}</p>
                <p class="text-small text-muted mb-0">SĐT : {{$order->customer->phone != null ? $order->customer->phone : ''}}</p>
                <p class="text-small text-muted mb-0">Địa Chỉ : {{$order->address != null ? $order->address : ''}}</p>
                <p class="text-small text-muted mb-0">Ngày Tạo : {{$order->created_at != null ? $order->created_at->format('m-d-Y') : ''}}</p>
             </div>
          </div>
          <div class="modal-body">
                <div class="row">
                   <div class="col-12">
                    <table class="table mb-0 table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">Sản phẩm</th>
                          <th class="text-center">SL</th>
                          <th class="text-center">Giá</th>
                          <th class="text-center">Giảm</th>
                          <th class="text-center">Thành tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($order_items->where('quantity','>',0)->load(['product']) as $item)
                        <tr>
                          <td class="text-center text-uppercase text-info p-1">
                            {{$item->product->pretty_name}}<br>
                            {{-- <p class="text-muted mb-0">Giá : <span class="text-lowercase">{{ modifierVnd($item->product->price) }}</span></p> --}}
                          </td>
                          <td class="text-center">{{$item->quantity}}</td>
                          <td class="text-center">{{ modifierVnd($item->price) }}</td>
                          <td class="text-center">{{$item->discount}}%</td>
                          <td class="text-center pl-1 pr-1">{{ modifierVnd(($item->quantity*$item->price)*((100-$item->discount)/100)) }}</td>
                        </tr>
                        @empty
                        <p>Đơn Hàng Trống</p>
                        @endforelse
                      </tbody>
                    </table>
                   </div>
                </div>
          </div>
          <div class="pt-1 pb-2 pl-3 pr-3" style="border-top: 1px solid #394452">
            @if($ubd != null)
            <h6 class="">Sinh nhật : giảm {{ $ubd }}% </h6>
            @endif
            <h6 class="">Phí ship : {{ $ufs != null ? 'Free ship':($order->ship_fee != null ? (($order->ship_fee/1000).'k VNĐ'):'Free ship') }} </h6>
            <h4 class="text-info">Tổng : {{ modifierVnd($order->price,' VNĐ') }}</h4>
          </div>
       </div>
   </div>
</div>
@endsection

@push('libs-scripts')
  <script src="{{asset('admini/js/select2.min.js')}}"></script>
  <script src="{{asset('admini/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('admini/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('admini/js/switchery-text.min.js')}}"></script>
  <script src="{{asset('admini/js/jquery-ui.min.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
  jQuery(document).ready(function($){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var ele = document.querySelector('.confirm-pay-checkbox');
    var init = new Switchery(ele);
    var phone_list = [];

    @if($phone_list != null)
      var phone_list_string = '{{ $phone_list }}';
      var phone_list = phone_list_string.split(',');
    @endif

    $( "#phone" ).autocomplete({
      source: phone_list
    });

    // load giá trị max cho input nhập số lượng của các sản phẩm đã cố trong đơn hàng
    var setAttrMaxInputQuantity = () => {
      $('.quantity').each(function(index, el) {
        let max = $(this).parent().parent().find('.select-product option:selected').data('inventory');
        $(this).attr('max',max);
      });
    }
    setAttrMaxInputQuantity();

    // bỏ submit form khi click enter
    $('#editForm').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) { 
        e.preventDefault();
        return false;
      }
    });

    // đăng ký các elemet genarate bởi js
    $( "#d_o_b" ).datepicker();
      $( "#date" ).datepicker();
      $( "#d_o_b_m" ).datepicker();
      $('.select-warehouse').select2();
      $('.select-product').select2();

    // update giảm giá lúc load trang
    let now = new Date();
      let month = now.getMonth();
      let m_o_b = parseInt({{ $m_o_b }});
      if(m_o_b != null && m_o_b != ''){
        if(m_o_b == month + 1){
          $("#sale_d_o_b").data("birth",true);
          $("#sale_d_o_b").parent().removeClass('d-none');
        }else{
          $("#sale_d_o_b").data("birth",false);
          $("#sale_d_o_b").parent().addClass('d-none');
        }
      }

    // check phone exist
    var checkPhoneAjax = (phone) => {
      if(phone){
        $.ajax({
          url: '{{route('administrator.order.check_phone_ajax')}}', 
          type: 'post',
          data: {phone:phone},
        })
        .done(function(res){
          if(res.success){
            if(res.message == 'exist'){
              // Swal.fire(`Khách ${res.info['name']}`);
              $("input[name=name]").val(res.info['name']).addClass('parsley-success').attr('readonly', true);
              $("input[name=address]").val(res.info['address']).attr('data-address',res.info['address']).addClass('parsley-success').attr('readonly', false);
              $("input[name=d_o_b]").val(res.info['d_o_b']).addClass('parsley-success').attr('disabled', true);
              $("input[name=phone]").addClass('parsley-success');
              let now = new Date();
              let month = now.getMonth();
              if(res.info['d_o_b'] != null && res.info['d_o_b'] != ""){
                if(res.info['m_o_b'] == month+1){
                  $("#sale_d_o_b").data("birth",true);
                }else{
                  $("#sale_d_o_b").data("birth",false);
                }
              }else{
                $("#sale_d_o_b").data("birth",false);
              }
            }else if(res.message == 'null'){
              $("input[name=name]").val('').removeClass('parsley-success').attr('readonly', false);
              $("input[name=address]").val('').data('address','').removeClass('parsley-success').attr('readonly', false);
              $("input[name=d_o_b]").val('').removeClass('parsley-success').attr('disabled', false);
              $("input[name=phone]").addClass('parsley-success');
              $("#sale_d_o_b").data("birth",false);
              $("#sale_d_o_b").parent().addClass('d-none');
            }
            update_money_form();
          }
        })
      }else{

      }
    }

    // update money form
    var update_money_form = () => {
        // update tạm tính
        let sum = 0;
        $('.quantity').each(function(){
          sum += parseInt($(this).data('total'));
        });
        $("#provisional").data('value',sum).text(modifierVnd(sum));

        // update phí ship
          let cost = parseInt($("#cost").val());
          let ship_cost = 'Free ship';
          if(cost){
            ship_cost = (cost/1000)+"k";
          }else{
            cost = 0;
          }
        
        // freeship cho đơn hàng trên xxxk
          @if($use_free_ship['key'] == 1)
            let order_max = parseInt({{ $use_free_ship['value'] }});
            let check_freeship_status = $(".checkbox-freeship").data('status');
            if(sum >= order_max){
              ship_cost = 'Free ship';
              cost = 0;
            }
          @endif
          $("#ship_cost").data('value',cost).text(ship_cost);

        // update sinh nhật
          let status_birth = $("#sale_d_o_b").data('birth');
          let birth_discount = 0;
          if(status_birth == true){//là sinh nhật
            @if($use_birth_discount['key'] == 1)// bật giảm giá sinh nhật
              birth_discount = parseInt({{ $use_birth_discount['value'] }});
              $("#sale_d_o_b").parent().removeClass('d-none');
              {{-- $("#sale_d_o_b").data('birth-discount',{{$use_birth_discount['value']}}).text({{ $use_birth_discount['value'] }}); --}}
              $("#sale_d_o_b").text(birth_discount);
            @elseif($use_birth_discount['key'] == 0)//tắt giảm giá sinh nhật
              $("#sale_d_o_b").parent().addClass('d-none');
              {{-- $("#sale_d_o_b").data('birth-discount',0).text({{ $use_birth_discount['value'] }}); --}}
              {{-- $("#sale_d_o_b").text({{ $use_birth_discount['value'] }}); --}}
            @endif
          }else if(status_birth == false){//ko là sinh nhật
            $("#sale_d_o_b").parent().addClass('d-none');
            {{-- $("#sale_d_o_b").data('birth-discount',0).text({{ $use_birth_discount['value'] }}); --}}
            {{-- $("#sale_d_o_b").text({{ $use_birth_discount['value'] }}); --}}
          }

        // update chuyển khoản
          let status_transfer = $(".select-pay-type").attr('data-type');
          let transfer_discount = 0;
          if(status_transfer == 'transfer'){//là chuyển khoản
            @if($use_transfer_discount['key'] == 1)// bật giảm giá nếu chuyển khoản
              transfer_discount = parseInt($('.select-pay-type').data('value'));
              $("#sale_transfer").parent().removeClass('d-none');
              $("#sale_transfer").text(transfer_discount);
            @elseif($use_transfer_discount['key'] == 0)//tắt giảm giá chuyển khoản
              $("#sale_transfer").parent().addClass('d-none');
              // $("#sale_transfer").text(transfer_discount);
            @endif
          }else if(status_transfer == 'cash'){// tiền mặt
            $("#sale_transfer").parent().addClass('d-none');
            // $("#sale_transfer").text(transfer_discount);
          }

        // total money
        let order_total = 0;
        let money_bd = 0;
        let money_td = 0;
        // tính ra số tiền giảm sinh nhật
        if(status_birth == true){
          money_bd = sum * (birth_discount/100);
        }
        // tính ra số tiền giảm chuyển khoản
        if(status_transfer == 'transfer'){
          money_td = sum * (transfer_discount/100);
        }
        // tính tổng
        order_total = sum - money_td - money_bd;
        // cộng thêm phí ship
        if(ship_cost != 'Free ship'){
          order_total = order_total + cost;
        }

        $("#order_total").data('value',order_total).text(modifierVnd(order_total));
    }

    // load danh sách sản phẩm theo id kho
    var addNewFieldProductAjax = (warehouse_id) => {
      let order_id = {{$order->id}};
      if(warehouse_id){
        $.ajax({
          url: '{{route('administrator.order.product_list_ajax')}}',
          type: 'post',
          data: {warehouse_id: warehouse_id,order_id: order_id},
        })
        .done(function(res) {
            if(res.success){
              if(res.message == 'have not products'){
                  Swal.fire({
                      icon: 'info',
                      title: 'Oops...',
                      text: 'Chưa có sản phẩm trong kho này !',
                  })
              }else if(res.message == 'have products'){
                  $(".colunm-title-product").removeClass('d-none');
                  $(".update-order").addClass('d-none');

                  let option_html = '';

                  $.each(res.wh_items, function( index, item ) {
                    option_html += `
                      <option value="${item.product_id}" data-discount="${item.product.discount}" data-price="${item.product.price}" data-inventory="${item.quantity}">
                          <span class="text-uppercase">${item.product.pretty_name} - Tồn kho : ${item.quantity}
                      </option>
                    `
                  });

                  $('#products_wrapper').append(`
                    <div class="form-row">
                      <div class="form-group col-5">
                        <select class="form-control select2 select-product" data-style="btn-light" name="product_id[]" required>
                          <option value="">-- Chọn --</option>
                          ${option_html}
                        </select>
                      </div>
                      <div class="form-group col-3">
                        <input type="number" class="form-control p-1 quantity" name="quantity[]" required placeholder="Nhập số" min="1" value="0" data-total="0" readonly>
                      </div>
                      <div class="form-group col-2">
                        <input type="number" class="form-control p-1 discount" name="discount[]" required placeholder="" min="1" max="100" value="0" readonly>
                        <input type="hidden" class="form-control p-1 price" name="price[]" required value="0">
                      </div>
                      <div class="form-group col-1">
                        <button type="button" class="btn btn-danger waves-light waves-effect remove-product-field"><i class="fas fa-minus"></i></button>
                      </div>
                    </div>
                  `);

                  $('.select-product').select2();

                  $(".create-order").removeClass('d-none');
                  $("#products_wrapper").removeClass('d-none');
              }
            }
        })
      }
    }

    // bật tắt freeship cho đơn hàng trên xxxk
    @if($use_free_ship['key'] == 1)
      $(".checkbox-freeship").click(function(event){
        let _this = $(this);
        let status = _this.data('status');
        if(status == "on"){
          _this.data('status','off');
          _this.attr('checked',false);
          console.log('off');
        }else if(status == "off"){
          _this.data('status','on');
          _this.attr('checked',true);
          console.log('on');
        }
        update_money_form();
      });
    @endif

    // focus out ô nhập số đt
    $("#phone").on('focusout keyup',function(){
      let val = $(this).val();
      if(val){
        checkPhoneAjax(val);
        $(this).addClass('parsley-success');
      }else{
        $("input[name=name]").val('').removeClass('parsley-success').attr('readonly', false);
        $("input[name=address]").val('').data('address','').removeClass('parsley-success').attr('readonly', false);
        $("input[name=d_o_b]").val('').removeClass('parsley-success').attr('disabled', false);
        $("input[name=phone]").addClass('parsley-success');
        $("#sale_d_o_b").data("birth",false);
        $("#sale_d_o_b").parent().addClass('d-none');
        update_money_form();
      }
    });

    // focusout ô chọn ngày tháng năm sinh
    $("input[name=d_o_b]").focusout(function(){
      let now = new Date();
      let month = now.getMonth();
      let date = $(this).val();
      month_of_pick = parseInt(date.substr(0,2));
      if(month_of_pick){
        if(month_of_pick == month+1){
          // console.log("là sinh nhật",month);
          $("#sale_d_o_b").data("birth",true);
        }else{
          // console.log("ko phải sinh nhật",month);
          $("#sale_d_o_b").data("birth",false);
        }
      }else{
        $("#sale_d_o_b").data("birth",false);
      }
      update_money_form();
    });

    // sử dụng button địa chỉ mặc định
    $(".btn-address-default").click(function(event) {
      let address_default = $("input[name=address]").attr('data-address');
      $("input[name=address]").val(address_default);
      if(address_default){
        $("input[name=address]").addClass('parsley-success');
      }else{
        $("input[name=address]").removeClass('parsley-success');
      }
    });

    // keyup phí ship
    $("#cost").keyup(function(event){
      update_money_form();
    });

    // focusout form-control
    $(".form-control").focusout(function(event){
      let input_id = $(this).attr('id');
      let val = $(this).val();
      if(val != null && val != ""){
        $(`#${input_id}`).addClass('parsley-success').removeClass('is-invalid');
      }else{
        $(`#${input_id}`).removeClass('parsley-success').removeClass('is-invalid');
      }
      $(`#t_valid_${input_id}`).remove();
      // riêng cho ô cost
      if(input_id == "cost"){
        update_money_form();
      }
    });

    // chọn hình thức thanh toán
    $('.select-pay-type').change(function(event) {
      let to_type = $(this).val();
      let value = $(this).find('option:selected').data('value');
      $(this).attr('data-type',to_type).attr('data-value',value);
      update_money_form();
    });

    //select kho hàng
    $(".select-warehouse").change(function(event){
      $(".update-order").removeClass('d-none');
      $('#products_wrapper').html('');
      let warehouse_id = $(this).val();
      let order_id = {{ $order->id }};
      if(warehouse_id != null && warehouse_id != ""){
        $.ajax({
          url: '{{route('administrator.order.check_wh_ord')}}',
          type: 'post',
          data: {warehouse_id: warehouse_id,order_id:order_id},
        })
        .done(function(res) {
          if(res.success){
            if(res.message == 'warehouse_not_enough_products'){
              $(".alert-wh").removeClass('d-none');
            }else if(res.message == 'this_warehouse_ok'){
              $(".alert-wh").addClass('d-none');
            }
          }
        })
      }else{
        $(".alert-wh").addClass('d-none');
      }

      $(".colunm-title-product").addClass('d-none');
      $(".create-order").addClass('d-none');
      $('.select-warehouse').select2();
    });

    // thêm 1 trường sản phẩm
    $('.add-product-field').click(function(event){
        let warehouse_id = $(".select-warehouse").val();
        if(warehouse_id){
          $.ajax({
            url: '{{ route('administrator.order.check_order_payed_ajax') }}',
            type: 'get',
            data: {order_id: {{$order->id}} },
          })
          .done(function(res){
              if(res.order.payed_at){
                  Swal.fire({
                    icon: 'info',
                    title: 'Đơn hàng đã thanh toán !',
                    text: 'Chuyển về chưa thanh toán để có thể sửa danh sách sp . "Xác nhận thanh toán" lại sau khi nhận đủ tiền',
                  })
              }else{
                  addNewFieldProductAjax(warehouse_id);
                  update_money_form();
              }
          })
        }else{
          Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'Bạn chưa chọn kho hàng !',
          })
        }
    });

    // nếu 

    var countInArray = (array, what) => {
      return array.filter(item => item == what).length;
    }

    // chọn sản phẩm xong thì set  các thuộc tính
    $("#products_wrapper").on('change','.select-product',function(event){
      let product_id = $(this).val();
      let discount = $('option:selected', this).data('discount');
      let quantity = $('option:selected', this).data('quantity');
      let inventory = $('option:selected', this).data('inventory'); 
      let price = $('option:selected', this).data('price');
      $(this).parent().next().next().find(".discount").val(discount);
      $(this).parent().next().next().find(".price").val(price);
      $(this).parent().next().find(".quantity").attr("max",inventory).data("discount",discount).data("price",price).data('total',0);
      if(product_id){
        // test
        let product_selected = [];
        $('.select-product').each(function( index, value ) {
          product_selected.push($(this).val());
        });
        if(countInArray(product_selected,product_id) > 1){
          $('.add-product-field').trigger('click');
          $(this).parent().parent().remove();
          Swal.fire({ 
              icon: 'info',
              title: 'Trùng !',
              text: 'Sản phẩm đã được chọn.',
          })
          console.log(product_selected);
        }else{
          console.log(product_selected);
          $(this).parent().next().next().find(".discount").val(discount);
          $(this).parent().next().find(".quantity").val('').attr('readonly', false);  
        }
      }else{
        $(this).parent().next().next().find(".discount").val(0);
        $(this).parent().next().find(".quantity").val(0).attr('readonly', true);
      }

      update_money_form();
    });

    // xóa 1 trường sản phẩm
    $("#products_wrapper").on('click', '.remove-product-field', function(e){
        e.preventDefault();
        $(this).parent().parent('div.form-row').remove();
        update_money_form();
        let product_count = $(".select-product").length;
        if(product_count == 0){
          $(".update-order").removeClass('d-none');
          $(".create-order").addClass('d-none');
          $(".colunm-title-product").addClass('d-none');
        }
    });

    // nhập số lượng thì tính giá
    $("#products_wrapper").on('keyup','.quantity',function(event){
      let quantity = parseInt($(this).val());
      if(quantity){
        if(quantity > 0){
          let price = parseInt($(this).data('price'));
          let discount = parseInt($(this).data('discount'));
          let total = (quantity * price)*((100 - discount)/100);
          console.log(price,discount,total);
          $(this).data('total',total);
        }else{
          $(this).data('total',0);
        }
      }else{
        $(this).data('total',0);
      }
      update_money_form();
    });

    // open modal thông tin order
    $("#fixed_order").click(function(event){
       let _modal = $('#orderDetailModal');
       let _this = $(this);
       _modal.modal('show');
    });

    // open modal chỉnh sửa thông tin khách hàng
    $("#customer_edit").click(function(event){
       let _modal = $('#customerEditModal');
       let _this = $(this);
       _modal.modal('show');
    });

    // lưu thông tin khách hàng chỉnh sửa bằng modal
    $(".btn-customer-edit").click(function(event){
        let id = {{ $order->customer_id }};
        let name = $("#name_m").val();
        let phone = $("#phone_m").val();
        let d_o_b = $("#d_o_b_m").val();
        let address = $("#address_m").val();
        if(name && phone && address){
          $.ajax({
            url: '{{ route('administrator.order.customer_edit') }}',
            type: 'post',
            data: {id:id,name: name,phone: phone,d_o_b: d_o_b,address: address},
          })
          .done(function(res) {
            if(res.success){
              if(res.message == "validate"){
                let obj_errors = Object.keys(res.errors);
                  if(obj_errors.includes('name')){
                    $("#name_m").removeClass('parsley-success').addClass('parsley-danger').next().html(res.errors.name[0]);
                  }
                  if(obj_errors.includes('phone')){
                    console.log('phone');
                    $("#phone_m").removeClass('parsley-success').addClass('parsley-danger').next().html(res.errors.phone[0]);
                  }
                  if(obj_errors.includes('address')){
                    $("#address_m").removeClass('parsley-success').addClass('parsley-danger').next().html(res.errors.address[0]);
                  }
                  if(obj_errors.includes('d_o_b')){
                    $("#d_o_b_m").removeClass('parsley-success').addClass('parsley-danger').next().html(res.errors.d_o_b[0]);
                  }
                Swal.fire({ 
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Thông tin chưa chuẩn lắm =(( ',
                })
              }else if(res.message == "update success"){
                $('.modal-header-customer-name').text(`#${name}`);
                $('#customer_edit').html(`<i class="fas fa-pencil-alt"></i> ${name}`);
                $('#customerEditModal').modal('hide');
                $('#phone').val(phone).trigger('focusout');
                Swal.fire({ 
                    icon: 'success',
                    title: 'Thành Công !',
                    text: 'TT khách hàng đã cập nhật.',
                })
              }
            }
          })
        }else{
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Các trường đánh dấu sao là bắt buộc !',
          })
        }
    });

    // thay đổi trạng thái thanh toán
    $(".confirm-pay-checkbox").change(function(event) {
        let order_id = {{ $order->id }};
        if(order_id){
          $.ajax({
            url: '{{ route('administrator.order.confirm_pay_ajax') }}',
            type: 'post',
            data: {order_id: order_id},
          })
          .done(function(res){
            if(res.success){
              if(res.payed_at){
                alertify.success('<i class="fas fa-check animate__animated animate__infinite animate__tada"></i> Xác nhận đã thanh toán !');
              }else{
                alertify.success('<i class="fas fa-times animate__animated animate__infinite animate__tada"></i> Xác nhận chưa thanh toán !');      
              }
            }
          })
        }
    });

    // submit form thì bỏ disabled d_o_b đi
    $(".update-order").click(function(){
      $("#d_o_b").removeAttr('disabled');
    });

    // convert to currency_vietnamese
    function modifierVnd(number) {
        var x = number;
        x = x.toLocaleString('en-US', {style : 'currency', currency : 'VND'});

        return x;
    }

    ajax

9999  });
</script>
@endpush

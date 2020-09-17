@extends('admin.layouts.app')

@push('libs-styles')
<link href="{{asset('admini/css/custombox.min.css')}}" rel="stylesheet" type="text/css">
@endpush


@push('page-styles')
<style type="text/css">
   .dis-block-store{
      display: block;
   },
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Kho Hàng</a></li>
      <li class="breadcrumb-item active">Chi Tiết</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
   <div class="col-12 col-md-12">
      <!-- danh sách sản phẩm trong kho -->
      <div class="card animate__animated animate__rollIn animate__faster">
         <div class="card-header text-info">
            <div class="float-left">
               <p class="mb-1 mt-1"><i class="far fa-list-alt mr-1"></i>Sản phẩm tồn kho</p>
            </div>
            <div class="float-right">
               @if($wh_items_count < $products_count)
               <a href="{{route('administrator.warehouse_item.add',['id'=>$warehouse_id])}}"><div class="btn btn-primary">Nhập mới</div></a>
               @elseif($wh_items_count = $products_count)
               
               @endif
            </div>
         </div>
         <div class="card-body">
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
                              <option value="" {{ $per_page == 1 ? 'selected' : '' }}>Tất cả</option>
                              <option value="1" {{ $per_page == 1 ? 'selected' : '' }}>1</option>
                              <option value="2" {{ $per_page == 2 ? 'selected' : '' }}>2</option>
                              <option value="3" {{ $per_page == 3 ? 'selected' : '' }}>3</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            {{-- bảng dữ liệu --}}
            <div class="table-responsive">
               <table class="table table-striped mb-0">
                  <thead>
                     <tr>
                        <th class="text-center"><i class="far fa-sun"></i></th>
                        <th class="text-center">Tên sp</th>
                        <th class="text-center">Số lượng</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($wh_items_paginate as $item)
                     <tr>
                        <td class="text-center">
                           <div class="btn-group">
                              <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true"><i class="fas fa-cog"></i></button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                                 <a class="dropdown-item warehousing" href="javascript:;" data-id="{{$item->id}}" data-name="{{$item->product->pretty_name}}" data-quantity="{{$item->quantity}}">
                                    <i class="fas fa-info text-info icon-action mr-1"></i>Nhập kho
                                 </a>
                                 <a class="dropdown-item warehouse-item-edit" href="javascript:;" data-id="{{$item->id}}" data-name="{{$item->product->pretty_name}}" data-quantity="{{$item->quantity}}">
                                    <i class="far fa-edit icon-action text-warning mr-1"></i>Sửa
                                 </a>
                              </div>
                           </div>
                        </td>
                        <th class="text-center">{{$item->product->pretty_name}}</th>
                        <td class="text-center">{{$item->quantity}}</td>
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
                  {{ $wh_items_paginate->appends(request()->query())->links() }}
               </div>
            </div>
         </div>
      </div>
      <!-- lịch sử xuất nhập kho -->
      <div class="card animate__animated animate__rollIn animate__faster">
         <div class="card-header"><i class="far fa-list-alt mr-1"></i>Lịch sử xuất/nhập kho</div>
         <div class="card-body">
            {{-- bảng dữ liệu --}}
            <div class="table-responsive">
               <table class="table mb-0">
                  <thead>
                     <tr>
                        <th class="text-center">Hình thức</th>
                        <th class="text-center">Tên sp</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Ghi chú</th>
                        <th class="text-center">Người thực hiện</th>
                        <th class="text-center">Ngày thực hiện</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse($wh_logs as $item)
                     <tr>
                        <th class="text-center">
                           @switch($item->action)
                              @case(1)
                                 <span class="" style="color: #67F0E7">Nhập</span>
                                 @break

                              @case(2)
                                 <span class="" style="color: #FFEB00">Sửa</span>
                                 @break

                              @case(3)
                                 <span class="" style="color: #00FF00">Bán</span>
                                 @break

                              @default
                                 Default case...
                           @endswitch
                        </th>
                        <td class="text-center">{{ $item->product->pretty_name }}</td>
                        <td class="text-center">
                           @switch($item->action)
                              @case(1)
                                 <span class="" style="color: #67F0E7">+  {{$item->quantity}}</span>
                                 @break

                              @case(2)
                                 <span class="" style="color: #FFEB00">{{$item->old_quantity}} -> {{$item->quantity}}</span>
                                 @break

                              @case(3)
                                 <span class="" style="color: #00FF00">
                                    - {{$item->quantity}}
                                 </span>
                                 @break

                              @default
                                 Default case...
                           @endswitch
                        </td>
                        <td class="text-center">
                           @if($item->action == 3)
                           đơn hàng số <span class="text-info"><a href="{{route('administrator.order.detail',['id' => $item->reason])}}">#{{base64_decode($item->reason)}}</a></span>
                           @else
                           {{ $item->reason }}
                           @endif
                        </td>
                        <td class="text-center">{{ $item->user->name }}</td>
                        <td class="text-center">{{ $item->created_at->format('d-m-Y H:i:s') }}</td>
                     </tr>
                     @empty
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="warehousingModal" role="dialog">
   <div class="modal-dialog modal-dialog-centered">
      <!-- Modal content-->
      <form method="post" id="whitemForm" action="">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <div class="">
                  <h4 class="modal-title"></h4>
                  <p class="text-small text-muted float-left mb-0">Tồn kho hiện tại : <span class="product-quantity"></span></p>
               </div>
            </div>
            <div class="modal-body">
               
                  <div class="row">
                     <div class="col-12">
                        <label class="mt-1">Số lượng <span class="label-quantity"></span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="quantity" id="quantity">
                     </div>
                     <div class="col-12">
                        <label class="mt-1">Ghi chú <span class="text-info text-small">( thêm ghi chú giúp bạn biết lý do NHẬP/SỬA số lượng )</span></label>
                        <input type="text" class="form-control" name="reason" id="reason">
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-rounded waves-light waves-effect btn-modal text" data-type="" data-id=""></button>
            </div>
         </div>
      </form>
   </div>
</div>
@endsection

@push('libs-scripts')
<script src="{{asset('admini/js/custombox.min.js')}}"></script>
<script src="{{asset('admini/js/jquery.validate.min.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
   $(document).ready(function(){
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      //validate modal
      $("#whitemForm").validate({
         // onfocusout: true,
         // onkeyup: true,
         // onclick: true,
         rules: {
            "quantity": {
               required: true,
               number:true,
            },
         },
         messages: {
            "quantity": {
               required: "Vui lòng nhập số lượng .",
               number: "Chỉ được nhập số .",
            },
         },
         errorPlacement: function(error, element){
            error.insertAfter(element);
            $(`#${error[0].id}`).addClass('text-danger');
         },
      });

      // ajax nhập sửa warehouse_items
      var warehouseItemAjax = (wh_items_id,type,quantity,reason = '') => {
         $.ajax({
            url: '{{route('administrator.warehouse_item.edit_warehouse_item')}}',
            type: 'post',
            data: {
               wh_items_id:wh_items_id,
               type:type,
               quantity:quantity,
               reason:reason
            },
         })
         .done(function(res) {
            if(res.success){
               if(res.message == "warehousing success"){
                  Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Nhập kho thành công !',
                     showConfirmButton: false,
                  })
                  location.reload();
               }else if(res.message == "edit success"){
                  Swal.fire({
                     position: 'top-end',
                     icon: 'success',
                     title: 'Thay đổi đã được lưu !',
                     showConfirmButton: false,
                     timer: 1000
                  })
                  location.reload();
               }
            }else{
               Swal.fire({
                  icon: 'error',
                  title: `Lỗi hệ thống , vui lòng thử lại sau !`,
               })
            }
         })
      }

      // 
      $("#per").on('change', function(){
         $("#filterForm").submit();
      });

      // open modal nhập kho
      $(".warehousing").click(function(event){
         let _modal = $('#warehousingModal');
         let _this = $(this);
         let type = 'warehousing';
         let product_name = _this.data('name');
         let _curent_quantity = _this.data('quantity');
         let wh_items_id = _this.data('id');

         _modal.find('.modal-title').html(`Nhập kho - <span class="text-info">${product_name}</span>`);
         _modal.find('.product-quantity').html(`<span class="text-info">${_curent_quantity}</span>`);
         _modal.find('.label-quantity').text('đổi thành').addClass('d-none');
         _modal.find('.btn-modal').addClass('btn-primary').removeClass('btn-warning').text('Nhập');
         $('input[name=quantity]').val('');
         $('input[name=reason]').val('');
         $('.btn-modal').data('type',type).data('id',wh_items_id);
         $('.error').remove();
         _modal.modal('show');
      });

      // open modal sửa item trong kho
      $(".warehouse-item-edit").click(function(event){
         let _modal = $('#warehousingModal');
         let _this = $(this);
         let type = 'edit';
         let product_name = _this.data('name');
         let _curent_quantity = _this.data('quantity');
         let wh_items_id = _this.data('id');

         _modal.find('.modal-title').html(`Chỉnh sửa - <span class="text-info">${product_name}</span>`);
         _modal.find('.product-quantity').html(`<span class="text-info">${_curent_quantity}</span>`);
         _modal.find('.label-quantity').text('đổi thành').removeClass('d-none');
         _modal.find('.btn-modal').addClass('btn-warning').removeClass('btn-primary').text('Sửa');
         $('input[name=quantity]').val('');
         $('input[name=reason]').val('');
         $('.btn-modal').data('type',type).data('id',wh_items_id);
         _modal.modal('show');
      });

      // submit modal
      $('.btn-modal').on('click',function(event){
         let _this = $(this);
         let wh_items_id = _this.data('id');
         let type = _this.data('type');
         let quantity = $('input[name=quantity]').val();
         let reason = $('input[name=reason]').val();

         if(type == "edit" || type == "warehousing"){
            if($("#whitemForm").valid()){
               warehouseItemAjax(wh_items_id,type,quantity,reason);
            }else{
               Swal.fire({
                  icon: 'error',
                  title: 'Dữ liệu nhập vào chưa đúng định dạng !',
               })
            }
         }else{
            console.log('hello mother fucker !');
         }

      });

   });
</script>
@endpush
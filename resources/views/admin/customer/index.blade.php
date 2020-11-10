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
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Khách Hàng</a></li>
      <li class="breadcrumb-item active">Tất Cả</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body">
        <div class="table-rep-plugin">
          {{-- TICKET --}}
          <h4 class=""><i class="fas fa-chart-pie"></i> Thống Kê Khách hàng</h4>
          <div class="text-center mt-4 mb-4">
            <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-4">
                      <div class="card widget-flat border-blue bg-blue text-white pl-2 pr-2 pt-1 pb-1">
                          <i class="fas fa-users"></i>
                          <h4 class="text-white">{{ $customers->count() }}</h4>
                          <p class="text-uppercase font-14 font-weight-bold mb-0">Tổng SỐ KH</p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card widget-flat border-blue bg-success text-white pl-2 pr-2 pt-1 pb-1">
                          <i class="fas fa-hand-holding-medical"></i>
                          <h4 class="text-white">{{ $customers->where('created_by',null)->count() }}</h4>
                          <p class="text-uppercase font-14 font-weight-bold mb-0">KH TỪ WEB</p>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="card widget-flat border-blue bg-info text-white pl-2 pr-2 pt-1 pb-1">
                        <i class="far fa-hand-paper"></i>
                        <h4 class="text-white">{{ $customers->where('created_by','!=',null)->count() }}</h4>
                        <p class="text-uppercase font-14 font-weight-bold mb-0">KH TỪ CRM</p>
                      </div>
                    </div>
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
                {{-- search --}}
                <div class="row mb-2">
                  <div class="col-4">
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-rounded waves-light waves-effect btn-sm pl-1 pr-1 direct-link">Tìm kiếm</button>
                    </div>
                  </div>
                  <div class="col-7">
                     <input type="search" name="s" id="s" class="form-control form-control-sm" placeholder="Tìm theo SĐT" aria-controls="datatable-buttons" value="{{$search}}">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <hr class="hr-t">
          {{-- bảng giữ liệu --}}
          <div class="table-responsive mb-0 fixed-solution" data-pattern="priority-columns">
            <table id="" class="table">
              <thead>
                 <tr>
                    <th class="text-center"><i class="far fa-sun"></i></th>
                    <th data-priority="1" class="text-center">Khách Hàng</th>
                    <th data-priority="1" class="text-center">Xếp Hạng</th>
                    <th data-priority="1" class="text-center">Địa Chỉ</th>
                    <th data-priority="2" class="text-center">Người tạo</th>
                 </tr>
              </thead>
              <tbody>
                @forelse($customers as $item)
                 <tr>
                    <td class="text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="true"> <i class="fas fa-cog"></i> </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                          <a class="dropdown-item direct-link" href="{{route('administrator.customer.detail',['id'=>base64_encode($item->id)])}}"><i class="fas fa-info text-info icon-action"></i> Chi Tiết</a>
                          <a class="dropdown-item direct-link" href="{{route('administrator.customer.edit',['id'=>base64_encode($item->id)])}}"><i class="far fa-edit icon-action" style="color: #F4FA58"></i>Chỉnh Sửa</a>
                          <a class="dropdown-item" href="#"><i class="far fa-trash-alt text-danger"></i> Xóa</a>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">{{ $item->name }}<br>
                      <span class="badge badge-info">{{ $item->phone }}</span>
                    </td>
                    <td class="text-center">
                      @switch($loop->iteration)
                        @case(1)
                          <p class="mb-0 pt-1 pb-1 pl-2 pr-2 badge badge-danger">#{{ $loop->iteration }}</p> 
                          @break
                        @case(2)
                          <p class="mb-0 pt-1 pb-1 pl-2 pr-2 badge badge-warning">#{{ $loop->iteration }}</p> 
                          @break
                        @case(3)
                          <p class="mb-0 pt-1 pb-1 pl-2 pr-2 badge badge-info">#{{ $loop->iteration }}</p> 
                          @break
                        @default
                      @endswitch
                      <span>( {{ $item->orders->count() }} đơn )</span>
                      <p class="mb-0">{{ modifierVnd($item->total_payed != null ? $item->total_payed : 0,' VNĐ') }}</p>
                    </td>
                    <td class="text-center">{{ $item->address }}</td>
                    <td class="text-center">
                      @if($item->created_by != null && $item->created_by != "")
                        <p class="mb-0 text-info">{{$item->user->name}}</p>
                      @else
                        <p class="mb-0 text-warning">{{$item->user->name}}</p>
                      @endif
                      <p class="mb-0">{{ $item->created_at->format('h:i d/m/Y') }}</p>
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
                {{ $customers->appends(request()->query())->links() }}
             </div>
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
   $(document).ready(function(){
    
    $("#per").on('change', function(){
        $('#preloader').css('display', '');
        $("#filterForm").submit();
      });
    });

</script>
@endpush

{{-- nếu con đường đó mang e  --}}
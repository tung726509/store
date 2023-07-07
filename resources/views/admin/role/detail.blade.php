@extends('admin.layouts.app')

@push('page-styles')
  <style type="text/css">
    .img-bigbanner{
      border-radius: 50%;
      border: 1px solid #645F5F;
    }
    .img-medbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-fg-t{
    }
  </style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Cài Đặt</a></li>
      <li class="breadcrumb-item active">Phân Quyền</li>
  </ol>
</div>
@endsection

@section('content')
<form action="{{ url()->current() }}" method="post" id="roleForm">
  @csrf
  <div class="row">
    <div class="col-12">
      @include('admin.includes.form-alert')
        <div class="card animate__animated animate__rollIn animate__faster">
          <div class="card-body">
            <h4 class="header-title mb-1"><i class="far fa-hand-rock"></i> Thiết lập các chức năng <span class="text-info">#{{ $role->pretty_name }}</span> có thể sử dụng :</h4>
            <div class="row">
              {{-- đơn hàng --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-print" aria-hidden="true"></i> Đơn hàng
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="order_checkall" name="order_checkall" type="checkbox" class="check-all">
                  <label for="order_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['order'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox" class="check">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- khách hàng --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-users mr-1" aria-hidden="true"></i> Khách hàng
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="customer_checkall" name="customer_checkall" type="checkbox" class="check-all">
                  <label for="customer_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['customer'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- user --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="far fa-user-circle" aria-hidden="true"></i> Tài khoản
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="user_checkall" name="user_checkall" type="checkbox" class="check-all">
                  <label for="user_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['user'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- danh mục --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-list" aria-hidden="true"></i> Danh mục
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="category_checkall" name="category_checkall" type="checkbox" class="check-all">
                  <label for="category_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['category'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- sản phẩm --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-box-open" aria-hidden="true"></i> Sản phẩm
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="product_checkall" name="product_checkall" type="checkbox" class="check-all">
                  <label for="product_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['product'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- tag --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-tags" aria-hidden="true"></i> Thẻ tag
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="tag_checkall" name="tag_checkall" type="checkbox" class="check-all">
                  <label for="tag_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['tag'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- kho --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-warehouse" aria-hidden="true"></i> Kho
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="wh_checkall" name="wh_checkall" type="checkbox" class="check-all">
                  <label for="wh_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['wh'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
              {{-- cài đặt --}}
              <div class="col-12 col-md-6 col-lg-4 mt-2">
                <h4>
                  <i class="fas fa-cogs" aria-hidden="true"></i> Cài đặt
                </h4>
                <div class="checkbox checkbox-danger checkbox-circle mb-2">
                  <input id="option_checkall" name="option_checkall" type="checkbox" class="check-all">
                  <label for="option_checkall">TẤT CẢ</label>
                </div>
                @forelse($permissions['option'] as $item )
                  <div class="checkbox checkbox-blue checkbox-circle mb-2">
                    <input id="{{ $item->id }}" name="{{ $item->name }}" value="{{ $item->id }}" type="checkbox">
                    <label for="{{ $item->id }}">
                      {{ $item->pretty_name }}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="btn btn-primary w-100 btn-unfixed">Cập nhật</div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="btn btn-primary w-100 btn-fixed" style="position: fixed;bottom: 0px;z-index: 20">Cập nhật</div>
    </div>
  </div>
</form>
@endsection

@push('libs-scripts')
  <script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
	jQuery(document).ready(function($){

    function loadPermissOfRole(){
        let str_arr_permissOfRole = '{{ $str_arr_permissOfRole }}';
        if(str_arr_permissOfRole){
          let arr_permissOfRole = str_arr_permissOfRole.split(",");
          $.each(arr_permissOfRole, function( index, value ){
            $(`#${value}`).prop("checked",true);
          });
        }
    }

    function checkOnScreen(element){
        var curPos = element.offset();
        var curTop = curPos.top;
        var screenHeight = $(window).height() + $(window).scrollTop();
        let minus = curTop - screenHeight;
        if(minus > 0){
          return 'not on screen';
        }else{
          return 'on screen';
        }
    }

    loadPermissOfRole();

    // scroll để hiện ẩn nút submit
    $(window).scroll(function(event){
        let element = $(".btn-unfixed");
        if(checkOnScreen(element) == 'not on screen'){
          $(".btn-fixed").removeClass('d-none');
        }else if(checkOnScreen(element) == 'on screen'){
          $(".btn-fixed").addClass('d-none');
        }
    });

    // chọn check tất cả
    $('.check-all').click(function(event) {
        if($(this).is(":checked")){
          $(this).parent().parent().find('input[type=checkbox]').prop('checked', true);
        }else{
          $(this).parent().parent().find('input[type=checkbox]').prop('checked', false);
        }
    });

    // submit form
    $(".btn-fixed").click(function(event) {
        $('#roleForm').submit();
    });

    // submit form
    $(".btn-unfixed").click(function(event) {
        $('#roleForm').submit();
    });

	});
</script>
@endpush
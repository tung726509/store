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
  .block-icon{
    font-size: 35px;
    z-index: 9;
    position: absolute;
    top: 20px;
    border: 3px solid #F77676;
    border-radius: 15px;
    color: #F77676;
    transform: rotate(-25deg);
  }
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Tài Khoản</a></li>
      <li class="breadcrumb-item active">Tất Cả</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  @forelse($users as $item)
    <div class="col-sm-10 offset-sm-1 col-md-6 offset-md-0 col-xl-4">
        <div class="card text-center" style="border-radius: 25px">
            <div class="card-body p-3">
                <div class="member-card">
                  <div class="row">
                    <div class="col-6">
                      <div class="member-thumb mx-auto text-center" id="parent_icon_lock_{{ $item->id }}">
                        @if($item->lock == 0)
                          <div class="p-1 text-center block-icon" id="icon_lock_{{ $item->id }}">Đã Khóa</div>
                        @endif
                        <img src="{{asset('admini/images/empty-avatar.jpg')}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                      </div>
                    </div>
                    <div class="col-6 p-0">
                      {{-- tên và email --}}
                      <div class="mt-1" style="transform: translateY(10px);">
                          <h4 class="m-0">{{ $item->name }}</h4>
                          <p class="text-muted mt-1 mb-1"><span> <p class="badge badge-{{ $item->roles->first()->name == 'admin' ? 'success' : 'info' }} px-2 py-1 m-0">#_{{ $item->roles->first()->pretty_name }}</p> </span></p>
                          <p class="text-muted mt-1 mb-1">{{ $item->email }}</p>
                      </div>
                    </div>
                    <div class="col-6 p-2">
                      @php
                      $social_network = json_decode($item->social_network,true);
                      @endphp
                      {{-- facebook các thứ --}}
                      <ul class="social-links list-inline mb-0">
                          <li class="list-inline-item">
                              <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="{{$social_network['fb'] != null ? $social_network['fb'] : '#'}}" title="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="{{$social_network['ins'] != null ? $social_network['ins'] : '#'}}" title="" data-original-title="Instagram"><i class="fab fa-instagram"></i></a>
                          </li>
                          <li class="list-inline-item">
                              <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="{{$social_network['skype'] != null ? $social_network['skype'] : '#'}}" title="" data-original-title="Skype"><i class="fab fa-skype"></i></a>
                          </li>
                      </ul>
                    </div>
                    <div class="col-6 p-2">
                      {{-- button message --}}
                      <button type="button" class="btn btn-primary btn-rounded waves-effect width-md waves-light">Message Now</button>
                    </div>
                  </div>
                  {{-- nút sửa và khóa --}}
                  <div class="container mt-1">
                      <div class="row">
                          <div class="col-4">
                              <div class="mt-1">
                                  <div class="btn btn-outline-info btn-rounded waves-light waves-effect w-100"><i class="fas fa-info"></i></div>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="mt-1">
                                <a href="{{route('administrator.user.edit',[ 'id' => $item->id ])}}">
                                  <div class="btn btn-outline-warning btn-rounded waves-light waves-effect w-100"><i class="fas fa-user-edit"></i></div>
                                </a>
                              </div>
                          </div>
                          <div class="col-4">
                              <div class="mt-1">
                                @if($item->lock == 0)
                                  {{-- mở khóa --}}
                                  <div id="btn_{{$item->id}}" class="btn btn-outline-success btn-rounded waves-light waves-effect w-100 btn-lockunlock" data-id="{{ $item->id }}" data-action="unlock"><i class="fas fa-unlock"></i></div>
                                @else
                                  {{-- khóa --}}
                                  <div id="btn_{{$item->id}}" class="btn btn-outline-danger btn-rounded waves-light waves-effect w-100 btn-lockunlock" data-id="{{ $item->id }}" data-action="lock"><i class="fas fa-lock"></i></div>
                                @endif
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
  @empty

  @endforelse
</div>
@endsection

@push('libs-scripts')
{{-- <script src="{{asset('admini/js/rwd-table.min.js')}}"></script> --}}
{{-- <script src="{{asset('admini/js/responsive-table.init.js')}}"></script> --}}
@endpush

@push('page-scripts')
<script type="text/javascript">
   $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var lock_n_unlock = (id,action) => {
        let _action = action;
        $.ajax({
          url: '{{route('administrator.user.lock_n_unlock')}}',
          type: 'post',
          data: {user_id: id,action: _action},
        })
        .done(function(res) {
          if(res.success){
            if(res.message == 'locked'){
              $(`#btn_${id}`).removeClass('btn-outline-danger').addClass('btn-outline-success');
              $(`#btn_${id}`).data('action','unlock');
              $(`#btn_${id}`).find('i.fa-lock').removeClass('fa-lock').addClass('fa-unlock');
              $(`#parent_icon_lock_${id}`).prepend(`<div class="p-1 text-center block-icon" id="icon_lock_${id}">Đã Khóa</div>`);
              Swal.fire(
                  'Thành công !',
                  'Tài khoản đã được khóa .',
                  'success'
              )
            }else if(res.message == 'unlocked'){
              $(`#btn_${id}`).removeClass('btn-outline-success').addClass('btn-outline-danger');
              $(`#btn_${id}`).data('action','lock');
              $(`#btn_${id}`).find('i.fa-unlock').removeClass('fa-unlock').addClass('fa-lock');
              $(`#parent_icon_lock_${id}`).find('.block-icon').remove();
              Swal.fire(
                  'Thành công !',
                  'Tài khoản đã được mở khóa .',
                  'success'
              )
            }else{
              Swal.fire(
                  'Thất bại !',
                  res.message,
                  'error'
              )
            }
          }
        })
        .fail(function() {
          console.log("error");
        })
      }

      $("#sale").on('change', function(){
         $("#filterForm").submit();
      });

      $("#per").on('change', function(){
         $("#filterForm").submit();
      });

      $('.btn-lockunlock').click(function(event){
        let role_curent_acc = '{{Auth::user()->roles->first()->name}}';
        if(role_curent_acc != 'admin'){
          Swal.fire(
              'Thất bại !',
              'Tài khoản của bạn không có quyền thực hiện hành động này .',
              'error'
          )
        }else{
          let user_id = $(this).data('id');
          let action = $(this).data('action');
          lock_n_unlock(user_id,action);
        }
      });
   });
</script>
@endpush
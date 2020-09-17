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
    <div class="col-xl-3 col-sm-6">
        <div class="card text-center" style="border-radius: 25px">
            <div class="card-body p-3">
                <div class="member-card">
                  <div class="row">
                    <div class="col-6">
                      <div class="member-thumb mx-auto text-center">
                        @if($item->lock == 0)
                          <div class="p-1 text-center block-icon">Đã Khóa</div>
                        @endif
                        <img src="{{asset('admini/images/empty-avatar.jpg')}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                      </div>
                    </div>
                    <div class="col-6 p-0">
                      {{-- tên và email --}}
                      <div class="mt-1" style="transform: translateY(10px);">
                          <h4 class="m-0">{{ $item->name }}</h4>
                          <p class="text-muted mt-1 mb-1">@Founder <span> | </span> <span> <a href="#" class="text-pink">{{ $item->email }}</a> </span></p>
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
                                  <div class="btn btn-outline-success btn-rounded waves-light waves-effect w-100"><i class="fas fa-unlock"></i></div>
                                @else
                                  <div class="btn btn-outline-danger btn-rounded waves-light waves-effect w-100"><i class="fas fa-lock"></i></div>
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

      $("#sale").on('change', function(){
         $("#filterForm").submit();
      });

      $("#per").on('change', function(){
         $("#filterForm").submit();
      });

   });
</script>
@endpush
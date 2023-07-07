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
<div class="row">
   	<div class="col-12">
   		@include('admin.includes.form-alert')
      	<div class="card animate__animated animate__rollIn animate__faster">
          <div class="card-body">
        		<h4 class="header-title mb-4"><i class="far fa-list-alt"></i> Danh sách quyền hạn trong hệ thống</h4>
            @forelse($roles as $item)
    			   	<div class="form-row">
  			      	<div class="form-group col-md-2">
                  <a href="{{route('administrator.role.detail',['id'=>$item->id])}}" class="text-{{$item->css}}">
                    <div class="btn btn-outline-{{ $item->css }} btn-rounded waves-light waves-effect w-100">
                      {{ $item->pretty_name }}
                    </div>
                  </a>
  			      	</div>
                <div class="form-group col-md-10">
                  <div class="assign-team">
                    <div>
                      <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="{{asset('admini/images/empty-avatar.jpg')}}"> </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="{{asset('admini/images/empty-avatar.jpg')}}"> </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="{{asset('admini/images/empty-avatar.jpg')}}"> </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"> <img class="rounded-circle avatar-sm" alt="64x64" src="{{asset('admini/images/empty-avatar.jpg')}}"> </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
    			   	</div>
            @empty
            @endforelse
          </div>
        </div>
   	</div>
</div>
@endsection

@push('libs-scripts')
  <script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
	jQuery(document).ready(function($) {

	});
</script>
@endpush
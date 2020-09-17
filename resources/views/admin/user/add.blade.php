@extends('admin.layouts.app')

@push('libs-styles')
	<link href="{{asset('admini/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
	<link href="{{asset('admini/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('admini/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admini/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admini/css/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
	
@endpush

@push('page-styles')
<style type="text/css">
	.star-y{
		padding-left: 5px;
		font-size: 30px;
		color: #FFFF00;
	}
	.star-b{
		padding-left: 5px;
		font-size: 30px;
		color: #999999;
	}
	.star-sale:hover {
	  	color: #FFFF00;
	}
	.img-product-t{
		border-radius: 20px;
	}
	.img-fg-t{
		border: 1px solid #666666;
		border-radius: 20px;
	}
	.fr-wrapper>div>a {
 		z-index: -99999 !important; 
	    font-size: 0px !important;
	    padding: 0px !important;
	    height: 0px !important;
	}
</style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highadmin</a></li>
      <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
      <li class="breadcrumb-item active">Chỉnh Sửa</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-12">
		@include('admin.includes.form-alert')
	</div>
	<div class="col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="card-body">
			    <h3 class="header-title mb-1"><i class="fas fa-user-plus"></i> Thêm mới tài khoản</h3>
			    <p class="text-muted">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</p>
			    <ul class="nav nav-tabs mt-3">
			        <li class="nav-item">
			            <a href="#account" data-toggle="tab" aria-expanded="false" class="nav-link active">
			              	<i class="far fa-user-circle"></i><span class="d-none d-sm-inline-block ml-2">Tài khoản</span>
			            </a>
			        </li>
			    </ul>
			    <div class="tab-content">
			    	{{-- tài khoản --}}
			        <div class="tab-pane active" id="account">
			        	<form action="{{ url()->current() }}" method="post">
						@csrf
							{{-- tài khoản --}}
				            <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="username" class="col-form-label">Tên đăng nhập <span class="text-danger">*</span></label>
			                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="vd : tung123" value="{{ old('username') }}" required maxlength="190">
			                        @error('username')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="name" class="col-form-label">Tên hiển thị </label>
			                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="vd : Tùng Sơn" value="{{ old('name') }}" maxlength="190">
			                        @error('name')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="email" class="col-form-label">Email</label>
			                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="vd : tungcntt186@gmail.com" value="{{ old('email') }}" maxlength="190">
			                        @error('email')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="name" class="col-form-label">Quyền hạn <span class="text-danger">*</span></label>
					         		<select id="role" name="role" class="form-control @error('role') is-invalid @enderror" data-toggle="select2" required>
			                            <option value="">-- Chọn --</option>
				                        @foreach($roles as $item)
			                            <option value="{{ $item->id }}" >{{$item->pretty_name}}</option>
				                        @endforeach
			                        </select>
			                        @error('role')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                </div>
			                {{-- mật khẩu --}}
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="password" class="col-form-label">Mật khẩu mới <span class="text-danger">*</span></label>
			                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="" value="">
			                        @error('password')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="password_confirmation" class="col-form-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
			                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="" value="">
			                        @error('password_confirmation')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                </div>
			                {{--  --}}
			                <div class="form-row">
			                    <div class="form-group col-md-6">
			                        <label for="fb" class="col-form-label">Facebook</label>
			                        <input type="text" class="form-control @error('fb') is-invalid @enderror" id="fb" name="fb" placeholder="vd : https://www.facebook.com/tung726509" value="{{ old('ins') }}" maxlength="255">
			                        @error('fb')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="ins" class="col-form-label">Instagram</label>
			                        <input type="text" class="form-control @error('ins') is-invalid @enderror" id="ins" name="ins" placeholder="" value="{{ old('ins') }}" maxlength="255">
			                        @error('ins')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                    <div class="form-group col-md-6">
			                        <label for="skype" class="col-form-label">Skype</label>
			                        <input type="text" class="form-control @error('skype') is-invalid @enderror" id="skype" name="skype" placeholder="" value="{{ old('skype') }}" maxlength="255">
			                        @error('skype')
			                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
			                        @enderror
			                    </div>
			                </div>
			                <div class="form-row">
			                    <div class="form-group col-md-12">
			                    	<label for="skype" class="col-form-label">Khác</label>
			                        <div id="other_editor"></div>
			                    </div>
			                </div>
		                    <div class="form-group col-12 text-right mb-0">
						      	<button type="submit" class="btn btn-primary float-right" name="addUserForm">Thêm mới</button>
						   	</div>
			            </form>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('libs-scripts')
	<script src="{{ asset('admini/js/moment.min.js')}}"></script>
	{{-- <script src="{{ asset('admini/js/switchery.min.js') }}"></script> --}}
	<script src="{{ asset('admini/js/bootstrap-tagsinput.min.js') }}"></script>
	<script src="{{ asset('admini/js/select2.min.js') }}"></script>
	<script src="{{ asset('admini/js/jquery.autocomplete.min.js') }}"></script>
	<script src="{{ asset('admini/js/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('admini/js/bootstrap-maxlength.min.js') }}"></script>
	<script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>

	<script src="{{ asset('admini/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ asset('admini/js/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{ asset('admini/js/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{ asset('admini/js/daterangepicker.js')}}"></script>
    <script src="{{ asset('admini/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{ asset('admini/js/dropzone.min.js') }}"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

	{{-- Init JS--}}
	<script src="{{ asset('admini/js/form-pickers.init.js')}}"></script>
	<script src="{{ asset('admini/js/form-advanced.init.js')}}"></script>
@endpush	

@push('page-scripts')
<script type="text/javascript">
	$(function() {
		$.ajaxSetup({
	   	 	headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		new FroalaEditor('#other_editor', {
		  imageEditButtons: ['imageDisplay', 'imageAlign', 'imageInfo', 'imageRemove']
		})
	});
</script>
@endpush
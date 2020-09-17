@extends('admin.layouts.app')

@push('page-styles')

@endpush

@section('breadcrumb')
<div class="page-title-box">
  	<h4 class="page-title">Dashboard</h4>
  	<ol class="breadcrumb">
      	<li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      	<li class="breadcrumb-item"><a href="#">Danh Mục</a></li>
      	<li class="breadcrumb-item active">Tất Cả</li>
	</ol>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card-box">
			<div class="card-body">
				<div class="form-group">
					<label for="code" class="col-form-label">Tọa độ</label>
		         	<div class="input-group">
		         		<input type="text" class="form-control" id="code" name="code" placeholder="kinh độ" value="">
		         		<input type="text" class="form-control" id="code1" name="code1" placeholder="vĩ độ" value="">
		         		<div class="input-group-append">
                            <button class="btn btn-dark waves-effect waves-light random-string" type="button">Check</button>

                        </div>
		         	</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="code" class="col-form-label">RETURN</label>
		         	<div class="input-group">
		         		<textarea id="api_return"></textarea>
		         	</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('libs-scripts')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		
		$('.random-string').click(function(event){
			let long = $('input[name="code"]').val();
			let lat = $('input[name="code1"]').val();
			$.ajax({
				url: '{{route('administrator.tag.ajaxreturn')}}',
				type: 'post',
				data: {long:long,lat:lat},
			})
			.done(function(res) {
				$('#api_return').html(res);
			})
		});

	});
</script>
@endpush
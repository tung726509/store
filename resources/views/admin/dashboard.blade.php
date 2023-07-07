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
		         		<input type="text" class="form-control" id="code" name="code" placeholder="kinh độ và vĩ độ" value="">
		         		<div class="input-group-append">
                            <button class="btn btn-dark waves-effect waves-light convert-address-1ajax" type="button">Convert with 1 ajax</button>
                            <button class="btn btn-dark waves-effect waves-light convert-address-multi-ajax" type="button">Convert with multi ajax</button>
                        </div>
		         	</div>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<label for="code" class="col-form-label">RETURN</label>
		         	<div class="input-group">
		         		<textarea id="api_return" rows="30" cols="150"></textarea>
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

		$('.convert-address-1ajax').click(function(event) {
			let value = $('#code').val();
			let arr = value.split('/');
			$.ajax({
				url: '{{route('administrator.utility.convert_to_address_ajax')}}',
				type: 'get',
				data: {arr: arr},
			})
			.done(function(res) {
				if(res.success){
					let string = '';
					$.each(res.arr,function(index,val){
						string += val+'\n';
					});
					$('#api_return').html(string);
					$('#code').val('').focus();
					console.log(string);
				}
			})
		});

	});
</script>
@endpush
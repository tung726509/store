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
		<img class="w-100" src="/homepage/images/1685524449.png" alt="">
	</div>
	<div class="col-12">
		<h1>CHÀO MỪNG BẠN!</h1>
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
@if(session('fail') || $errors->any())
<div class="alert alert-danger bg-danger alert-dismissible border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong style="position: relative;padding-left: 35px;">
		<i class="fas fa-dizzy" style="font-size: 30px;position: absolute;left: 0;top: -7px;"></i>
	</strong>
	{!! $errors->any() ? 'Có gì đó sai sai !' : session('fail') !!}
</div>
@endif
@if(session('success'))
<div class="alert alert-success bg-success alert-dismissible border-0 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong style="position: relative;padding-left: 35px;"><i class="fas fa-laugh-beam" style="font-size: 30px;position: absolute;left: 0;top: -7px;"></i></strong> 
	{!! session('success') !!}
</div>
@endif
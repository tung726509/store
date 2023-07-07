@extends('admin.layouts.app')

@push('libs-styles')
	<link href="{{ asset('admini/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
	<link href="{{ asset('admini/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('admini/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admini/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('admini/css/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('admini/css/froala_editor.pkgd.min.css') }}" rel="stylesheet" type="text/css" />
    <link  href="{{ asset('admini/css/table.min.css') }}" rel="stylesheet" type="text/css">
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
		/*.fr-wrapper>div:first-child{
			display: none;
		}*/
		#logo{
			display: none;
		}
	</style>
@endpush

@section('breadcrumb')
	<div class="page-title-box">
	  <h4 class="page-title">Dashboard</h4>
	  <ol class="breadcrumb">
	      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
	      <li class="breadcrumb-item"><a href="#">Bài Viết</a></li>
	      <li class="breadcrumb-item active">Chỉnh Sửa</li>
	  </ol>
	</div>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-12">
			@include('admin.includes.form-alert')
		</div>
		{{-- thông tin sản phẩm --}}
	   	<div class="col-md-12 col-sm-12 col-12">
	      	<div class="card animate__animated animate__rollIn animate__faster">
	      		<div class="card-body">
		      		<h4 class="header-title">1 . chỉnh sửa bài viết</h4>
		      		<p class="sub-header">
		                Bạn có thể cài đặt thứ tự hiển thị danh mục trong phần <a href="{{-- {{route('administrator.option.category')}} --}}">Cài Đặt</a> của hệ thống .
		            </p>
		            <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
		            <form method="post" action="{{ url()->current()}}" id="editForm">
		            	@csrf
					   	<div class="form-row">
					      	<div class="form-group col-md-6">
					         	<label for="pretty_name" class="col-form-label">Tiêu đề <span class="text-danger">*</span></label>
					         	<input type="text" class="form-control @error('pretty_name') is-invalid @enderror" id="pretty_name" name="pretty_name" placeholder="vd : sản phẩm số 1" value="{{ old('pretty_name',$product->pretty_name) }}">
					         	@error('pretty_name')
									<span class="invalid-feedback"><strong>{{ $message }}</strong></span>
		                    	@enderror
					      	</div>
					      	<div class="form-group col-md-6">
					         	<label for="category_id" class="col-form-label">Danh Mục <span class="text-danger">*</span></label>
					         	<select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" data-toggle="select2" required>
		                            <option value="">-- Chọn --</option>
		                        @foreach($categories as $item)
		                            <option value="{{ $item->id }}" {{$item->id == $product->category_id ? 'selected':''}}>{{ $item->pretty_name }}</option>
		                        @endforeach
		                        </select>
		                        @error('category_id')
		                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
		                        @enderror
					      	</div>
					      	<div class="form-group col-md-6">
					         	<label for="tags" class="col-form-label">Thẻ Tags<span class="text-danger">*</span></label>
					         	<select class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Chọn ..." id="tags" name="tags[]">
				         		@foreach($tags as $item)
	                            	<option value="{{ $item->id }}" {{in_array($item->id, $tags_of_product) == true ? 'selected' : ''}}>{{ $item->pretty_name }}</option>
	                            @endforeach
		                        </select>
		                        @error('category_id')
		                            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
		                        @enderror
					      	</div>
					   	</div>
					   	<div class="form-group text-right mb-0">
					      	<button type="submit" class="btn btn-primary" name="editForm">Cập Nhật</button>
					   	</div>
					</form>
				</div>
	        </div>
	    </div>
	   	{{-- ảnh sản phẩm --}}
	   	<div class="col-md-12 col-sm-12 col-12">
	        <div class="card animate__animated animate__rollIn animate__faster">
	        	<div class="card-body">
		            <h4 class="header-title">2 . Upload ảnh bài viết</h4>
		            <div class="m-b-20 font-13 position-relative small text-info mb-2"> - Kích thước khuyến nghị 600x600 pixel , ảnh </div>
		            <form method="post" action="{{ url()->current()}}" id="imageForm" enctype="multipart/form-data">
		            	@csrf
		            	<div class="form-row">
		            		<div class="col-8">
		                    	<input type="file" class="filestyle @error('productimage') is-invalid @enderror" name="productimage" data-buttonBefore="true" data-size="sm" >
		                    	@error('productimage')
									<div class="text-danger small"><strong>{{ $message }}</strong></div>
		                    	@enderror
		            		</div>
		            		<div class="col-4">
		                    	<button type="submit" class="btn btn-primary btn-sm" name="imageForm">Cập Nhật</button>
		            		</div>
		                </div>
		            </form>
		            <div class="row">
		            	<div class="col-12 p-3">
		            		<div class="form-row">
		            			@forelse($product->product_images as $item)
		            			<div class="form-group mr-3 p-1 img-fg-t" id="product_image_of_{{ $item->id }}">
		            				<img class="img-product-t" src="{{ asset('admini/productImages/'.$item->name) }}" alt="placeholder+image" width="100" height="100">
		            				<div class="btn btn-secondary btn-rounded waves-light waves-effect ml-3 delete-image" data-id="{{ $item->id }}">Xóa</div>
		            			</div>
		            			@empty
		            			@endforelse
		            		</div>
		            	</div>
		            </div>
		        </div>
	        </div>
	   	</div>
	   	{{-- mô tả sản phẩm --}}
	   	<div class="col-md-12 col-sm-12 col-12">
	        <div class="card animate__animated animate__rollIn animate__faster">
	        	<div class="card-body">
		      		<h4 class="header-title">3 . nội dung bài viết</h4>
		            <div class="text-muted m-b-20 font-13 position-relative">Các trường đánh dấu <span class="text-danger">*</span> là bắt buộc</div>
		            <form method="post" action="{{ url()->current()}}" id="descriptionForm">
		            	@csrf
					   	<div class="form-row">
					      	<div class="form-group col-md-12">
					      		{{-- <label class="col-form-label">Mô tả</label> --}}
		                        <textarea class="form-control" id="description_froala" name="description">{{ old('description',($product->description != null ? $product->description->description : '')) }}</textarea>
					      	</div>
					   	</div>
					   	<div class="form-group text-right mb-0">
					      	<button type="submit" class="btn btn-primary" name="descriptionForm">Cập Nhật</button>
					   	</div>
					</form>
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

    {{-- <script src="{{ asset('admini/js/dropzone.min.js') }}"></script> --}}

    <script src="{{ asset('admini/js/froala_editor.pkgd.min.js') }}"></script>
    <script src="{{ asset('admini/js/table.min.js') }}"></script>
    <script src="{{ asset('admini/js/align.min.js') }}"></script>

	{{-- Init JS--}}
	<script src="{{ asset('admini/js/form-pickers.init.js')}}"></script>
	<script src="{{ asset('admini/js/form-advanced.init.js')}}"></script>
@endpush

@push('page-scripts')
<script type="text/javascript">
	var froala_obj = {
		attribution: false,
		heightMax: 500,
    	heightMin: 200,
		toolbarButtonsXS:  {
	  		'moreText': {
	    		'buttons': ['bold', 'italic', 'underline', 'fontFamily', 'fontSize', 'textColor','strikeThrough', 'subscript', 'superscript',  'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting','|'],
		    		'buttonsVisible': 5,
			  	},
		  	'moreParagraph': {
		    	'buttons': ['alignLeft', 'alignCenter','alignJustify', 'alignRight', 'formatOLSimple', 'paragraphFormat','formatOL', 'formatUL', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote','|'],
		    	'buttonsVisible': 5
		  	},
		  	'moreRich': {
		    	'buttons': ['insertLink', 'insertImage', 'insertVideo','insertTable', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertHR','|'],
		    	'align': 'right',
		    	'buttonsVisible': 5
		  	},
		},
		videoUpload: false,
		imageUploadParams: {
	        _token: $('meta[name="csrf-token"]').attr('content')
	    },
	    imageUploadURL: "{{ route('administrator.product.upload_image_ajax') }}",
	    events: {
	        'image.uploaded': function(res) {
	        },
	    }
	}

	// hướng dẫn bảo quản text editor
	var preservation_editor = new FroalaEditor('textarea#preservation_froala',froala_obj);

	// hướng dẫn sử dụng text editor
	var user_manual_editor = new FroalaEditor('textarea#user_manual_froala',froala_obj);

	// mô tả text editor
	var description_editor = new FroalaEditor('textarea#description_froala',froala_obj);

	// note text editor
	var note_editor = new FroalaEditor('textarea#note_froala',froala_obj);

	// size text editor
	var size_editor = new FroalaEditor('textarea#size_froala',froala_obj);

	$(function() {
		$.ajaxSetup({
	   	 	headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$('div.fr-wrapper div a').text('Không bấm vào vùng màu đỏ này !').attr('href','#').css({
			'padding': '1px',
			'font-size': '1px',
			'background': 'rgb(159 159 159)',
			'color': 'rgb(159 159 159)'
		});

		var update_star = (star) => {
			$('.star-sale').removeClass('star-y').addClass('star-b');
			if(star != null && star != "" && star > 0){
				for (let i = 1; i <= star; i++) {
					$('#star_'+i).removeClass('star-b').addClass('star-y');
				}
			}
		}

		update_star({{$product->star}});

		$(".star-sale").hover(function(){
			$('.star-sale').removeClass('star-y').addClass('star-b');
			let number = $(this).data('id');
			for (let i = 1; i <= number; i++) {
				$('#star_'+i).removeClass('star-b').addClass('star-y');
			}
		}, function(){
			$('.star-sale').removeClass('star-y').addClass('star-b');
			let star = $('.parent-star-sale').data('id');
			if(star != "" && star != null){
				update_star(star);
			}else{
				update_star({{$product->star}});
			}
		});

		$(".star-sale").click(function(event){
			let star = $(this).data('id');
			let product_id = {{ $product->id }};
			$.ajax({
				url: '{{route('administrator.product.pick_star_ajax')}}',
				type: 'post',
				data: {star: star,product_id:product_id},
			})
			.done(function(res) {
				$('.parent-star-sale').data('id',star);
				update_star(star);
				if(res.success){
					Swal.fire({
					  	position: 'top-end',
					  	icon: 'success',
					  	title: 'Thành công !',
					  	showConfirmButton: false,
					  	timer: 1500
					})
				}
			})
		});

		function makeid(length){
		    var result           = '';
		   	var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		   	var charactersLength = characters.length;
		   	for ( var i = 0; i < length; i++ ) {
		      	result += characters.charAt(Math.floor(Math.random() * charactersLength));
		   	}

		   	return result;
		}

		$('.random-string').click(function(event){
			let r_str = makeid(10);
			$('input[name="code"]').val(r_str);
		});

		$(".delete-image").click(function(event){
			let id = $(this).data('id');
			Swal.fire({
			  	title: 'Bạn chắc chưa ?',
			  	text: "Xóa rồi không khôi phục được đâu !",
			  	icon: 'warning',
			  	showCancelButton: true,
			  	confirmButtonColor: '#3085d6',
			  	cancelButtonColor: '#d33',
			  	confirmButtonText: 'Yes, Xóa đi !'
			}).then((result) => {
			  	if (result.value) {
			  		$.ajax({
			  			url: '{{ route('administrator.product.delete_image_ajax') }}',
			  			type: 'post',
			  			data: {id:id},
			  		})
			  		.done(function(res) {
			  			if(res.success){
			  				$(`#product_image_of_${id}`).remove();
			  				Swal.fire(
					      		'Đã xóa !',
					      		'Ảnh của bạn đã được xóa .',
					      		'success'
					    	)
			  			}
			  		})
			  		.fail(function() {
			  			console.log("error");
			  		})


			  	}
			})
		});
	});

</script>
@endpush

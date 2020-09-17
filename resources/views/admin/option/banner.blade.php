@extends('admin.layouts.app')

@push('libs-styles')
    <link rel="stylesheet" href="{{asset('admini/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admini/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('admini/css/dropzone.min.css')}}"  type="text/css" />
@endpush

@push('page-styles')
  <style type="text/css">
    .img-bigbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-medbanner{
      border-radius: 20px;
      border: 1px solid #645F5F;
    }
    .img-fg-t{
      /*border: 1px solid #F3EEEE;*/
      /*border-radius: 20px;*/    
    }
  </style>
@endpush

@section('breadcrumb')
<div class="page-title-box">
  <h4 class="page-title">Dashboard</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
      <li class="breadcrumb-item"><a href="#">Cài Đặt</a></li>
      <li class="breadcrumb-item"><a href="#">Website Bán Hàng</a></li>
      <li class="breadcrumb-item active">Banner Quảng Cáo</li>
  </ol>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-12">
    @include('admin.includes.form-alert')
  </div>
  {{-- Banner lớn đầu trang --}}
  <div class="col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body p-2">
          <h3 class="header-title">1 . Big banner đầu trang web</h3>
          <form method="post" action="{{ url()->current()}}" id="bbiForm" name="bbiForm" enctype="multipart/form-data">
            @csrf
            <div class="m-b-20 font-13 position-relative small text-secondary mb-2"> - Kích thước khuyến nghị 1000x300 pixel , ảnh </div>
            {{-- input chọn Ảnh --}}
            <div class="row mb-2">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="form-group">
                    <input type="file" class="filestyle @error('big_banner') is-invalid @enderror" name="big_banner" data-buttonBefore="true" data-size="sm" >
                    @error('big_banner')
                      <div class="text-danger small"><strong>{{ $message }}</strong></div>
                    @enderror
                  </div>
                </div>
            </div>
            {{-- bannner --}}
            <div class="row mb-2">
              <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="owl-carousel owl-theme big-banner-owl">
                  @forelse(collect($big_b_i['name']) as $item)
                    <div class="item img-fg-t text-center">
                      <img class="img-bigbanner" src="{{ asset('homepage/images/'.$item) }}" alt="placeholder+image" width="100%" height="auto">
                    </div>
                  @empty
                    <div class="item img-fg-t text-center">
                      <img class="img-bigbanner" src="{{ asset('homepage/images/big-banner-demo.jpg') }}" alt="placeholder+image" width="100%" height="auto">
                    </div>
                  @endforelse
                </div>
              </div>
            </div>
            {{-- chữ trong banner --}}
            <div class="row">
              {{-- 1.1 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="bbi_text_1" class="col-form-label">1.1 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('bbi_text_1') is-invalid @enderror" id="" name="bbi_text_1" placeholder="vd : sp01" value="{{ old('bbi_text_1',$big_b_i['text']["1"] != '' ? $big_b_i['text']["1"] : '') }}">
                @error('bbi_text_1')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.2 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="bbi_text_2" class="col-form-label">1.2 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('bbi_text_2') is-invalid @enderror" id="" name="bbi_text_2" placeholder="vd : sp01" value="{{ old('bbi_text_2',$big_b_i['text']["2"] != '' ? $big_b_i['text']["2"] : '') }}">
                @error('bbi_text_2')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.3 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="bbi_text_3" class="col-form-label">1.3 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('bbi_text_3') is-invalid @enderror" id="" name="bbi_text_3" placeholder="vd : sp01" value="{{ old('bbi_text_3',$big_b_i['text']["3"] != '' ? $big_b_i['text']["3"] : '') }}">
                @error('bbi_text_3')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.4 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="bbi_text_4" class="col-form-label">1.4 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('bbi_text_4') is-invalid @enderror" id="" name="bbi_text_4" placeholder="vd : sp01" value="{{ old('bbi_text_4',$big_b_i['text']["4"] != '' ? $big_b_i['text']["4"] : '') }}">
                @error('bbi_text_4')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm text-center float-right" name="bbi_save" id="bbi_save">Lưu ảnh</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>

  {{-- Banner vừa giữa trang --}}
  <div class="col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body p-2">
          <h3 class="header-title">2 . Medium banner giữa trang web</h3>
          <form method="post" action="{{ url()->current()}}" id="mbiForm" name="mbiForm" enctype="multipart/form-data">
            @csrf
            <div class="m-b-20 font-13 position-relative small text-secondary mb-2"> - Kích thước khuyến nghị 1000x300 pixel , ảnh </div>
            {{-- input chọn Ảnh --}}
            <div class="row mb-2">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="form-group">
                    <input type="file" class="filestyle @error('med_banner') is-invalid @enderror" name="med_banner" data-buttonBefore="true" data-size="sm" >
                    @error('med_banner')
                      <div class="text-danger small"><strong>{{ $message }}</strong></div>
                    @enderror
                  </div>
                </div>
            </div>
            {{-- bannner --}}
            <div class="row mb-2">
              <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="item img-fg-t text-center">
                    <img class="img-bigbanner" src="{{ asset('homepage/images/'.$med_b_i['name'][0]) }}" alt="placeholder+image" width="100%" height="auto">
                  </div>
              </div>
            </div>
            {{-- chữ trong banner --}}
            <div class="row">
              {{-- 1.1 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="mbi_text_1" class="col-form-label">2.1 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('mbi_text_1') is-invalid @enderror" id="" name="mbi_text_1" placeholder="vd : sp01" value="{{ old('mbi_text_1',$med_b_i['text'][1]) }}">
                @error('mbi_text_1')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.2 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="mbi_text_2" class="col-form-label">2.2 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('mbi_text_2') is-invalid @enderror" id="" name="mbi_text_2" placeholder="vd : sp01" value="{{ old('mbi_text_2',$med_b_i['text'][2]) }}">
                @error('mbi_text_2')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.3 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="mbi_text_3" class="col-form-label">2.3 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('mbi_text_3') is-invalid @enderror" id="" name="mbi_text_3" placeholder="vd : sp01" value="{{ old('mbi_text_3',$med_b_i['text'][3]) }}">
                @error('mbi_text_3')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm text-center float-right" name="mbi_save" id="mbi_save">Lưu ảnh</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>

  {{-- Banner nhỏ cuối trang --}}
  <div class="col-12">
    <div class="card animate__animated animate__rollIn animate__faster">
      <div class="card-body p-2">
          <h3 class="header-title">3 . Small banner cuối trang</h3>
          <form method="post" action="{{ url()->current()}}" id="sbiForm" name="sbiForm" enctype="multipart/form-data">
            @csrf
            <div class="m-b-20 font-13 position-relative small text-secondary mb-2"> - Kích thước khuyến nghị 1000x300 pixel , ảnh </div>
            {{-- input chọn Ảnh --}}
            <div class="row mb-2">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="form-group">
                    <input type="file" class="filestyle @error('small_banner') is-invalid @enderror" name="small_banner" data-buttonBefore="true" data-size="sm" >
                    @error('small_banner')
                      <div class="text-danger small"><strong>{{ $message }}</strong></div>
                    @enderror
                  </div>
                </div>
            </div>
            {{-- bannner --}}
            <div class="row mb-2">
              <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="item img-fg-t text-center">
                    <img class="img-bigbanner" src="{{ asset('homepage/images/'.$small_b_i['name'][0]) }}" alt="placeholder+image" width="100%" height="auto">
                  </div>
              </div>
            </div>
            {{-- chữ trong banner --}}
            <div class="row">
              {{-- 1.1 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="sbi_text_1" class="col-form-label">2.1 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sbi_text_1') is-invalid @enderror" id="" name="sbi_text_1" placeholder="vd : sp01" value="{{ old('sbi_text_1',$small_b_i['text'][1]) }}">
                @error('sbi_text_1')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.2 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="sbi_text_2" class="col-form-label">2.2 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sbi_text_2') is-invalid @enderror" id="" name="sbi_text_2" placeholder="vd : sp01" value="{{ old('sbi_text_2',$small_b_i['text'][2]) }}">
                @error('sbi_text_2')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
              {{-- 1.3 --}}
              <div class="form-group col-sm-6 col-xl-3">
                <label for="sbi_text_3" class="col-form-label">2.3 <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sbi_text_3') is-invalid @enderror" id="" name="sbi_text_3" placeholder="vd : sp01" value="{{ old('sbi_text_3',$small_b_i['text'][3]) }}">
                @error('sbi_text_3')
                  <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm text-center float-right" name="sbi_save" id="sbi_save">Lưu ảnh</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('libs-scripts')
  <script src="{{ asset('admini/js/dropzone.min.js') }}"></script>
  <script src="{{ asset('admini/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('admini/js/bootstrap-filestyle.min.js') }}"></script>
@endpush  

@push('page-scripts')
  <script type="text/javascript">
    $(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $(".big-banner-owl").owlCarousel({
        items:1,
        // loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
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
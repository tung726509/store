@extends('admin.layouts.app')

@push('libs-styles')
    <link rel="stylesheet" href="{{asset('admini/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admini/css/owl.theme.default.min.css')}}">
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
      position: relative;
      border: 1px solid #F3EEEE;
      border-radius: 20px;    
    }
    .btn-del{
      position: absolute;
      border: 3px solid #b0abab;
      background-color: white;
      color: #b0abab;
      font-weight: bold;
      padding: 5px 15px 6px 15px;
      border-radius: 13px;
      right: 0%;
      margin-top:15px;
    }
    .btn-del:hover{
      background-color: #b0abab;
      color: white;
      border: 3px solid white;
    }
    .card-bigbanner{
      overflow: hidden;
    }
    .owl-carousel .owl-stage-outer{
      overflow: inherit;
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
      <div class="card-body p-2 card-bigbanner">
          <h3 class="header-title">1 . Big banner đầu trang web</h3>
          <form method="post" action="{{ url()->current() }}" id="bbiForm" name="bbiForm" enctype="multipart/form-data">
            @csrf
            <div class="m-b-20 font-13 position-relative small text-secondary mb-2"> - Kích thước khuyến nghị 1000x300 pixel , ảnh </div>
            {{-- input chọn Ảnh --}}
            <div class="row mb-2">
                <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <div class="input-group">
                    <input type="file" class="form-control form-control-sm @error('big_banner') is-invalid @enderror" name="big_banner" data-size="sm">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-dark waves-effect waves-light btn-sm direct-link" name="bbi_save">Lưu ảnh</button>
                    </div>
                  </div>
                  @error('big_banner')
                    <div class="text-danger small"><strong>{{ $message }}</strong></div>
                  @enderror
                </div>
            </div>
            {{-- bannner --}}
            <div class="row mb-2">
              <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="owl-carousel owl-theme" id="big-banner-owl">
                  @forelse(collect($big_b_i['name']) as $item)
                    <div class="item img-fg-t text-center">
                      <img class="img-bigbanner" src="{{ asset('homepage/images/'.$item) }}" alt="placeholder+image" {{-- width="100%" --}} height="auto">
                      <div class="btn-del res-btn-del" data-id ="{{ $item }}"><i class="far fa-trash-alt"></i> xóa ảnh</div>
                    </div>
                  @empty
                    <div class="item img-fg-t text-center">
                      <img class="img-bigbanner" src="{{ asset('homepage/images/big-banner-demo.jpg') }}" alt="placeholder+image" width="100%" height="auto">
                    </div>
                  @endforelse
                </div>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-sm text-center float-right direct-link" name="bbi_save" id="bbi_save">Cập nhật</button>
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
      

    $(document).ready(function(){
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $("#big-banner-owl").owlCarousel({
        items:1,
        margin:10,
        autoplayTimeout:2000,
        autoplayHoverPause:true
      }); 

      $(".btn-del").click(function(event){
        var _this = $(this);
        let id = _this.data('id'); 
        Swal.fire({
            title: 'Bạn chắc chưa ?',
            text: "Xóa rồi không khôi phục được đâu !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Xóa đi !'
        }).then((result) => {
            if(result.value){
              $.ajax({
                url: '{{ route('administrator.option.del_banner_ajax') }}',
                type: 'post',
                data: {id:id},
              })
              .done(function(res) {
                if(res.success){
                  location.reload();
                }
              })
              .fail(function() {
                Swal.fire(
                  'Error !',
                  'Lỗi hệ thống , vui lòng thử lại !',
                  'error'
                  )
              })

              
            }
        })
      });

    });
  </script>
@endpush
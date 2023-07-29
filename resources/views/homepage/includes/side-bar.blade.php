<style type="text/css">
    .card {
        border-radius: 5px;
    }
    .card-header {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        background-color: #ff9900;
    }
    .card-header_title {
        margin: 0px !important;
        color: white;
    }
    .card-content {
        margin: 50px 20px;
    }
    .card-content_img {
        width: 100%;
        margin-bottom: 20px;
    }
    .card-content_title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
        text-decoration: underline;
    }
    .card-content_content {

    }

    .post-standing {
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 5px;
    }

    .post-standing-header {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        background-color: #ff9900;
        padding: 0.75rem 1.25rem;
    }
    .post-standing-header_title {
        margin: 0px !important;
        /* text-decoration: underline; */
        color: white;
    }
    .post-standing-content {
        margin: 50px 15px;
    }
    .post-standing-content_img {
        border-radius: 5px;
        width: 87px;
    }
    .post-standing-content_title {
        line-height: 20px;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #000;
    }
    .post-standing-content_content {
        font-size: 13px;
        line-height: 18px;
        color: #000;
        overflow: hidden;
        max-height: 40px;
        display: -webkit-box;
        }
    .post-standing-content_date {
        font-size: 10px;
    }

    .input-email {
        width: 100%;
        height: 50px;
        padding: 10px;
        border: 1px solid #c3c2c2;
        border-radius: 10px;
        margin: 20px 0 20px 0;
    }

    .input-search {
        width: 100%;
        height: 45px !important;
        padding: 10px;
        border: 1px solid #c3c2c2 !important;
        border-radius: 10px;
        margin: 0 0 20px 0;
    }

    .btn-search {
        color: white !important;
        background-color: #ff9900 !important;
        border-color: 1px solid #c3c2c2 !important;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    .btn-email {
        color: white;
        background-color: #ff9900;
        border-radius: 5px;
    }
    .badge {
        background-color: #c3c2c2;
        padding: 2px 5px;
        width: fit-content;
        border-radius: 5px;
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .text-regis {
        font-size: 16px;
        font-weight: 700;
    }
</style>

<div class="row">
    <div class="col-12 text-center">
        <div class="input-group mb-3">
            <input type="text" class="form-control input-search" placeholder="Tìm kiếm ...">
            <button class="btn btn-search" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-header_title">Giới thiệu</h3>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-12 text-center">
                        <img width="100" height="100" src="{{asset('homepage/images/sun_day.jpg')}}" class="card-content_img" alt="">
                        <div class="card-content_title h3">Nhật Dương</div>
                        <div class="card-content_content">Blog Diary is a new generation WordPress personal blog theme, that can give your readers immersive browsing experience.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-12">
        <div class="post-standing">
            <div class="post-standing-header">
                <h3 class="post-standing-header_title">Bài viết nổi bật</h3>
            </div>
            <div class="post-standing-content my-4">
                @foreach ($standing_products as $item)
                    <div class="row mb-3">
                        <div class="col-4 text-center">
                            <img width="100" height="100" src="{{asset('admini/productImages/'.$item->product_images->first()->name)}}" class="post-standing-content_img" alt="">
                        </div>
                        <div class="col-8 text-left ">
                            <div class="post-standing-content_title">{{ $item->pretty_name }}</div>
                            <div class="post-standing-content_content">
                                @foreach ($tags as $item)
                                    <p class="badge">{{ $item->pretty_name }}</p>
                                @endforeach
                            </div>
                            <div class="post-standing-content_date">{{ convertDateMonth($item->created_at) }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content my-4">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="card-content_content text-black text-regis">Đăng ký để  nhận thông báo mỗi khi có </br> bài viết mới</div>
                        <input class="input-email" placeholder="abc@gmail.com" />
                        <div class="btn btn-email btn-md w-100">Đăng ký</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".btn-search").click(function(event){
        let value = $(".input-search").val();
        url = window.location.origin + window.location.pathname + '?search=' + value;
        window.location.replace(url);
        // console.log(url);
      });
    });
  </script>

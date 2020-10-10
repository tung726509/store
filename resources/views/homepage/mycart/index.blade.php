@extends('homepage.layouts.app')

@push('page-styles')
<style type="text/css">
	.bgc-white{
		background-color: white;
	}
	.link-black{
		color: black;
	}
	.brcr-icon-lr{
		padding-left: 5px;
		padding-right: 5px;
	}
   .hr-style{
      margin-top : 0px;
      margin-bottom: 20px;
   }
   .icon-success{
      color: green;
      padding-right: 5px;
   }
   .icon-pending{
      color: #FF9900;
      padding-right: 5px;
   }
   .icon-cancel{
      color: red;
      padding-right: 5px;
   }
   .red{
      color: red;
   }
   .btn-border-radius{
      border-radius: 20px;
   }
   .table-style{
      border-radius: 20px;
   }
   .btn-pay{
      border-radius: 20px;
      width: 100%;
   }
</style>
@endpush

@section('content')
{{-- super banner --}}
<div class="banner-container my-banner">
   <div id="banner-wrapper" class="">
      <div class="porto-block">
         <style>.vc_custom_1575508548829{padding-top: 4.25rem !important;padding-bottom: 4.25rem !important;background-color: #77e1ff !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.coupon-sale-text b { background: #fff; color: inherit }</style>
         <div class="vc_row wpb_row vc_custom_1575508548829 text-left vc_row-has-fill porto-inner-container porto-lazyload lazy-load-loaded" style="background-image: url(&quot;https://www.portotheme.com/wordpress/porto/shop4/wp-content/uploads/sites/79/2019/12/shop1_shop_banner.jpg?id=2011&quot;);">
            <div class="porto-wrap-container container">
               <div class="row">
                  <div class="pl-lg-4 pl-xl-5 mb-4 mb-md-0 vc_column_container col-md-5 col-xl-4 col-lg-4 offset-1">
                     <div class="wpb_wrapper vc_column-inner">
                        <h2 style="font-size: 3rem;line-height: 1" class="vc_custom_heading mb-3 align-left text-uppercase">ELECTRONIC
                           DEALS
                        </h2>
                        <div class="vc_btn3-container  mb-0 vc_btn3-inline"> <button class="vc_btn3 vc_btn3-shape-default btn btn-modern btn-md btn-dark">GET YOURS!</button></div>
                     </div>
                  </div>
                  <div class="vc_column_container col-md-4 offset-md-0 offset-1">
                     <div class="wpb_wrapper vc_column-inner">
                        <div style="font-size: 0.7rem;line-height: 1.7" class="vc_custom_heading coupon-sale-text my-2 align-left heading-dark"><b>Exclusive COUPON</b></div>
                        <div style="font-size: 1rem;line-height: .9;font-weight:700" class="vc_custom_heading coupon-sale-text align-left heading-dark"><i>UP TO</i><b>$100</b> OFF</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- breadcrumb --}}
<section class="page-top page-header-6">
   	<div class="container hide-title">
      	<div class="row">
         	<div class="col-lg-12 clearfix">
           		<nav aria-label="breadcrumb bgc-white">
				  	<ol class="breadcrumb p-0 bgc-white">
				    	<li><i class="fas fa-home brcr-icon-lr"></i><a href="#" class="link-black">Home</a></li>
				    	<li><i class="fas fa-angle-right brcr-icon-lr"></i><a href="#" class="link-black">My Cart</a></li>
				  	</ol>
				</nav>
         	</div>
      	</div>
   	</div>
</section>
{{-- main --}}
<div id="main" class="column1 boxed">
   <div class="container">
      <hr class="hr-style">
      <div class="row main-content-wrap">
         <div class="main-content col-lg-12">
            <div id="content" role="main">
               <div class="page-content">
                  <div class="vc_row wpb_row row">
                     <div class="col-lg-12">
                        <h3>Giỏ Hàng Của Bạn</h3>
                        {{-- test --}}
                        <div class="row">
                           {{-- từng sản phẩm trong giỏ hàng --}}
                           <div class="col-sm-9 col-12">
                              {{-- <h3 class="bag-summary">Your selection <span>(5 items)</span></h3> --}}
                              <table class="table table-hover table-bordered" cellspacing="0">
                                 <thead>
                                    <tr>
                                       <th class="text-center text-uppercase">ảnh</th>
                                       <th class="text-center text-uppercase">tên sản phẩm</th>
                                       <th class="text-center text-uppercase">số lượng</th>
                                       <th class="text-center text-uppercase">loại bỏ</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr class="">
                                       <td class="" data-title="product-image">
                                          <div class="text-center">
                                             <a href="http://atelier.swiftideas.com/product/plain-backpack/?attribute_pa_colour=green"><img width="auto" height="155" src="{{asset('homepage/images/rsz_plain_backpack_1b-120x155.jpg')}}" class="" alt="" srcset="" sizes=""></a> 
                                          </div>
                                       </td>
                                       <td class="" data-title="product-name">
                                          <div class="text-center">
                                             <dl>
                                                <dt><a href="#" class="text-uppercase">cặp màu đen</a></dt>
                                                <dt><i class="fas fa-arrow-down icon-cancel"></i><span class="red">giảm 10%</span></dt>
                                             </dl>
                                             
                                          </div>
                                       </td> 
                                       <td class="" data-title="product-price">
                                          <div class="text-center">
                                             <div class="quantity">
                                                <input type="number" step="1" min="1" name="" value="1" title="Qty" class="input-text qty text" size="4">
                                             </div>
                                             <dl class="mt-2">
                                                <dt class="">Giá: 2000000đ</dt>
                                             </dl>
                                          </div>
                                       </td>
                                       <td class="">
                                          <div class="text-center">
                                             <button class="vc_btn3 btn btn-borders btn-sm btn-danger btn-border-radius">X</button>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="" data-title="product-image">
                                          <div class="text-center">
                                             <a href="http://atelier.swiftideas.com/product/plain-backpack/?attribute_pa_colour=green"><img width="auto" height="155" src="{{asset('homepage/images/rsz_plain_backpack_1b-120x155.jpg')}}" class="" alt="" srcset="" sizes=""></a> 
                                          </div>
                                       </td>
                                       <td class="" data-title="product-name">
                                          <div class="text-center">
                                             <dl>
                                                <dt><a href="#" class="text-uppercase">cặp màu đen</a></dt>
                                                <dt><i class="fas fa-arrow-down icon-cancel"></i><span class="red">giảm 10%</span></dt>
                                             </dl>
                                             
                                          </div>
                                       </td> 
                                       <td class="" data-title="product-price">
                                          <div class="text-center">
                                             <div class="quantity">
                                                <input type="number" step="1" min="1" name="" value="1" title="Qty" class="input-text qty text" size="4">
                                             </div>
                                             <dl class="mt-2">
                                                <dt class="">Giá: 2000000đ</dt>
                                             </dl>
                                          </div>
                                       </td>
                                       <td class="">
                                          <div class="text-center">
                                             <button class="vc_btn3 btn btn-borders btn-sm btn-danger btn-border-radius">X</button>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="" data-title="product-image">
                                          <div class="text-center">
                                             <a href="http://atelier.swiftideas.com/product/plain-backpack/?attribute_pa_colour=green"><img width="auto" height="155" src="{{asset('homepage/images/rsz_plain_backpack_1b-120x155.jpg')}}" class="" alt="" srcset="" sizes=""></a> 
                                          </div>
                                       </td>
                                       <td class="" data-title="product-name">
                                          <div class="text-center">
                                             <dl>
                                                <dt><a href="#" class="text-uppercase">cặp màu đen</a></dt>
                                                <dt><i class="fas fa-arrow-down icon-cancel"></i><span class="red">giảm 10%</span></dt>
                                             </dl>
                                             
                                          </div>
                                       </td> 
                                       <td class="" data-title="product-price">
                                          <div class="text-center">
                                             <div class="quantity">
                                                <input type="number" step="1" min="1" name="" value="1" title="Qty" class="input-text qty text" size="4">
                                             </div>
                                             <dl class="mt-2">
                                                <dt class="">Giá: 2000000đ</dt>
                                             </dl>
                                          </div>
                                       </td>
                                       <td class="">
                                          <div class="text-center">
                                             <button class="vc_btn3 btn btn-borders btn-sm btn-danger btn-border-radius">X</button>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           {{-- tổng đơn hàng --}}
                           <div class="col-sm-3 col-12">
                              {{-- <h3 class="bag-totals">Tất Cả</h3> --}}
                              <div class="cart_totals">
                                 <table class="table table-bordered" cellspacing="0">
                                    <tbody>
                                       <tr title="order-subtotal">
                                          <th><div class="text-center">Tất Cả</div></th>
                                          <td><div class="text-center">100000 VNĐ</div></td>
                                       </tr>
                                       <tr title="order-sale">
                                          <th><div class="text-center">Giảm Giá</div></th>
                                          <td>
                                             <div class="text-center">
                                                <dl>
                                                   <dt>- <span class="text-danger">10%</span> sinh nhật</dt>
                                                   <dt></dt>
                                                   ship
                                                   sinh nhật
                                                   mã giảm giá
                                                </dl>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr title="order-code-sale">
                                          <th><div class="text-center">Code Sale</div></th>
                                          <td><div class="text-center"><input type="text" name="code_sale" id="code_sale" placeholder="Nhập code và check"></div></td>
                                       </tr>
                                       <tr title="order-total">
                                          <th><div class="text-center">Tổng Cộng</div></th>
                                          <td><div class="text-center"><h1 class="red">300000 VNĐ</h1></div></td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 {{-- button thanh toán --}}
                                 <button class="vc_btn3 vc_btn3-shape-default btn btn-lg btn-success btn-pay">THANH TOÁN</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="vc_row wpb_row row">
                     {{-- thông tin người nhận hàng --}}
                     <div class="vc_column_container col-md-6 mt-3">
                        <div class="wpb_wrapper vc_column-inner">
                           <div class="box-content" style="">
                              <h4 class="vc_custom_heading align-left mb-3"><strong>Thông tin người nhận hàng</strong></h4>
                              {{-- tên --}}
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="Họ và Tên">
                                 <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-star red"></i></span>
                                 </div>
                              </div>
                              {{-- địa chỉ --}}
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="Địa Chỉ">
                                 <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-star red"></i></span>
                                 </div>
                              </div>
                              {{-- số điện thoại --}}
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-volume"></i></span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="Số Điện Thoại">
                                 <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-star red"></i></span>
                                 </div>
                              </div>
                              {{-- facebook --}}
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook"></i></span>
                                 </div>
                                 <input type="text" class="form-control" placeholder="Facebook">
                              </div>
                              <button class="vc_btn3 vc_btn3-shape-round btn btn-borders btn-md btn-primary float-right">Cập Nhật</button>
                           </div>
                        </div>
                     </div>
                     {{-- lịch sử mua bán --}}
                     <div class="vc_column_container col-md-6 mt-3">
                        <div class="wpb_wrapper vc_column-inner">
                           <h4 class="vc_custom_heading align-left">Lịch sử mua hàng của bạn</h4>
                           <div class="porto-toggles wpb_content_element  toggle-lg">
                              {{-- đang xử lý --}}
                              <section class="toggle">
                                 <label><i class="far fa-clock icon-pending"></i>Đơn Đang Xử Lý</label>
                                 <div class="toggle-content" style="display: none;">
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>Firstname</th>
                                             <th>Lastname</th>
                                             <th>Email</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>John</td>
                                             <td>Doe</td>
                                             <td>john@example.com</td>
                                          </tr>
                                          <tr>
                                             <td>Mary</td>
                                             <td>Moe</td>
                                             <td>mary@example.com</td>
                                          </tr>
                                       </tbody>
                                   </table>
                                 </div>
                              </section>
                              {{-- thành công --}}
                              <section class="toggle">
                                 <label><i class="far fa-check-circle icon-success"></i>Đơn Giao Thành Công</label>
                                 <div class="toggle-content" style="display: none;">
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>Firstname</th>
                                             <th>Lastname</th>
                                             <th>Email</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>John</td>
                                             <td>Doe</td>
                                             <td>john@example.com</td>
                                          </tr>
                                          <tr>
                                             <td>Mary</td>
                                             <td>Moe</td>
                                             <td>mary@example.com</td>
                                          </tr>
                                       </tbody>
                                   </table>
                                 </div>
                              </section>
                              {{-- đã hủy --}}
                              <section class="toggle">
                                 <label><i class="far fa-times-circle icon-cancel"></i>Đơn Đã Hủy</label>
                                 <div class="toggle-content" style="display: none;">
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th>Firstname</th>
                                             <th>Lastname</th>
                                             <th>Email</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <tr>
                                             <td>John</td>
                                             <td>Doe</td>
                                             <td>john@example.com</td>
                                          </tr>
                                          <tr>
                                             <td>Mary</td>
                                             <td>Moe</td>
                                             <td>mary@example.com</td>
                                          </tr>
                                       </tbody>
                                   </table>
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@push('libs-scripts')

@endpush

@push('page-scripts')

@endpush
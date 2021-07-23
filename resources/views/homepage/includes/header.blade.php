<style>
  #mini-cart .cart-head:after {
    content: "";
  }
</style>
<div class="header-wrapper">
    <header id="header" class="header-builder header-loaded" style="">
        <div class="header-main" style="top: 0px;">
            <div class="header-row container">
                <div class="header-col header-left">
                    <a class="mobile-toggle"><i class="fas fa-bars"></i></a>
                    <h1 class="logo logo-transition">
                        <img class="img-responsive standard-logo retina-logo" src="//www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-content/uploads/images/logo_ecomblue.png">
                    </h1>
                </div>
                <div class="header-col header-right">
                    <div class="custom-html ml-5 mr-4 d-none d-lg-block">
                        <div class="porto-sicon-box text-left style_1 default-icon">
                            <div class="porto-sicon-default">
                                <div class="porto-just-icon-wrapper" style="text-align:center;">
                                    <div class="porto-sicon-img " style="display:inline-block;font-size: 30px;">
                                        <img class="img-icon" alt="" src="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-content/uploads/sites/116/2019/09/shop4_header_phone.png" width="30" height="31"/>
                                    </div>
                                </div>
                            </div>
                            <div class="porto-sicon-header">
                                <h3 class="porto-sicon-title" style="font-weight:600;font-size:11px;line-height:11px;color:#777;">CALL US NOW</h3>
                                <p style="font-weight:700;font-size:18px;line-height:18px;color:#222529;">+123 5678 890</p>
                            </div>
                        </div>
                    </div>
                    @if($customer)
                        <div class="custom-html">
                            <a href="javascript:;" class="header-icon-user"><i class="far fa-user"></i></a>
                        </div>
                        <div class="custom-html mr-1">
                            <a href="javascript:;" class="header-phone" style="color: #7ba7e2">{{ $customer->name ? 'Chào , '.$customer->name : $customer->phone }}</a>
                        </div>
                    @endif
                    <div id="mini_cart" class="mini-cart minicart-arrow-alt">
                        <div class="cart-head header-icon-cart">
                            <span class="cart-icon" style="position: relative;">
                                <span class="header-icon-cart"><i class="fas fa-shopping-cart"></i></span>
                                    @if($cart_items)
                                        <span class="icon-cart-number cart-items-count">{{ $cart_items->count() }}</span>
                                    @else
                                        <span class="icon-cart-number cart-items-count">0</span>
                                    @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-bottom main-menu-wrap" style="top: 0px;">
            <div class="header-row container">
                <div class="header-col header-left">
                    <ul id="menu-main-menu" class="main-menu mega-menu menu-hover-line show-arrow">
          	            {{-- trang chủ --}}
                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-143 current_page_item active narrow"><a href="{{route('home')}}" class=" current">Trang Chủ</a></li>
                        {{-- danh mục --}}
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children narrow sub-ready">
                            <a class="nolink" href="#">Danh Mục <i class="fas fa-chevron-down"></i></a>
                            <div class="popup" style="display: block;">
                                <div class="inner" style="">
                                    <ul class="sub-menu">
                          	            @forelse($categories as $item)
                                            <li id="nav-menu-item-2021" class="menu-item menu-item-type-custom menu-item-object-custom" data-cols="1">
                             	                <a href="{{route('categories',['code'=>$item->code])}}">{{ $item->pretty_name }} <span class="tip" style="">NEW</span></a>
                                            </li>
                                        @empty
                                            <h1>chưa có danh mục nào</h1>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page narrow"><a href="#shop_contact_info">Liên Hệ</a></li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page narrow"><a href="{{route('home')}}">Giới Thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#mini_cart").click(function(event) {
            window.location.replace("{{ route('mycart') }}");
        });

    });
</script>
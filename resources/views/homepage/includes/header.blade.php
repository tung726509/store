<div class="header-wrapper">
  <header id="header" class="header-builder header-loaded" style="">
     <div class="header-main" style="top: 0px;">
        <div class="header-row container">
           <div class="header-col header-left">
              <a class="mobile-toggle"><i class="fas fa-bars"></i></a>
              <h1 class="logo logo-transition"> <a href="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/" title="Porto Shop 4 using Gutenberg - Porto Wordpress Demo site" rel="home"> <img class="img-responsive standard-logo retina-logo" src="//www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-content/uploads/images/logo_ecomblue.png" alt="Porto Shop 4 using Gutenberg"> </a></h1>
           </div>
           <div class="header-col header-right">
              <div class="searchform-popup">
                 <a class="search-toggle"><i class="fas fa-search"></i><span class="search-text">Search</span></a>
                 <form action="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/" method="get"
                    class="searchform searchform-cats">
                    <div class="searchform-fields">
                       <span class="text"><input name="s" type="text" value="" placeholder="Search&hellip;" autocomplete="off" /></span> <input type="hidden" name="post_type" value="product"/> 
                       <select  name='product_cat' id='product_cat' class='cat' >
                          <option value='0'>All Categories</option>
                          <option class="level-0" value="accessories">Accessories</option>
                          <option class="level-1" value="caps">&nbsp;&nbsp;&nbsp;Caps</option>
                          <option class="level-1" value="watches">&nbsp;&nbsp;&nbsp;Watches</option>
                          <option class="level-0" value="dress">Dress</option>
                          <option class="level-1" value="clothing">&nbsp;&nbsp;&nbsp;Clothing</option>
                          <option class="level-2" value="hoodies">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hoodies</option>
                          <option class="level-0" value="electronics">Electronics</option>
                          <option class="level-1" value="toys">&nbsp;&nbsp;&nbsp;Toys</option>
                          <option class="level-0" value="fashion">Fashion</option>
                          <option class="level-1" value="shoes">&nbsp;&nbsp;&nbsp;Shoes</option>
                          <option class="level-1" value="t-shirts-fashion">&nbsp;&nbsp;&nbsp;T-Shirts</option>
                       </select>
                       <span class="button-wrap"> <button class="btn btn-special" title="Search" type="submit"><i class="fas fa-search"></i></button> </span>
                    </div>
                    <div class="live-search-list"></div>
                 </form>
              </div>
              <div class="custom-html ml-5 mr-4 d-none d-lg-block">
                 <div class="porto-sicon-box text-left style_1 default-icon">
                    <div class="porto-sicon-default">
                       <div id="porto-icon-10056015155ea931878fa2d" class="porto-just-icon-wrapper" style="text-align:center;">
                          <div class="porto-sicon-img " style="display:inline-block;font-size: 30px;"><img class="img-icon" alt="" src="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-content/uploads/sites/116/2019/09/shop4_header_phone.png" width="30" height="31" /></div>
                       </div>
                    </div>
                    <div class="porto-sicon-header" >
                       <h3 class="porto-sicon-title" style="font-weight:600;font-size:11px;line-height:11px;color:#777;">CALL US NOW</h3>
                       <p style="font-weight:700;font-size:18px;line-height:18px;color:#222529;">+123 5678 890</p>
                    </div>
                    <!-- header -->
                 </div>
                 <!-- porto-sicon-box -->
              </div>
              <div class="custom-html"><a href="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/my-account/" class="my-account" title="My Account"><i class="porto-icon-user-2"></i></a></div>
              <div class="custom-html mr-1"><a href="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/wishlist/" class="wishlist" title="Wishlist"><i class="porto-icon-wishlist-2"></i></a></div>
              <div id="mini-cart" class="mini-cart minicart-arrow-alt">
                 <div class="cart-head"> <span class="cart-icon"><i class="minicart-icon porto-icon-bag-2"></i><span class="cart-items"><i class="fas fa-spinner fa-pulse"></i></span></span><span class="cart-items-text"><i class="fas fa-spinner fa-pulse"></i></span></div>
                 <div class="cart-popup widget_shopping_cart">
                    <div class="widget_shopping_cart_content">
                       <div class="cart-loading"></div>
                    </div>
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
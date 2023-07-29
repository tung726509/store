<style>
  #mini-cart .cart-head:after {
    content: "";
  }
  .mobile-toggle {
    color: white !important;
  }
  .active>a {
    background-color: #ff9900 !important;
    color: white !important;
    padding: 20px !important;
  }
  .active>a:before {
    background-color: #ff9900 !important;
  }
  .menu-item {
    margin-right: 0px !important;
  }
  .menu-item>a {
    padding: 20px !important;
  }
  .header-main {
    background-image: url('/homepage/images/1685524449.png');
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #070101 !important;
    height: 200px;
  }

  @media only screen and (max-width: 991px) {
    .header-main {
        height: 90px;
    }
  }
  .sticky {
    background-repeat: no-repeat !important;
  }
  .header-row {
    height: 90px;
  }
</style>
<div class="header-wrapper">
    <header id="header" class="header-builder header-loaded" style="">
        <div class="header-main" style="top: 0px;">
            <div class="header-row container">
                <div class="header-col header-left">
                    <a class="mobile-toggle"><i class="fas fa-bars"></i></a>
                    {{-- <h1 class="logo logo-transition">
                        <img class="img-responsive standard-logo retina-logo" src="//www.portotheme.com/wordpress/porto/gutenberg-shop4/wp-content/uploads/images/logo_ecomblue.png">
                    </h1> --}}
                </div>
            </div>
        </div>

        <div class="header-bottom main-menu-wrap" style="top: 0px;">
            <div class="header-row container">
                <div class="header-col header-left">
                    <ul id="menu-main-menu" class="main-menu mega-menu menu-hover-line show-arrow">
          	            {{-- trang chủ --}}
                        {{-- <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-143 current_page_item active narrow"><a href="{{route('home')}}" class=" current">Trang Chủ</a></li> --}}
                        {{-- danh mục --}}
                        @foreach($categories as $item)
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-143 current_page_item narrow {{ (isset($category) && $item->code === $category->code) ? 'active' : ''}}">
                                <a href="{{route('categories',['code'=>$item->code])}}" class=" current">{{ $item->pretty_name }}</a>
                            </li>
                        @endforeach
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

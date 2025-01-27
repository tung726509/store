<style type="text/css">
	#side-nav-panel .accordion-menu .arrow:before {
    	content: '';
	}
	#side-nav-panel .accordion-menu .open>.arrow:before {
    	content: '';
	}
</style>

<div id="side-nav-panel" class="">
	{{-- <a href="#" class="side-nav-panel-close"><i class="fas fa-times"></i></a> --}}
    <form action="https://www.portotheme.com/wordpress/porto/gutenberg-shop4/" method="get" class="searchform searchform-cats">
        <div class="searchform-fields">
            <span class="text"><input name="s" type="text" value="" placeholder="Search…" autocomplete="off"></span> <input type="hidden" name="post_type" value="product">
            <span class="button-wrap"> <button class="btn btn-special" title="Search" type="submit"><i class="fas fa-search"></i></button> </span>
        </div>
    </form>
	<div class="menu-wrap">
	  	<ul id="menu-main-menu-1" class="mobile-menu accordion-menu">
		  	{{-- trang chủ --}}
	     	<li class="menu-item"><a href="{{route('home')}}">Trang Chủ</a></li>
	     	{{-- danh mục --}}
            @forelse($categories as $item)
    	     	<li class="menu-item"><a href="{{route('categories',['code'=>$item->code])}}">{{$item->pretty_name}}</a></li>
            @empty
            @endforelse
	     	{{-- liên hệ --}}
		    {{-- <li class="menu-item"><a href="{{route('home')}}">Liên Hệ</a></li> --}}
	     	{{-- giới thiệu --}}
	     	{{-- <li class="menu-item"><a href="{{route('home')}}">Giới Thiệu</a></li> --}}
	  	</ul>
	</div>
	<div class="share-links">
		<a target="_blank" rel="nofollow" class="share-facebook" href="#" title="Facebook"></a>
		<a target="_blank" rel="nofollow" class="share-twitter" href="#" title="Twitter"></a>
		<a target="_blank" rel="nofollow" class="share-instagram" href="#" title="Instagram"></a>
		<a target="_blank" rel="nofollow" class="share-youtube" href="#" title="Youtube"></a>
	</div>
</div>

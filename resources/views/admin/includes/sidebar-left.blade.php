<style type="text/css">
  .text-blue-t{
    color: #3399FF;
    font-weight: 900;
    font-size: 12px;
  }
  .text-red-t{
    color: #f1556c!important;
    font-weight: 900;
    font-size: 12px;
  }
  .text-white-t{
    font-weight: 900;
    font-size: 12px;
  }
</style>

<div class="left-side-menu">
    <div class="logo-box text-center">
        <a href="{{route('administrator.dashboard')}}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{asset('admini/images/logo-sm.png')}}" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admini/images/logo-dark.png')}}" alt="" height="22">
            </span>
        </a>

        <a href="index.html" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{asset('admini/images/logo-sm.png')}}" alt="" height="24">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admini/images/logo-light.png')}}" alt="" height="22">
            </span>
        </a>
    </div>
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('admini/images/empty-avatar.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
               <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{Auth::user()->name}}</a>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="animate__animated animate__bounceInLeft animate__faster">
              <ul class="metismenu" id="side-menu">
                <li class="menu-title">1 . <span class="text-blue-t">Quản Lý Bán Hàng</span></li>
                <li>
                    <a href="#" class="direct-link">
                    <i class="fas fa-chart-line"></i>
                    <span> Thống Kê </span>
                    </a>
                </li>
                {{-- đơn mới --}}
                <li>
                    <a href="#menuOrder" data-toggle="collapse">
                        <i class="fas fa-print"></i>
                        <span> Đơn Hàng <span class="badge badge-danger">3</span></span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuOrder">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.order.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.order.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#menuCustomer" data-toggle="collapse">
                        <i class="fas fa-users"></i>
                        <span> Khách Hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuCustomer">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.customer.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.customer.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                 
                <li class="menu-title">2 . <span class="text-red-t">Khởi Tạo</span></li>
                {{-- danh mục --}}
                <li> 
                    <a href="#menuCategory" data-toggle="collapse">
                        <i class="fas fa-list"></i>
                        <span> Danh Mục </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuCategory">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.category.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.category.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                {{-- sản phẩm --}}
                <li>
                    <a href="#menuProduct" data-toggle="collapse">
                        <i class="fas fa-box-open"></i>
                        <span> Sản Phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuProduct">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.product.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.product.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                {{-- tag --}}
                <li>
                    <a href="#menuTag" data-toggle="collapse">
                        <i class="fas fa-tags"></i>
                        <span> Thẻ Tag </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuTag">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.tag.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.tag.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                {{-- kho --}}
                <li>
                    <a href=#menuWarehouse data-toggle="collapse">
                        <i class="fas fa-warehouse"></i>
                        <span> Kho </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuWarehouse">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.warehouse.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.warehouse.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title">3 . <span class="text-white-t">Hệ Thống</span></li>
                {{-- tài khoản --}}
                <li>
                    <a href="#menuAccount" data-toggle="collapse">
                        <i class="far fa-user-circle"></i>
                        <span> Tài Khoản </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuAccount">
                        <ul class="nav-second-level">
                           <li><a href="{{route('administrator.user.index')}}" class="direct-link"><i class="fas fa-ellipsis-v" style="padding-left:3px;padding-right:3px;"></i> Tất Cả</a></li>
                           <li><a href="{{route('administrator.user.add')}}" class="direct-link"><i class="fas fa-plus"></i> Thêm Mới</a></li>
                           
                        </ul>
                    </div>
                </li>
                {{-- phân quyền --}}
                <li>
                    <a href="{{ route('administrator.role.index') }}" class="direct-link">
                    <i class="far fa-hand-rock"></i>
                    <span>Phân Quyền</span>
                    </a>
                </li>
                {{-- cài đặt --}}
                <li>
                    <a href="#menuSetting" data-toggle="collapse">
                        <i class="fas fa-cogs"></i>
                        <span> Cài Đặt </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="menuSetting">
                        <ul class="nav-second-level " aria-expanded="false">
                            {{-- phân quyền --}}
                            {{-- <li><a href="{{ route('administrator.role.index') }}" aria-expanded="false"><i class="far fa-hand-rock"></i> Phân Quyền</a></li> --}}
                            {{-- site bán hàng --}}
                            <li>
                                <a href="#menuWebsite" data-toggle="collapse">Trang Chủ
                                  <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="menuWebsite">
                                    <ul class="nav-third-level" aria-expanded="false">
                                        <li>    
                                            <a href="{{route('administrator.option.banner')}}" class="direct-link"> 1 . Banner Quảng Cáo</a>
                                        </li>
                                        <li>
                                            <a href="{{route('administrator.option.incentive')}}" class="direct-link"> 2 . Ưu Đãi Cho Khách Hàng</a>
                                        </li>
                                        <li>
                                            <a href="{{route('administrator.option.aboutus')}}" class="direct-link">3 . Thông Tin Cửa Hàng</a>
                                        </li>
                                        <li>
                                            <a href="#" class="direct-link">4 . Danh Mục</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>
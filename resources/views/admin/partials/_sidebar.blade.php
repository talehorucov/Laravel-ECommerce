@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
//dd($prefix);
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('admin.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Smart Buy</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ $route == 'admin.dashboard' ? 'active white' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i style="font-size: 20px" class="fas fa-chart-pie-alt"></i>
                    <span>Ana Səhifə</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == 'admin/brand' or $route == 'admin.brand.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-blog"></i>
                    <span>Brendlər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.brand.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.brand.index') }}"><i class="ti-more"></i>Brendlər</a>
                    </li>
                </ul>
            </li>

            <li
                class="treeview {{ ($prefix == 'admin/category' or $route == 'admin.category.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-align-left"></i>
                    <span>Kateqoriyalar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.category.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.category.index') }}"><i class="ti-more"></i>Kateqoriyalar</a>
                    </li>
                    <li class="{{ $route == 'admin.subcategories' ? 'active' : '' }}">
                        <a href="{{ route('admin.subcategories') }}"><i class="ti-more"></i>
                            ALt Kateqoriyalar</a>
                    </li>
                    <li class="{{ $route == 'admin.subsubcategories' ? 'active' : '' }}">
                        <a href="{{ route('admin.subsubcategories') }}"><i class="ti-more"></i>
                            Alt Alt->Kateqoriyalar</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/color' or $route == 'admin.color.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size:20px" class="fas fa-palette"></i>
                    <span>Rənglər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.color.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.color.index') }}"><i class="ti-more"></i>Rənglər</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/size' or $route == 'admin.size.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size:20px" class="fas fa-compress-alt"></i>
                    <span>Ölçülər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.size.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.size.index') }}"><i class="ti-more"></i>Ölçülər</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/tag' or $route == 'admin.tag.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size:18px" class="fas fa-tags"></i>
                    <span>Teqlər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.tag.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.tag.index') }}"><i class="ti-more"></i>Teqlər</a>
                    </li>
                </ul>
            </li>

            <li
                class="treeview {{ ($prefix == 'admin/product' or $route == 'admin.product.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size:20px" class="fas fa-box-alt"></i>
                    <span>Məhsullar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.product.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.product.index') }}"><i class="ti-more"></i>Məhsullar</a>
                    </li>
                    <li class="{{ $route == 'admin.product.add' ? 'active' : '' }}">
                        <a href="{{ route('admin.product.add') }}"><i class="ti-more"></i>Məhsul Əlavə
                            Et</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/slider' or $route == 'admin.sliders') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-images"></i>
                    <span>Slayderlər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.slider.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.slider.index') }}"><i class="ti-more"></i>Slayderlər</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/coupon' or $route == 'admin.coupons') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-badge-percent"></i>
                    <span>Kuponlar</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.coupon.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.coupon.index') }}"><i class="ti-more"></i>Kuponlar</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == 'admin/shipping' ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-shipping-fast"></i>
                    <span>Çatdırılma</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.city.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.city.index') }}"><i class="ti-more"></i>Şəhər</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == 'admin/order' or $route == 'admin.orders') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size: 20px" class="fas fa-badge-percent"></i>
                    <span>Sifarişlər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.pending.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.pending.order') }}"><i class="ti-more"></i>Gözləyən
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.confirmed.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.confirmed.order') }}"><i class="ti-more"></i>Təsdiqlənmiş
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.processing.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.processing.order') }}"><i class="ti-more"></i>Hazırlanan
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.picked.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.picked.order') }}"><i class="ti-more"></i>Əldə Edilmiş
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.shipped.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.shipped.order') }}"><i class="ti-more"></i>Göndərilmiş
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.delivered.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.delivered.order') }}"><i class="ti-more"></i>Təhvil Verilmiş
                            Sifarişlər</a>
                    </li>
                    <li class="{{ $route == 'admin.cancel.order' ? 'active' : '' }}">
                        <a href="{{ route('admin.cancel.order') }}"><i class="ti-more"></i>Ləğv Edilmiş
                            Sifarişlər</a>
                    </li>
                </ul>
            </li>

            <li
                class="treeview {{ ($prefix == 'admin/users' or $route == 'admin.user.index') ? 'active' : '' }}">
                <a href="#">
                    <i style="font-size:20px" class="fas fa-users"></i>
                    <span>İstifadəçilər</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.user.index' ? 'active' : '' }}">
                        <a href="{{ route('admin.user.index') }}"><i class="ti-more"></i>İstifadəçilər</a>
                    </li>                    
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>

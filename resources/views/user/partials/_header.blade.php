@php
$categories = App\Models\Category::with('subcategories.subsubcategories')
    ->take(8)
    ->get();
@endphp
<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="{{ route('user.wishlist') }}"><i class="icon fa fa-heart"></i>İstək</a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>Səbətim</a></li>
                        @auth
                            <li><a href="{{ route('login') }}"><i class="icon fa fa-user"></i>Hesabım</a></li>
                        @else
                            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Giriş/Qeydiyyat</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="/">
                            <img style="margin-bottom: 10px" src="{{ asset('backend/images/logo-light.png') }}"
                                alt="logo"> <span style="font-size: 22px; color:#732bef;font-weight:900;">MART
                                BUY</span>
                        </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="GET" action="{{ route('user.product.search') }}">
                            <div class="control-group">
                                <input class="search-field" name="search" placeholder="Axtar" />
                                <button type="submit" class="search-button"></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ========================= SHOPPING CART DROPDOWN ============================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count">
                                    <span class="count" id="cart_quantity"> </span>
                                </div>
                                <div class="total-price-basket">
                                    <span class="total-price">
                                        @if (session('coupon'))
                                            <span
                                                class="value">{{ session('coupon')['total_amount'] }}</span>
                                        @else
                                            <span id="cart_subtotal" class="value"></span>
                                        @endif
                                        <span class="sign">Azn </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Mini Cart Start-->

                                <!-- Mini Cart End-->
                                <div id="mini_cart">

                                </div>
                                <!-- /.cart-item -->
                                <div class="clearfix cart-total">
                                    <div class="pull-right">
                                        @if (session('coupon'))
                                            <span class="text">Kupon :</span>
                                            <span style="color:red">{{ session('coupon')['name'] }}</span><br>
                                            <span class="text">Endirim :</span>
                                            <span style="color:red">{{ session('coupon')['discount_amount'] }}
                                                Azn</span> <br>
                                            <span class="text">Toplam :</span>
                                            <span style="color:red">{{ session('coupon')['total_amount'] }} Azn</span>
                                            <br>
                                        @else
                                            <span class="text">Toplam :</span>
                                            <span class='price' id="cart_subtotal"></span> Azn
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="{{ route('coupon.checkout') }}"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Ödəniş Et</a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}</a>
                                        <ul class="dropdown-menu container">
                                            @if ($category->subcategories->count())
                                                <li>
                                                    <div class="yamm-content ">
                                                        <div class="row">
                                                            @foreach ($category->subcategories as $subcategory)
                                                                <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                    <a
                                                                        href="{{ route('user.subcategory', $subcategory->slug) }}">
                                                                        <h2 class="title">
                                                                            {{ $subcategory->name }}</h2>
                                                                    </a>
                                                                    <ul class="links">
                                                                        @if ($subcategory->subsubcategories->count())
                                                                            @foreach ($subcategory->subsubcategories as $subsubcategory)
                                                                                <li>
                                                                                    <a
                                                                                        href="{{ route('user.subsubcategory', $subsubcategory->slug) }}">{{ $subsubcategory->name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            @endforeach

                                                            {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"
                                                                alt="">
                                                        </div> --}}
                                                            <!-- /.yamm-content -->
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>

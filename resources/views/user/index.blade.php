@extends('user.main_master')
@section('content')
@section('title')
    SmartBuy.Az
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <x-vertical-categories />
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->
                <x-hot-deals />
                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->
                @if (count($products->where('special_offer', 1)) > 0)
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Xüsusi Təkliflər</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div
                                class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @foreach ($products->where('special_offer', 1)->take(3) as $product)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ route('user.product.detail', $product->slug) }}">
                                                                        <img src="{{ asset($product->thumbnail) }}"
                                                                            alt="">
                                                                    </a> </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                                </h3>
                                                                <div class="product-price"> <span
                                                                        class="price">
                                                                        {{ $product->selling_price }} Azn </span> </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                @endif

                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->
                @include('user.common.product_tags')
                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Xüsusi Endirimlər</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            <div class="item">
                                <div class="products special-product">
                                    <div class="product">
                                        @foreach ($products->where('special_deal', 1)->take(3) as $product)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ route('user.product.detail', $product->slug) }}">
                                                                        <img src="{{ asset($product->thumbnail) }}"
                                                                            alt="">
                                                                    </a> </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                                </h3>
                                                                <div class="product-price"> <span
                                                                        class="price">
                                                                        {{ $product->selling_price }} Azn </span> </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach ($sliders as $slider)
                            <div class="item" style="background-image: url({{ asset($slider->image) }});">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs">
                                            <span>{{ $slider->description }}</span>
                                        </div>
                                        {{-- <div class="button-holder fadeInDown-3"> <a
                                                    href="index.php?page=single-product"
                                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                    Now</a> </div> --}}
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                        @endforeach

                        <!-- /.item -->
                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">pul iadəsi</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 gün ərzində pul iadəsi qarantiyası</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Pulsuz Çatdırılma</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">9 manatdan yuxarı sifarişlərdə pusluz çatdırılma</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">bölgələrə Çatdırılma</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Azərbaycanın istənilən bölgəsinə çatdırılma</h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">Yeni Məhsullar</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                    data-toggle="tab">Hamısı</a></li>
                            @foreach ($categories->take(6) as $category)
                                <li><a data-transition-type="backSlide" href="#category{{ $category->slug }}"
                                        data-toggle="tab">{{ $category->name }}</a>
                                </li>
                            @endforeach

                            {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a>
                                </li>
                                <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach ($products->take(6) as $product)
                                        <div class="item item-carousel">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a
                                                                href="{{ route('user.product.detail', $product->slug) }}">
                                                                <img src="{{ asset($product->thumbnail) }}">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                        @if ($product->discount_price == null or $product->discount_price == 0)
                                                            <div class="tag new"><span>yeni</span></div>
                                                        @else
                                                            <div class="tag hot">
                                                                <span>{{ $product->discount_percent }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a
                                                                href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="description"></div>
                                                        @if ($product->discount_price == null or $product->discount_price == 0)
                                                            <div class="product-price">
                                                                <span
                                                                    class="price">{{ $product->selling_price }} Azn
                                                            </div>
                                                        @else
                                                            <div class="product-price"> <span class="price">
                                                                    {{ $product->discount_price }} Azn</span> <span
                                                                    class="price-before-discount">
                                                                    {{ $product->selling_price }} Azn</span> </div>
                                                        @endif

                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary icon"
                                                                        data-toggle="modal" data-target="#productModal"
                                                                        type="button" id="{{ $product->id }}"
                                                                        onclick="productCart(this.id)">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Səbətə Əlavə Et</button>
                                                                </li>
                                                                <li>
                                                                    <button class="btn btn-primary icon" type="button"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)">
                                                                        <i class="fa fa-heart"></i>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                    @endforeach

                                    <!-- /.item -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->

                        @foreach ($categories as $category)
                            <div class="tab-pane" id="category{{ $category->slug }}">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme"
                                        data-item="4">
                                        @forelse ($category->products->take(6) as $product)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ route('user.product.detail', $product->slug) }}"><img
                                                                        src="{{ asset($product->thumbnail) }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                                <div class="tag new"><span>yeni</span></div>
                                                            @else
                                                                <div class="tag hot">
                                                                    <span>{{ $product->discount_percent }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <div class="description"></div>
                                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ $product->selling_price }} Azn
                                                                </div>
                                                            @else
                                                                <div class="product-price"> <span
                                                                        class="price">
                                                                        {{ $product->discount_price }} Azn </span> <span
                                                                        class="price-before-discount">
                                                                        {{ $product->selling_price }} Azn</span> </div>
                                                            @endif

                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        {{-- Add-To-Cart's Modal in main_master page --}}
                                                                        <button class="btn btn-primary icon"
                                                                            data-toggle="modal"
                                                                            data-target="#productModal" type="button"
                                                                            id="{{ $product->id }}"
                                                                            onclick="productCart(this.id)">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        {{-- Add-To-Cart's Modal in main_master page --}}
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Səbətə Əlavə Et</button>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn btn-primary icon"
                                                                            type="button" id="{{ $product->id }}"
                                                                            onclick="addToWishList(this.id)">
                                                                            <i class="fa fa-heart"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                        @empty
                                            <h5 class="text-danger">Məhsul Yoxdur</h5>
                                        @endforelse

                                        <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                        @endforeach

                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Seçilmiş məhsullar</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach ($products->where('featured', 1) as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ route('user.product.detail', $product->slug) }}"><img
                                                        src="{{ asset($product->thumbnail) }}" alt=""></a>
                                            </div>
                                            <!-- /.image -->
                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                <div class="tag new"><span>yeni</span></div>
                                            @else
                                                <div class="tag hot">
                                                    <span>{{ $product->discount_percent }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="description"></div>
                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                <div class="product-price">
                                                    <span class="price">{{ $product->selling_price }} Azn
                                                </div>
                                            @else
                                                <div class="product-price"> <span class="price">
                                                        {{ $product->discount_price }} Azn </span> <span
                                                        class="price-before-discount">
                                                        {{ $product->selling_price }} Azn</span> </div>
                                            @endif

                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        {{-- Add-To-Cart's Modal in main_master page --}}
                                                        <button class="btn btn-primary icon" data-toggle="modal"
                                                            data-target="#productModal" type="button"
                                                            id="{{ $product->id }}" onclick="productCart(this.id)">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        {{-- Add-To-Cart's Modal in main_master page --}}
                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            Səbətə Əlavə Et</button>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-primary icon" type="button"
                                                            id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                        @endforeach

                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== CATEGORY PRODUCTS ============================================== -->

                @foreach ($categories->take(10) as $category)
                    @if ($category->products->count() > 0)
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">{{ $category->name }}</h3>
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                                @foreach ($category->products->take(10) as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ route('user.product.detail', $product->slug) }}"><img
                                                                src="{{ asset($product->thumbnail) }}" alt=""></a>
                                                    </div>
                                                    <!-- /.image -->
                                                    @if ($product->discount_price == null or $product->discount_price == 0)
                                                        <div class="tag new"><span>yeni</span></div>
                                                    @else
                                                        <div class="tag hot">
                                                            <span>{{ $product->discount_percent }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                    </h3>
                                                    <div class="description"></div>
                                                    @if ($product->discount_price == null or $product->discount_price == 0)
                                                        <div class="product-price">
                                                            <span
                                                                class="price">{{ $product->selling_price }} Azn
                                                        </div>
                                                    @else
                                                        <div class="product-price"> <span class="price">
                                                                {{ $product->discount_price }} Azn </span> <span
                                                                class="price-before-discount">
                                                                {{ $product->selling_price }} Azn</span> </div>
                                                    @endif

                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary icon"
                                                                        data-toggle="modal" data-target="#productModal"
                                                                        type="button" id="{{ $product->id }}"
                                                                        onclick="productCart(this.id)">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Səbətə Əlavə Et</button>
                                                                </li>
                                                                <li>
                                                                    <button class="btn btn-primary icon" type="button"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)">
                                                                        <i class="fa fa-heart"></i>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach



                                <!-- /.item -->
                            </div>
                            <!-- /.home-owl-carousel -->
                        </section>
                    @endif
                @endforeach

                <!-- ============================================== CATEGORY PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt="">
                                </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">YENİ KİŞİ MODASI<br>
                                            <span class="shopping-needs">40% -ə qədər endirim</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">YENİ</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== BRAND PRODUCTS ============================================== -->
                @foreach ($brands as $brand)
                    @if ($brand->products->count() > 0)
                        <section class="section featured-product wow fadeInUp">
                            <h3 class="section-title">{{ $brand->name }}</h3>
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                                @foreach ($brand->products->take(10) as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ route('user.product.detail', $product->slug) }}"><img
                                                                src="{{ asset($product->thumbnail) }}" alt=""></a>
                                                    </div>
                                                    <!-- /.image -->
                                                    @if ($product->discount_price == null or $product->discount_price == 0)
                                                        <div class="tag new"><span>yeni</span></div>
                                                    @else
                                                        <div class="tag hot">
                                                            <span>{{ $product->discount_percent }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                    </h3>
                                                    <div class="description"></div>
                                                    @if ($product->discount_price == null or $product->discount_price == 0)
                                                        <div class="product-price">
                                                            <span
                                                                class="price">{{ $product->selling_price }} Azn
                                                        </div>
                                                    @else
                                                        <div class="product-price"> <span class="price">
                                                                {{ $product->discount_price }} Azn </span> <span
                                                                class="price-before-discount">
                                                                {{ $product->selling_price }} Azn</span> </div>
                                                    @endif

                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary icon"
                                                                        data-toggle="modal" data-target="#productModal"
                                                                        type="button" id="{{ $product->id }}"
                                                                        onclick="productCart(this.id)">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    {{-- Add-To-Cart's Modal in main_master page --}}
                                                                    <button class="btn btn-primary cart-btn"
                                                                        type="button">Səbətə Əlavə Et</button>
                                                                </li>
                                                                <li>
                                                                    <button class="btn btn-primary icon" type="button"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)">
                                                                        <i class="fa fa-heart"></i>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach



                                <!-- /.item -->
                            </div>
                            <!-- /.home-owl-carousel -->
                        </section>
                    @endif
                @endforeach
                <!-- ============================================== BRAND PRODUCTS : END ============================================== -->

                <!-- ============================================== BEST SELLER ============================================== -->

                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Çox Satılanlar</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach ($most_sale as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ route('user.product.detail', $product->slug) }}"><img
                                                            src="{{ asset($product->thumbnail) }}"
                                                            alt=""></a>
                                                </div>
                                                <!-- /.image -->
                                                @if ($product->discount_price == null or $product->discount_price == 0)
                                                    <div class="tag new"><span>yeni</span></div>
                                                @else
                                                    <div class="tag hot">
                                                        <span>{{ $product->discount_percent }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="description"></div>
                                                @if ($product->discount_price == null or $product->discount_price == 0)
                                                    <div class="product-price">
                                                        <span
                                                            class="price">{{ $product->selling_price }} Azn
                                                    </div>
                                                @else
                                                    <div class="product-price"> <span class="price">
                                                            {{ $product->discount_price }} Azn </span> <span
                                                            class="price-before-discount">
                                                            {{ $product->selling_price }} Azn</span> </div>
                                                @endif

                                                <!-- /.product-price -->

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            {{-- Add-To-Cart's Modal in main_master page --}}
                                                            <button class="btn btn-primary icon" data-toggle="modal"
                                                                data-target="#productModal" type="button"
                                                                id="{{ $product->id }}"
                                                                onclick="productCart(this.id)">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            {{-- Add-To-Cart's Modal in main_master page --}}
                                                            <button class="btn btn-primary cart-btn" type="button">
                                                                Səbətə Əlavə Et</button>
                                                        </li>
                                                        <li>
                                                            <button class="btn btn-primary icon" type="button"
                                                                id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->

                                    </div>
                                    <!-- /.products -->
                                </div>
                            @endforeach
                        <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- ============================================== BEST SELLER : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('user.partials._brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection

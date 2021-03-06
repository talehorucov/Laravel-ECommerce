@extends('user.main_master')
@section('content')
@section('title')
    Məhsul Təqləri
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Ana Səhifə</a></li>
                <li class='active'>{{ $tag }}</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->
                <x-vertical-categories />
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">shop by</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Category</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @foreach ($categories as $category)
                                        <div class="accordion-group">
                                            <div class="accordion-heading"> <a href="#collapse{{ $category->slug }}"
                                                    data-toggle="collapse" class="accordion-toggle collapsed">
                                                    {{ $category->name }}
                                                </a> </div>
                                            <!-- /.accordion-heading -->
                                            <div class="accordion-body collapse" id="collapse{{ $category->slug }}"
                                                style="height: 0px;">
                                                <div class="accordion-inner">
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <ul>
                                                            <li><a href="#">{{ $subcategory->name }}</a></li>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                                <!-- /.accordion-inner -->
                                            </div>
                                            <!-- /.accordion-body -->
                                        </div>
                                    @endforeach

                                </div>
                                <!-- /.accordion -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Price Slider</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span
                                            class="pull-left">$200.00</span> <span
                                            class="pull-right">$800.00</span> </span>
                                    <input type="text" id="amount"
                                        style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <!-- /.price-range-holder -->
                                <a href="#" class="lnk btn btn-primary">Show Now</a>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->
                        <!-- ============================================== MANUFACTURES============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Manufactures</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Forever 18</a></li>
                                    <li><a href="#">Nike</a></li>
                                    <li><a href="#">Dolce & Gabbana</a></li>
                                    <li><a href="#">Alluare</a></li>
                                    <li><a href="#">Chanel</a></li>
                                    <li><a href="#">Other Brand</a></li>
                                </ul>
                                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== MANUFACTURES: END ============================================== -->
                        <!-- ============================================== COLOR============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <div class="widget-header">
                                <h4 class="widget-title">Colors</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul class="list">
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Yellow</a></li>
                                    <li><a href="#">Pink</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Teal</a></li>
                                </ul>
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COLOR: END ============================================== -->
                        <!-- ============================================== COMPARE============================================== -->
                        <div class="sidebar-widget wow fadeInUp outer-top-vs">
                            <h3 class="section-title">Compare products</h3>
                            <div class="sidebar-widget-body">
                                <div class="compare-report">
                                    <p>You have no <span>item(s)</span> to compare</p>
                                </div>
                                <!-- /.compare-report -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== COMPARE: END ============================================== -->

                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->

                <!-- /.col -->
            </div>
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image"> <img
                                src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                                class="img-responsive"> </div>
                        <div class="container-fluid">
                            <div class="caption vertical-top text-left">
                                <div class="big-text"> Big Sale </div>
                                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet,
                                    consectetur
                                    adipiscing elit </div>
                            </div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                </div>


                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                class="icon fa fa-th-large"></i>Grid</a> </li>
                                    <li><a data-toggle="tab" href="#list-container"><i
                                                class="icon fa fa-th-list"></i>List</a></li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-6 col-md-4 text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a
                                                                href="{{ route('user.product.detail', $product->slug) }}"><img
                                                                    src="{{ asset($product->thumbnail) }}" alt=""></a>
                                                        </div>
                                                        <!-- /.image -->
                                                        @if ($product->discount_price == null or $product->discount_price == 0)
                                                            <div class="tag new"><span>new</span></div>
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
                                                                        type="button">Səbətə
                                                                        Əlavə Et</button>
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

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="list-container">
                            <div class="category-product">
                                @foreach ($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img
                                                                    src="{{ asset($product->thumbnail) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a
                                                                    href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                                <div class="product-price">
                                                                    <span
                                                                        class="price">{{ $product->selling_price }} Azn
                                                                </div>
                                                            @else
                                                                <div class="product-price"> <span
                                                                        class="price">
                                                                        {{ $product->discount_price }} Azn </span>
                                                                    <span class="price-before-discount">
                                                                        {{ $product->selling_price }} Azn</span>
                                                                </div>
                                                            @endif
                                                            <div class="description m-t-10">
                                                                {{ $product->short_desc }}
                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            {{-- Add-To-Cart's Modal in main_master page --}}
                                                                            <button class="btn btn-primary icon"
                                                                                data-toggle="modal"
                                                                                data-target="#productModal"
                                                                                type="button" id="{{ $product->id }}"
                                                                                onclick="productCart(this.id)">
                                                                                <i class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            {{-- Add-To-Cart's Modal in main_master page --}}
                                                                            <button class="btn btn-primary cart-btn"
                                                                                type="button">Səbətə
                                                                                Əlavə Et</button>
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
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
                                                @if ($product->discount_price == null or $product->discount_price == 0)
                                                    <div class="tag new"><span>sale</span></div>
                                                @else
                                                    <div class="tag hot">
                                                        <span>{{ $product->discount_percent }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach

                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

    </div>
    <!-- /.body-content -->


@endsection

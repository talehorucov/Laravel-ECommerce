@extends('user.main_master')
@section('content')
@section('title')
    {{ $product->name }} məhsulu haqqında məlumat
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li><a href="#">Clothing</a></li>
                <li class='active'>Floral Print Buttoned</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">

                    <!-- ============================================== HOT DEALS ============================================== -->
                    <x-hot-deals />
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                </div>
            </div><!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="detail-block">
                    <div class="row wow fadeInUp">

                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    <div class="single-product-gallery-item" id="slide0">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="{{ asset($product->thumbnail) }}">
                                            <img class="img-responsive" alt="" src="{{ asset($product->thumbnail) }}"
                                                data-echo="{{ asset($product->thumbnail) }}" />
                                        </a>
                                    </div>
                                    @foreach ($product->multiProductImg as $image)
                                        <div class="single-product-gallery-item" id="slide{{ $image->id }}">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                                href="{{ asset($image->name) }}">
                                                <img class="img-responsive" alt="" src="{{ asset($image->name) }}"
                                                    data-echo="{{ asset($image->name) }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach

                                </div><!-- /.single-product-slider -->

                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide0">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="{{ asset($product->thumbnail) }}"
                                                    data-echo="{{ asset($product->thumbnail) }}" />
                                            </a>
                                        </div>
                                        @foreach ($product->multiProductImg as $image)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                    data-slide="1" href="#slide{{ $image->id }}">
                                                    <img class="img-responsive" width="85" alt=""
                                                        src="{{ asset($image->name) }}"
                                                        data-echo="{{ asset($image->name) }}" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->



                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h2 class="name">{{ $product->name }}</h2>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    {{ $product->short_desc }}
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->discount_price == null or $product->discount_price == 0)
                                                    <span class="price">{{ $product->selling_price }}</span>
                                                @else
                                                    <span
                                                        class="price">{{ $product->discount_price }}</span>
                                                    <span class="price-strike">{{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Add to Compare" href="#">
                                                    <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="info-title control-label">Rənglər <span>*</span></label>
                                            <select id="color" class="form-control unicase-form-control selectpicker">
                                                <option selected disabled class="text-center">---Rəng Seçin---
                                                </option>
                                                @foreach ($product->colors as $color)
                                                    <option class="text-center" value="{{ ucwords($color->id) }}">
                                                        {{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($product->sizes->count() > 0)
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">Ölçü <span>*</span></label>
                                                <select id="size" class="form-control unicase-form-control selectpicker">
                                                    <option selected disabled class="text-center">---Ölçü Seçin---
                                                    </option>
                                                    @foreach ($product->sizes as $size)
                                                        <option class="text-center"
                                                            value="{{ ucwords($size->id) }}">
                                                            {{ $size->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif


                                </div><!-- /.row -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <label style="margin-top: 10px" for="quantity">Miqdar</label>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <input style="border: 1px solid #000" type="number" id="quantity" name="quantity" min="1" max="{{ $product->quantity }}">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                                        <div class="col-sm-6">
                                            <button type="submit" onclick="addToCart()" style="float: right" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</button>
                                        </div>


                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->






                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">Açqlama</a>
                                </li>
                                <li><a data-toggle="tab" href="#tags">Təqlər</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">

                            <div class="tab-content">

                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">
                                            {!! $product->long_desc !!}
                                        </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="tags" class="tab-pane">
                                    <div class="product-tag">

                                        <h4 class="title">Məhsul Təqləri</h4>
                                        <div class="sidebar-widget-body outer-top-xs">
                                            <div class="tag-list">
                                                @foreach ($product->tags as $tag)
                                                    <a class="item active" href="{{ route('user.tags',strtolower($tag->name)) }}">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                            <!-- /.tag-list -->
                                        </div>

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->

                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Oxşar Məhsullar</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @foreach ($similar_products as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img src="{{ asset($product->thumbnail) }}"
                                                        alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a
                                                    href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                <div class="product-price">
                                                    <span class="price">${{ $product->selling_price }}
                                                </div>
                                            @else
                                                <div class="product-price"> <span class="price">
                                                        ${{ $product->discount_price }} </span> <span
                                                        class="price-before-discount">$
                                                        {{ $product->selling_price }}</span> </div>
                                            @endif

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @endforeach

                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div>
</div>

@endsection

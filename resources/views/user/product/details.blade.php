@extends('user.main_master')
@section('content')
@section('title')
    {{ $product->name }} məhsulu haqqında məlumat
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Ana Səhifə</a></li>
                <li class='active'>
                    {{ $product->name }}</a>
                </li>
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
                                @if ($product)
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Səbəttə :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">{{ $product->quantity }} Ədəd</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>
                                @endif
                                <!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    Qısa Açıqlama: {{ $product->short_desc }}
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->discount_price == null or $product->discount_price == 0)
                                                    <span class="price">{{ $product->selling_price }}
                                                        Azn</span>
                                                @else
                                                    <span class="price">{{ $product->discount_price }}
                                                        Azn</span>
                                                    <span class="price-strike">{{ $product->selling_price }}
                                                        Azn</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <button class="btn btn-primary icon" type="button"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                    <i class="fa fa-heart"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="info-title control-label">Rənglər <span>*</span></label>
                                            <select id="color" class="form-control unicase-form-control selectpicker">
                                                @foreach ($product->colors as $color)
                                                    <option class="text-center"
                                                        value="{{ ucwords($color->name) }}">
                                                        {{ $color->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($product->sizes->count() > 0)
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="info-title control-label">Ölçü <span>*</span></label>
                                                <select id="size"
                                                    class="form-control unicase-form-control selectpicker">
                                                    @foreach ($product->sizes as $size)
                                                        <option class="text-center"
                                                            value="{{ ucwords($size->name) }}">
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
                                                    <input style="border: 1px solid #000" type="number" value="1"
                                                        id="quantity" name="quantity" min="1"
                                                        max="{{ $product->quantity }}">
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                                        <div class="col-sm-6">
                                            <button type="submit" onclick="addToCart()" style="float: right"
                                                class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> Səbətə Əlavə
                                                Et</button>
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
                                                    <a class="item active"
                                                        href="{{ route('user.tags', strtolower($tag->name)) }}">{{ $tag->name }}</a>
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
                                                <a href="{{ route('user.product.detail',$product->slug) }}"><img src="{{ asset($product->thumbnail) }}"
                                                        alt=""></a>
                                            </div><!-- /.image -->
                                            @if ($product->discount_price == null or $product->discount_price == 0)
                                                <div class="tag new"><span>yeni</span></div>
                                            @else
                                                <div class="tag hot">
                                                    <span>{{ $product->discount_percent }}</span>
                                                </div>
                                            @endif
                                        </div><!-- /.product-image -->


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
                                                        {{ $product->discount_price }} Azn</span> <span
                                                        class="price-before-discount">
                                                        {{ $product->selling_price }} Azn</span> </div>
                                            @endif

                                        </div><!-- /.product-info -->
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
                                                        <button class="btn btn-primary cart-btn" type="button">Səbətə
                                                            Əlavə Et</button>
                                                    </li>
                                                    <li>
                                                        <button class="btn btn-primary icon" type="button"
                                                            id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
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

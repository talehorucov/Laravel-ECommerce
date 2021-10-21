<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">xüsusi endirimlər</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($hot_deals as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> <img src="{{ asset($product->thumbnail) }}" alt="">
                        </div>
                        @if ($product->discount_percent)
                            <div class="sale-offer-tag"><span>{{ $product->discount_percent }}<br>
                                    off</span></div>
                        @endif
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a
                                href="{{ route('user.product.detail', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="rating rateit-small"></div>
                        @if ($product->discount_price == null or $product->discount_price == 0)
                            <div class="product-price">
                                <span class="price">${{ $product->selling_price }}
                            </div>
                        @else
                            <div class="product-price"> <span class="price">
                                    ${{ $product->discount_price }} Azn</span> <span class="price-before-discount">$
                                    {{ $product->selling_price }} Azn</span> </div>
                        @endif
                        <!-- /.product-price -->
                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="modal" data-target="#productModal"
                                    type="button" id="{{ $product->id }}" onclick="productCart(this.id)">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                {{-- Add-To-Cart's Modal in main_master page --}}
                                <button class="btn btn-primary cart-btn" data-toggle="modal" data-target="#productModal"
                                id="{{ $product->id }}" onclick="productCart(this.id)" type="button">Səbətə Əlavə Et</button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach

    </div>
    <!-- /.sidebar-widget -->
</div>

@extends('user.main_master')
@section('content')
@section('title')
    Mənim Səbətim
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Ana Səhifə</a></li>
                <li class='active'>Mənim Səbətim</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Şəkil</th>
                                    <th class="cart-description item">Ad</th>
                                    <th class="cart-product-name item">Rəng</th>
                                    <th class="cart-edit item">Ölçü</th>
                                    <th class="cart-qty item">Miqdar</th>
                                    <th class="cart-sub-total item">Toplam</th>
                                    <th class="cart-total last-item">Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="text-align: center" class="col-md-2">
                                            <img style="width:90px;height:90px;"
                                                src="{{ asset($cart->options->image) }}">
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            <div class="product-name">
                                                <a href="#">{{ $cart->name }}</a>
                                            </div>
                                            <div class="price">
                                                {{ $cart->price }} Azn
                                            </div>
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            {{ $cart->options->color }}
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            @if ($cart->options->size)
                                                {{ $cart->options->size }}
                                            @else
                                                Rəng Yoxdur
                                            @endif
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            <input style="width:25px" type="text" name="quantity"
                                                value="{{ $cart->qty }}" min="1" disabled>
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            {{ $cart->subtotal }} Azn
                                        </td>
                                        <td style="text-align: center" class="col-md-1 close-btn">
                                            <button type="submit" id="{{ $cart->rowId }}"
                                                onclick="RemoveCart(this.id)" class="btn btn-danger"><i
                                                    class=" fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                </div>
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table class="table">
                        @if (!session('coupon'))
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input id="name" type="text"
                                                class="form-control unicase-form-control text-input"
                                                placeholder="You Coupon..">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary"
                                                onclick="applyCoupon()">
                                                APPLY COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->

                        @endif
                    </table><!-- /table -->
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-4 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="CouponCalculate">
                            @if (session('coupon') and Cart::total() > 0)
                                <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md ml-3">{{ Cart::total() }} Azn</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Coupon<span class="inner-left-md ml-3"> {{ session('coupon')['name'] }}
                                            </span>
                                            <button onclick="removeCoupon()" class="btn btn-danger" type="submit"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                        <div class="cart-sub-total">
                                            Discount Amount<span
                                                class="inner-left-md ml-3">{{ session('coupon')['discount_amount'] }}
                                                Azn</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span
                                                class="inner-left-md ml-3">{{ session('coupon')['total_amount'] }}
                                                Azn</span>
                                        </div>
                                    </th>
                                </tr>
                            @else
                                <tr>
                                    <th>
                                        <div class="cart-sub-total">
                                            Subtotal<span class="inner-left-md">{{ Cart::subtotal() }} Azn</span>
                                        </div>
                                        <div class="cart-grand-total">
                                            Grand Total<span class="inner-left-md"> {{ Cart::total() }} Azn</span>
                                        </div>
                                    </th>
                                </tr>
                            @endif
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <button type="submit" class="btn btn-primary checkout-btn">PROCCED TO
                                            CHEKOUT</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
    @include('user.partials._brands')
</div><!-- /.body-content -->

@endsection

<script>
    function RemoveCart(id) {
        var url = '{{ route('user.cart.remove', ':id') }}';
        url = url.replace(':id', id);

        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            success: function(data) {
                location.reload();
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }

    function applyCoupon() {
        var name = $('#name').val();
        $.ajax({
            type: "GET",
            dataType: "json",
            data: {
                name: name
            },
            url: '{{ route('apply.coupon') }}',
            success: function(data) {
                if (data.success) {
                    CalculateCoupon();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else if (data.error) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }

    function CalculateCoupon() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('apply.coupon.calculate') }}',
            success: function(data) {
                if (data.total) {
                    $('#CouponCalculate').html(
                        `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md">${data.total} Azn</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md"> ${data.total} Azn</span>
                            </div>
                        </th>
                    </tr>`
                    )
                } else {
                    $('#CouponCalculate').html(
                        `<tr>
                        <th>
                            <div class="cart-sub-total">
                                Subtotal<span class="inner-left-md ml-3">${data.subtotal} Azn</span>
                            </div>
                            <div class="cart-grand-total">
                                Coupon<span class="inner-left-md ml-3"> ${data.name} </span>
                                <button onclick="removeCoupon()" class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="cart-sub-total">
                                Discount Amount<span class="inner-left-md ml-3">${data.discount_amount} Azn</span>
                            </div>
                            <div class="cart-grand-total">
                                Grand Total<span class="inner-left-md ml-3"> ${data.total_amount} Azn</span>
                            </div>
                        </th>
                    </tr>`
                    )
                }
            }
        });
    }

    function removeCoupon() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('coupon.remove') }}',
            success: function(data) {
                if (data.success) {
                    CalculateCoupon();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }
</script>

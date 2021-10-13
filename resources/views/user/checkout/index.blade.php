@extends('user.main_master')
@section('content')
@section('title')
    Ödəniş
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Ana Səhifə</a></li>
                <li class='active'>Ödəniş</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 guest-login">
                                            <h4 class="checkout-subtitle">Guest or Register Login</h4>
                                            <p class="text title-tag-line">Register with us for future convenience:
                                            </p>

                                            <!-- radio-form  -->
                                            <form class="register-form" role="form">
                                                <div class="radio radio-checkout-unicase">
                                                    <input id="guest" type="radio" name="text" value="guest" checked>
                                                    <label class="radio-button guest-check" for="guest">Checkout as
                                                        Guest</label>
                                                    <br>
                                                    <input id="register" type="radio" name="text" value="register">
                                                    <label class="radio-button" for="register">Register</label>
                                                </div>
                                            </form>
                                            <!-- radio-form  -->

                                            <h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
                                            <p class="text title-tag-line ">Register with us for future convenience:
                                            </p>

                                            <ul class="text instruction inner-bottom-30">
                                                <li class="save-time-reg">- Fast and easy check out</li>
                                                <li>- Easy access to your order history and status</li>
                                            </ul>

                                            <button type="submit"
                                                class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>
                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle">Already registered?</h4>
                                            <p class="text title-tag-line">Please log in below:</p>
                                            <form class="register-form" role="form">
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email Address
                                                        <span>*</span></label>
                                                    <input type="email"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputEmail1" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1">Password
                                                        <span>*</span></label>
                                                    <input type="password"
                                                        class="form-control unicase-form-control text-input"
                                                        id="exampleInputPassword1" placeholder="">
                                                    <a href="#" class="forgot-password">Forgot your Password?</a>
                                                </div>
                                                <button type="submit"
                                                    class="btn-upper btn btn-primary checkout-page-button">Login</button>
                                            </form>
                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div>
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach ($carts as $cart)
                                            <li>
                                                <strong>Şəkil:</strong>
                                                <img src="{{ asset($cart->options->image) }}"
                                                    style="height: 80px;width:80px;object-fit">
                                            </li><br>
                                            <li>
                                                <strong>Miqdar:</strong> {{ $cart->qty }} <br>
                                                <strong>Rəng:</strong> {{ $cart->options->color }} <br>
                                                <strong>Ölçü:</strong>
                                                {{ $cart->options->size ? $cart->options->size : 'Qeyd Edilməyib' }}
                                            </li><br>
                                            <li>
                                                <strong>Toplam: {{ $cart->subtotal }} Azn</strong>
                                            </li>
                                            <hr>
                                        @endforeach
                                        @if (session('coupon'))
                                            <li><strong>Kupon:</strong>
                                                <span style="color:red">{{ session('coupon')['name'] }} </span>
                                            </li>
                                            <hr>
                                            <li>
                                                <strong>Endirim:</strong>
                                                <span style="color:red">{{ session('coupon')['discount_amount'] }} Azn
                                                </span>
                                            </li>
                                            <hr>
                                            <li>
                                                <strong>Cəm:</strong>
                                                <span style="color:red">{{ session('coupon')['total_amount'] }} Azn
                                                </span> 
                                            </li>
                                        @else
                                        <li>
                                            <strong>Cəm:</strong>
                                            <span style="color:red">{{ $cart_total }} Azn
                                            </span> 
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div>
</div>

@endsection

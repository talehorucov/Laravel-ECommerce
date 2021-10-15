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
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <form class="register-form" method="POST"
                                                action="{{ route('order.create') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title"><b>Ad Soyad</b> <span>*</span></label>
                                                    <input name="name" type="text" value="{{ Auth()->user()->name }}"
                                                        class="form-control unicase-form-control text-input">
                                                    @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title"><b>Email</b> <span>*</span></label>
                                                    <input name="email" type="email"
                                                        value="{{ Auth()->user()->email }}"
                                                        class="form-control unicase-form-control text-input">
                                                    @error('email')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title"><b>Nömrə</b><span>*</span></label>
                                                    <input name="phone" type="number"
                                                        value="{{ Auth()->user()->phone }}"
                                                        class="form-control unicase-form-control text-input">
                                                    @error('phone')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title"><b>Poçt</b></label>
                                                    <input type="text" name="post_code"
                                                        class="form-control unicase-form-control text-input">
                                                    @error('post_code')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <label class="info-title">Şəhər Seçin <span>*</span></label>
                                                <div class="controls">
                                                    <select name="city_id" class="form-control">
                                                        <option selected disabled class="text-center">---Şəhər
                                                            Seçin---
                                                        </option>
                                                        @foreach ($cities as $city)
                                                            <option class="text-center"
                                                                value="{{ ucwords($city->id) }}">
                                                                {{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('city_id')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title">Ünvan <span>*</span></label>
                                                <textarea class="form-control" name="address" cols="30"
                                                    rows="3"></textarea>
                                                @error('address')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="info-title">Qeyd</label>
                                                <textarea class="form-control" name="not" cols="30"
                                                    rows="3"></textarea>
                                            </div>
                                            <button type="submit"
                                                class="btn-upper btn btn-primary checkout-page-button">Sifariş
                                                Ver</button>
                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                                </form>
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
                                <div>
                                    <h4 class="unicase-checkout-title"><b>Almaq İstədikləriniz..</b></h4>
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
                                                <span style="color:red">{{ session('coupon')['discount_amount'] }}
                                                    Azn
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

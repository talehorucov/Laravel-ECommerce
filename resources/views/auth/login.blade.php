@extends('user.main_master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Ana Səhifə</a></li>
                    <li class='active'>Gİriş/Qeydiyyat</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Gİriş</h4>
                        <h4 class="text-danger text-center">Xoş Gəlmisiniz !</h4>
                        <form method="POST" action="{{ route('login') }}" class="register-form outer-top-xs">
                            @csrf
                            <div class="form-group">
                                <label class="info-title">Email <span>*</span></label>
                                <input type="email" name="email" id="email"
                                    class="form-control unicase-form-control text-input">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title">Şifrə <span>*</span></label>
                                <input type="password" name="password" id="password"
                                    class="form-control unicase-form-control text-input">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right">Şifrəni Unutmusan ?</a>
                            </div>
                            <button style="float: right" type="submit" class="btn-upper btn btn-primary checkout-page-button">Giriş</button>
                        </form>
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Yeni hesab yarat</h4>
                        <form method="POST" class="register-form outer-top-xs" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Ad <span>*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control unicase-form-control text-input">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email <span>*</span></label>
                                <input type="email" id="reg_email" name="email"
                                    class="form-control unicase-form-control text-input">
                                @error('reg_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Telefon Nömrəsi <span>*</span></label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control unicase-form-control text-input">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Şifrə <span>*</span></label>
                                <input type="password" id="password" name="password"
                                    class="form-control unicase-form-control text-input">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Şifrə təsdiq
                                    <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control unicase-form-control text-input">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                Qeydiyyat
                            </button>
                        </form>


                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('user.partials._brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->


    @endsection

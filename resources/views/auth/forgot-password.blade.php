@extends('user.main_master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Forget Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row" style="margin-left: 400px">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4>Forget Password</h4>
                        <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs">
                            @csrf
                            <div class="form-group">
                                <label class="info-title">Email Address <span>*</span></label>
                                <input type="email" name="email" id="email" required
                                    class="form-control unicase-form-control text-input">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password
                                Reset Link</button>
                            </form>
                    </div>
                    <!-- Sign-in -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('user.partials._brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->


    @endsection

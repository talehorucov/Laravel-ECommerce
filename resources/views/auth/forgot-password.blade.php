@extends('user.main_master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Ana Səhifə</a></li>
                    <li class='active'>Şifrəmi Unutdum</li>
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
                        <h4>Şifrəmi Unutdum</h4>
                        <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs">
                            @csrf
                            <div class="form-group">
                                <label class="info-title">Email <span>*</span></label>
                                <input type="email" name="email" id="email" required
                                    class="form-control unicase-form-control text-input">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Şifrəmi sıfırla</button>
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

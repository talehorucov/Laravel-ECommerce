@extends('user.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-center">Salam </span>
                            <strong>{{ Auth()->user()->name }}.</strong><br>
                            SmartBuy.Az Saytına Xoş Gəlmisiz !
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

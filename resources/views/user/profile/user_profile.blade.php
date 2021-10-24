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
                        <div class="card-body">
                            <form action="{{ route('user.update') }}" method="post" class="register-form outer-top-xs"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Ad <span>*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title">Email <span>*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title">Nömrə <span>*</span></label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title">Şəkil <span>*</span></label>
                                    <input type="file" name="profile_photo_path"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Düzənlə</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

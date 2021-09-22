@extends('user.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img style="border-radius: 50%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                        alt="" class="card-img-top" height="100%" width="100%"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change
                            Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Log Out</a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <span class="text-danger">Change Your Password</span>
                        </h3>
                        <div class="card-body">
                            <form action="{{ route('update.password') }}" method="post"
                                class="register-form outer-top-xs">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Current Password <span>*</span></label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title">New Password <span>*</span></label>
                                    <input type="password" name="password" id="password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title">Confirm Password <span>*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

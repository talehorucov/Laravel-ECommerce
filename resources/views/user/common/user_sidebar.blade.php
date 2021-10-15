<div class="col-md-2"><br>
    <img style="border-radius: 50%"
        src="{{ !empty(auth()->user()->profile_photo_path) ? url('upload/user_images/'.auth()->user()->profile_photo_path) : url('upload/no_image.jpg') }}"
        alt="" class="card-img-top" height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Ana Səhifə</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Sifarişlərim</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Hesabım</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Şifrə</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Çıxış</a>
    </ul>
</div>
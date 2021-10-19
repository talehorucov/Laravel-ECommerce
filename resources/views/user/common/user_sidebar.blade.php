@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
// dd($route);
@endphp
<div class="col-md-2"><br>
    <img style="border-radius: 50%; width:175px; height:155px; object-fit: fill"
        src="{{ !empty(auth()->user()->profile_photo_path) ? url('upload/user_images/' . auth()->user()->profile_photo_path) : url('upload/no_image.jpg') }}"
        ><br><br>
    <div class="list-group">
        <a href="{{ route('dashboard') }}"
            class="list-group-item {{ $route == 'dashboard' ? 'active' : '' }} text-center" style="padding: 14px">Ana
            Səhifə</a>
        <a href="{{ route('my.orders') }}"
            class="list-group-item {{ $route == 'my.orders' ? 'active' : '' }} text-center"
            style="padding: 14px">Sifarişlərim</a>
        <a href="{{ route('my.return.orders') }}"
            class="list-group-item {{ $route == 'my.return.orders' ? 'active' : '' }} text-center"
            style="padding: 14px">İadə Edilənlər</a>
        <a href="{{ route('my.cancel.orders') }}"
            class="list-group-item {{ $route == 'my.cancel.orders' ? 'active' : '' }} text-center"
            style="padding: 14px">Ləğv Edilənlər</a>
        <a href="{{ route('user.profile') }}"
            class="list-group-item {{ $route == 'user.profile' ? 'active' : '' }} text-center"
            style="padding: 14px">Hesabım</a>
        <a href="{{ route('change.password') }}"
            class="list-group-item {{ $route == 'change.password' ? 'active' : '' }} text-center"
            style="padding: 14px">Şifrə</a>
        <a href="{{ route('user.logout') }}"
            class="list-group-item {{ $route == 'user.logout' ? 'active' : '' }} text-center"
            style="padding: 14px">Çıxış</a>
    </div>
</div>

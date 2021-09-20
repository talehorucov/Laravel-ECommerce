<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserPasswordRequest;

class IndexController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function dashboard()
    {
        $user = auth()->user();
        return view('dashboard', compact('user'));
    }

    public function log_out(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function user_profile()
    {
        $user = Auth()->user();
        return view('user.profile.user_profile', compact('user'));
    }

    public function user_update(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $image = $request->file('profile_photo_path');
            @unlink('upload/user_images/'.$user->profile_photo_path);
            $image_name = date('YmdHi') . $image->getClientOriginalName();
            $image->move('upload/user_images', $image_name);
            $user['profile_photo_path'] = $image_name;
        }
        $user->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function change_password()
    {
        $user = Auth()->user();
        return view('user.profile.change_password', compact('user'));
    }

    public function update_password(UserPasswordRequest $request)
    {
        $user = User::findOrFail(Auth::id());
        if (Hash::check($request->current_password, $user->password)) {            
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }
    }
}

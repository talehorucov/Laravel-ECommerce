<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = Admin::findOrFail(1);
        return view('admin.admin_profile', compact('admin'));
    }

    public function edit()
    {
        $editData = Admin::findOrFail(1);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function update(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            @unlink('upload/admin_images/'.$data->profile_photo_path);
            $image_name = date('YmdHi').$image->getClientOriginalName();
            $image->move('upload/admin_images',$image_name);
            $data['profile_photo_path'] = $image_name;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function change_password()
    {        
        $editData = Admin::findOrFail(1);
        return view('admin.admin_change_password');
    }

    public function update_password(AdminPasswordRequest $request)
    {
        $admin = Admin::findOrFail(1);
        if (Hash::check($request->current_password, $admin->password)) {
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->route('admin.logout');
        }
        else{
            return redirect()->back();
        }
    }
}

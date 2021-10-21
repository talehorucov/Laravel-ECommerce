<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingReturnRequest;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function site_setting()
    {        
        if (SiteSetting::count() == 0) {
            $site_setting = new SiteSetting();
            $site_setting->save();
        }
        $site_setting = SiteSetting::orderByDesc('id')->firstOrFail();
        return view('admin.setting.update',compact('site_setting'));
    }

    public function update(SiteSettingReturnRequest $request, SiteSetting $site_setting)
    {
        $site_setting->update($request->validated());

        $notification = array(
            'message' => 'Sayt Parametrləri Yeniləndi',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}

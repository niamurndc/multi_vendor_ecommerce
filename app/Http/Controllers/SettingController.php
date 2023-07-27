<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $setting = Setting::find(1);
        return view('admin.setting', ['setting' => $setting]);
    }

    public function edit(Request $request){
        $setting = Setting::find(1);

        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtube;
        $setting->instagram = $request->instagram;
        $setting->shipping_cost = $request->shipping_cost;
        $setting->cat_num = $request->cat_num;
        $setting->campaign_date = $request->campaign_date;
        $setting->product_permission = $request->product_permission;
        $setting->comission = $request->comission;

        $setting->save();
        return redirect('/admin/settings')->with('message', 'Updated Successful');

    }
}

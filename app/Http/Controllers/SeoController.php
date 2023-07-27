<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $setting = Setting::find(1);
        return view('admin.seo', ['setting' => $setting]);
    }

    public function edit(Request $request){
        $setting = Setting::find(1);

        $setting->seo_tag = $request->seo_tag;
        $setting->home_desc = $request->home_desc;
        $setting->home_tags = $request->home_tags;
        $setting->camp_desc = $request->camp_desc;
        $setting->camp_tags = $request->camp_tags;
        $setting->offer_desc = $request->offer_desc;
        $setting->offer_tags = $request->offer_tags;
        $setting->seller_desc = $request->seller_desc;
        $setting->seller_tags = $request->seller_tags;
        $setting->brand_desc = $request->brand_desc;
        $setting->brand_tags = $request->brand_tags;
        $setting->cat_desc = $request->cat_desc;
        $setting->cat_tags = $request->cat_tags;
        $setting->track_desc = $request->track_desc;
        $setting->track_tags = $request->track_tags;

        $setting->update();
        return redirect('/admin/seo')->with('message', 'Updated Successful');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $feature = Feature::find(1);
        $categories = Category::all();
        return view('admin.feature', ['feature' => $feature, 'categories' => $categories]);
    }

    public function edit(Request $request, $id){
        $feature = Feature::find(1);

        if($id == 1){
            $feature->title1 = $request->title;
            $feature->number1 = $request->number;

        }else if($id == 2){
            $feature->title2 = $request->title;
            $feature->number2 = $request->number;
            $feature->cat_id2 = $request->cat_id;

        }else if($id == 3){
            $feature->title3 = $request->title;
            $feature->number3 = $request->number;
            $feature->cat_id3 = $request->cat_id;
        }

        $feature->save();
        return redirect('/admin/feature')->with('message', 'Updated Successful');

    }
}

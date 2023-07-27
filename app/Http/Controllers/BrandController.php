<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
        $this->middleware('admin')->except('index');
    }

    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', ['brands' => $brands]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image'
        ]);

        $brand = new Brand();

        $brand->title = $request->title;
        $brand->slug = Str::slug($request->title);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'brand-'.time().'.'.$ext;
        $brand->image = $cover;
        $path = 'uploads/brand';
        $image->move($path, $cover);

        $brand->save();
        return redirect('/admin/brands')->with('message', 'Added Successful');
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'nullable|image'
        ]);
        
        $brand = Brand::find($id);

        $brand->title = $request->title;
        $brand->slug = Str::slug($request->title);

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'brand-'.time().'.'.$ext;
            $brand->image = $cover;
            $path = 'uploads/brand';
            $image->move($path, $cover);
        }

        $brand->update();
        return redirect('/admin/brands')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $id)->get();
        foreach($products as $product){
            $product->brand_id = 0;
            $product->update();
        }
        $brand->delete();
        return redirect('/admin/brands')->with('message', 'Deleted Successful');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index', ['sliders' => $sliders]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image'
        ]);

        $slider = new Slider();

        $slider->title = $request->title;

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $cover = 'slide-'.time().'.'.$ext;
        $slider->image = $cover;
        $path = 'uploads/slider';
        $image->move($path, $cover);

        $slider->save();
        return redirect('/admin/sliders')->with('message', 'Added Successful');
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'nullable|image',
        ]);
        
        $slider = Slider::find($id);

        $slider->title = $request->title;

        $image = $request->file('image');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'slide-'.time().'.'.$ext;
            $slider->image = $cover;
            $path = 'uploads/slider';
            $image->move($path, $cover);
        }

        $slider->update();
        return redirect('/admin/sliders')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $slider = Slider::find($id);
        $slider->delete();
        return redirect('/admin/sliders')->with('message', 'Deleted Successful');
    }
}

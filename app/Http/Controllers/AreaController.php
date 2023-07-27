<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $areas = Area::all();
        return view('admin.area.index', ['areas' => $areas]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string'
        ]);

        $area = new Area();

        $area->title = $request->title;
        $area->parent_id = $request->parent_id;

        $area->save();
        return redirect('/admin/areas')->with('message', 'Added Successful');
    }

    public function edit($id){
        $area = Area::find($id);
        $areas = Area::all();
        return view('admin.area.edit', ['area' => $area, 'areas' => $areas]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string'
        ]);
        
        $area = Area::find($id);

        $area->title = $request->title;
        $area->parent_id = $request->parent_id;

        $area->update();
        return redirect('/admin/areas')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $area = Area::find($id);
        $area->delete();
        return redirect('/admin/areas')->with('message', 'Deleted Successful');
    }
}

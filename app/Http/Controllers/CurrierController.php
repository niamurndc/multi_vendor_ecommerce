<?php

namespace App\Http\Controllers;

use App\Models\Currier;
use Illuminate\Http\Request;

class CurrierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
    }

    public function index(){
        $curriers = Currier::where('seller_id', auth()->user()->id)->get();
        return view('admin.currier.index', ['curriers' => $curriers]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'total' => 'required|numeric',
            'paid' => 'required|numeric',
            'due' => 'required|numeric',
        ]);

        $currier = new Currier();

        $currier->title = $request->title;
        $currier->total = $request->total;
        $currier->paid = $request->paid;
        $currier->due = $request->due;
        $currier->seller_id = auth()->user()->id;

        $currier->save();
        return redirect('/admin/curriers')->with('message', 'Added Successful');
    }

    public function edit($id){
        $currier = Currier::find($id);
        if($currier->seller_id == auth()->user()->id){
            return view('admin.currier.edit', ['currier' => $currier]);
        }else{
            return redirect()->back()->with('message', 'You do not edit that');
        }
        
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string'
        ]);
        
        $currier = Currier::find($id);

        $currier->title = $request->title;
        $currier->total = $request->total;
        $currier->paid = $request->paid;
        $currier->due = $request->due;

        $currier->update();
        return redirect('/admin/curriers')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $currier = Currier::find($id);

        if($currier->seller_id == auth()->user()->id){
            $currier->delete();
            return redirect('/admin/curriers')->with('message', 'Deleted Successful');
        }else{
            return redirect()->back()->with('message', 'You do not edit that');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $sell = Order::where('type', 'Offline')->get();
        return view('admin.sell.index', ['sells' => $sell]);
    }


    public function view($id){
        $sell = Order::find($id); 
        return view('admin.sell.view', ['sell' => $sell]);
    }

    public function edit($id){
        $sell = Order::find($id); 
        return view('admin.sell.edit', ['sell' => $sell]);
    }


    public function delete($id){
        $sell = Order::find($id);
        $sell->delete();
        return redirect('/admin/sells')->with('message', 'Deleted Successful');
    }
}

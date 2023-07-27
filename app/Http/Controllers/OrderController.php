<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
        $this->middleware('admin')->except('index', 'edit', 'update');
    }

    public function index(){
        if(auth()->user()->role == 1){
            $order = Order::with('user')->with('address')->get();
        }else{
            $order = Order::where('seller_id', auth()->user()->id)->get();
        }
        
        return view('admin.order.index', ['orders' => $order]);
    }

    public function edit($id){
        $order = Order::find($id); 

        if($order->seller_id == auth()->user()->id || auth()->user()->role == 1){
            return view('admin.order.view', ['order' => $order]);
        }else{
            return redirect()->back()->with('message', 'You do not edit that');
        }
        
        
    }

    public function update(Request $request, $id){
        $order = Order::find($id); 
        $order->status = $request->status;
        $order->currier_id = $request->currier;
        $order->trackid = $request->trackid;

        if($request->status == 2 && $order->comission == 0){
            $setting = Setting::find(1);
            $seller = User::find($order->seller_id);

            $comission = $order->total / 100 * $setting->comission;

            $seller->balance += $order->total - $comission;
            $seller->update();
            $order->comission = 1;
        }
        $order->update();
        return redirect()->back()->with('message', 'Updated Successful');
    }


    public function delete($id){
        $order = Order::find($id);
        if($order->seller_id == auth()->user()->id || auth()->user()->role == 1){
            $order->delete();
            return redirect('/admin/orders')->with('message', 'Deleted Successful');
        }else{
            return redirect()->back()->with('message', 'You do not edit that');
        }
    }
}

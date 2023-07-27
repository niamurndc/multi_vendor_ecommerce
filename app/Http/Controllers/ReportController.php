<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
    }

    public function sell(){
        if(auth()->user()->role == 1){
            $sell = Order::with('user')->with('address')->get();
        }else{
            $sell = Order::where('seller_id', auth()->user()->id)->get();
        }
        return view('admin.report.sell', ['sells' => $sell]);
    }

    public function sellfilter(Request $request){
        if(auth()->user()->role == 1){
            $sell = Order::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }else{
            $sell = Order::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->where('seller_id', auth()->user()->id)->get();
        }
        
        return view('admin.report.sell', ['sells' => $sell]);
    }

    public function dueSell(){
        if(auth()->user()->role == 1){
            $sell = Order::where('due', '>', 0)->get();
        }else{
            $sell = Order::where('due', '>', 0)->where('seller_id', auth()->user()->id)->get();
        }
        
        return view('admin.report.due-sell', ['sells' => $sell]);
    }

    public function product(){
        if(auth()->user()->role == 1){
            $products = Product::all();
        }else{
            $products = Product::where('seller_id', auth()->user()->id)->get();
        }
        return view('admin.report.product', ['products' => $products, 'carts' => null]);
    }

    public function productfilter(Request $request){
        if(auth()->user()->role == 1){
            $product = Product::all();
            $carts = OrderItem::where('product_id', $request->product_id)->where('order_id', '!=', 0)->get();
        }else{
            $product = Product::where('seller_id', auth()->user()->id)->get();
            $carts = OrderItem::where('product_id', $request->product_id)->where('order_id', '!=', 0)->where('seller_id', auth()->user()->id)->get();
        }
        
        return view('admin.report.product', ['products' => $product, 'carts' => $carts]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryApi;
use App\Http\Resources\OrderApi;
use App\Http\Resources\ProductApi;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function search($term){
        $products = Product::where('title', 'LIKE', '%'.$term.'%')->get();
        return response(ProductApi::collection($products));
    }

    public function singlePro($id){
        $products = Product::find($id);
        return response(new ProductApi($products));
    }

    public function catPro($cid){
        $products = Product::where('category_id', $cid)->get();
        return response(ProductApi::collection($products));
    }

    public function topCat(){
        $cats = Category::where('parent_id', null)->get();
        return response(CategoryApi::collection($cats));
    }

    public function orders(){
        $uid = auth()->user()->phone;

        $orders = Order::where('phone', $uid)->get();
        return response(OrderApi::collection($orders));
    }

    public function addOrder(Request $request){
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'area' => 'required|string',
            'address' => 'required|string',
        ]);

        $order = new Order();

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->area = $request->area;
        $order->address = $request->address;
        $order->total = $request->total;
        $order->charge = 60;
        $order->subtotal = $request->total + 60;
        $order->user_id = auth()->user()->id;

        $order->save();

        foreach($request->carts as $req_cart){

            $cart = new OrderItem();

            $cart->order_id = $order->id;
            $cart->product_id = $req_cart['product_id'];
            $cart->price = $req_cart['price'];
            $cart->qty = $req_cart['qty'];
            $cart->sid = "00";

            $cart->save();
        }

        return response(new OrderApi($order));
    }
}
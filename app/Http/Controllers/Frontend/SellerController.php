<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function login(){
        return view('auth.seller-login');
    }

    public function register(){
        return view('auth.seller-register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|string',
            'phone' => 'required|numeric|unique:users',
            'shop_name' => 'required|string',
            'shop_address' => 'required|string',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->shop_name = $request->shop_name;
        $user->shop_address = $request->shop_address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = bcrypt($request->password);

        $user->save();
        return redirect('/seller/login')->with('message', 'Registration Successful. Please login');
    }
}

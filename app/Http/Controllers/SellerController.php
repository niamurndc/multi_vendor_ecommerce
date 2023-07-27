<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $sellers = User::where('role', 2)->get();
        return view('admin.seller.index', ['sellers' => $sellers]);
    }



    public function edit($id){
        $seller = User::find($id);

        return view('admin.seller.edit', ['seller' => $seller]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'nullable|string',
            'shop_name' => 'required|string',
            'shop_address' => 'required|string',
        ]);
        
        $seller = User::find($id);

        $seller->name = $request->name;
        $seller->phone = $request->phone;
        $seller->email = $request->email;
        $seller->shop_name = $request->shop_name;
        $seller->shop_address = $request->shop_address;
        if($request->password != null){
            $seller->password = bcrypt($request->seller);
        }
        
        $seller->update();
        return redirect('/admin/sellers')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $seller = User::find($id);
        $seller->delete();
        return redirect('/admin/sellers')->with('message', 'Deleted Successful');
    }
}

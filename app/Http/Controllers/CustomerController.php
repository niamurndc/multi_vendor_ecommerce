<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $customers = User::where('role', 0)->get();
        return view('admin.customer.index', ['customers' => $customers]);
    }



    public function edit($id){
        $customer = User::find($id);

        return view('admin.customer.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        
        $customer = User::find($id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        if($request->password != null){
            $customer->password = bcrypt($request->customer);
        }
        
        $customer->update();
        return redirect('/admin/customers')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $customer = User::find($id);
        $customer->delete();
        return redirect('/admin/customers')->with('message', 'Deleted Successful');
    }
}

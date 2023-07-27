<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
    }

    public function profile(){
        $profile = User::find(auth()->user()->id);
        return view('admin.profile', ['profile' => $profile]);
    }

    public function update(Request $request){
        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        } 
        
        $user->update();
        return redirect('/admin/profile')->with('message', 'Profile Updated');
    }
}

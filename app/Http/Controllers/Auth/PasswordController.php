<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\User;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function forgot(){
        return view('auth.forgot');
    }

    public function forgotpost(Request $request){
        $user = User::where('phone', $request->phone)->first();

        if(!$user){
            return back()->with('error', 'User not found');
        }
        $token = rand(1000, 9999);
        $user->token = $token;
        $user->update();

        $text = 'Your password reset code is '.$token.'. WoadaBazar';
        $phone = '88'.$user->phone;
        $result = SmsController::send_sms($text, $phone);
        if(strpos($result, 'SMS SUBMITTED: ID') !== false){
            return redirect('/reset-pass')->with('message', 'Code send successful');
        }else{
            return back()->with('error', 'Please try again');
        }
    }

    public function reset(){
        return view('auth.reset');
    }

    public function resetpass(Request $request){
        $request->validate([
            'code' => 'required|numeric',
            'password' => 'required|confirmed|string|min:8'
        ]);

        $user = User::where('token', $request->code)->first();
        if(!$user){
            return back()->with('error', 'Code is inccorect');
        }
        $user->token = null;
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/login')->with('message', 'Password Reset');
    }

    public function varify(){
        return view('auth.verify');
    }

    public function varifypost(Request $request){
        $request->validate([
            'code' => 'required|numeric',
        ]);

        $user = User::where('token', $request->code)->first();
        if(!$user){
            return back()->with('error', 'Code is inccorect');
        }
        $user->token = null;
        $user->status = 1;
        $user->update();

        return redirect('/login')->with('message', 'Password Reset');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'string|required',
            'phone' => 'numeric|required|unique:users',
            'password' => 'string|required|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'token' => rand(10000, 99999),
        ]);

        $token = $user->createToken('apptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response);
    }

    public function varify(Request $request){
        if(auth()->user()->token == $request->code){
            $user = User::find(auth()->user()->id);

            $user->status = 1;
            $user->token = null;
            $user->update();
            return response(['message' => 'Your profile is varified']);
        }else{
            return response(['error' => 'Your code is not correct']);
        }

    }

    public function sendcode(){
        if(auth()->user()->token == null){
            $user = User::find(auth()->user()->id);

            $user->token = rand(10000, 99999);
            $user->update();
    
            return response(['message' => 'Your code is send']);
        }else{

            return response(['message' => 'Your code is send']);
        }
    }

    public function login(Request $request){
        $data = $request->validate([
            'phone' => 'numeric|required',
            'password' => 'string|required|min:6',
        ]);

        $user = User::where('phone', $data['phone'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)){
            return response(['message' => 'Bad credentials']);
        }

        $token = $user->createToken('apptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response);
    }

    public function forgot(Request $request){
        $user = User::where('phone', $request->phone)->first();

        if(!$user){
            return response(['error' => 'Phone number is not correct']);
        }else{
            $user->token = rand(10000, 99999);
            $user->update();

            return response(['message' => 'Code is send']);
        }
    }

    public function getpassword(Request $request){
        $user = User::where('token', $request->code)->first();

        if(!$user){
            return response(['error' => 'Phone number is not correct']);
        }else{
            $user->token = null;
            $user->password = bcrypt($request->password);
            $user->update();

            return response(['message' => 'change password']);
        }
    }

    public function profile(){
        return response(auth()->user());
    }

    public function update(Request $request){
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->password = $request->password == null ? $user->password : bcrypt($request->password);

        $user->update();
        return response($user);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response(['message' => 'Your are logged out']);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\SmsItem;
use App\Models\SmsList;
use App\Models\SmsSetting;
use App\Models\User;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');;
    }

    public function setting(){
        $setting = SmsSetting::find(1);
        return view('admin.sms.setting', ['sms' => $setting]);
    }

    public function editSetting(Request $request){
        $request->validate([
            'url' => 'required|string',
            'api' => 'required|string',
            'phone' => 'required|string',
            'type' => 'required|string',
        ]);
        $setting = SmsSetting::find(1);

        $setting->url = $request->url;
        $setting->api = $request->api;
        $setting->phone = $request->phone;
        $setting->type = $request->type;

        $setting->update();
        return back()->with('message', 'Updated');
    }

    public function getsms(){
        $lists = SmsList::all();
        $users = User::all();
        return view('admin.sms.send', ['lists' => $lists, 'users' => $users]);
    }

    public function sendsms(Request $request){
        $request->validate([
            'list' => 'required|numeric' 
        ]);

        if($request->list == 0){
            // send all user
            $request->validate([
                'message' => 'required|string'
            ]);

            $usersPhone = User::pluck('phone');
            $phonelist = [];
            foreach($usersPhone as $phone){
                $newPhone = '88'.$phone;
                array_push($phonelist, $newPhone);
            }
            $newPhoneList = implode(',', $phonelist);
            // dd($newPhoneList);
            $result = $this->sendMessage($request->message, $newPhoneList);

            if(strpos($result, 'SMS SUBMITTED: ID') !== false){
                return back()->with('message', 'sms send');
            }else{
                return back()->with('error', 'somthing went wrong');
            }


        }elseif($request->list == -1){
            // send sms single user
            $request->validate([
                'user' => 'required|numeric',
                'message' => 'required|string'
            ]);

            $userPhone = '88'.$request->user;
            $result = $this->sendMessage($request->message, $userPhone);

            if(strpos($result, 'SMS SUBMITTED: ID') !== false){
                return back()->with('message', 'sms send');
            }else{
                return back()->with('error', 'somthing went wrong');
            }

        }else{
            // send all user
            $request->validate([
                'message' => 'required|string'
            ]);

            $usersPhone = SmsItem::where('list_id', $request->list)->pluck('phone');
            $phonelist = [];
            foreach($usersPhone as $phone){
                $newPhone = '88'.$phone;
                array_push($phonelist, $newPhone);
            }
            $newPhoneList = implode(',', $phonelist);
            // dd($newPhoneList);
            $result = $this->sendMessage($request->message, $newPhoneList);

            if(strpos($result, 'SMS SUBMITTED: ID') !== false){
                return back()->with('message', 'sms send');
            }else{
                return back()->with('error', 'somthing went wrong');
            }
        }
    }

    public function sendMessage($text, $numbers){
        $setting = SmsSetting::find(1);

        $url = $setting->url;
        $data = [
          "api_key" => $setting->api,
          "type" => $setting->type,
          "contacts" => $numbers,
          "senderid" => $setting->phone,
          "msg" => $text,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    static public function send_sms($text, $numbers){
        $setting = SmsSetting::find(1);

        $url = $setting->url;
        $data = [
          "api_key" => $setting->api,
          "type" => $setting->type,
          "contacts" => $numbers,
          "senderid" => $setting->phone,
          "msg" => $text,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}

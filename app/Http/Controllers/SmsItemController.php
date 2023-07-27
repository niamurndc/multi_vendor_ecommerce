<?php

namespace App\Http\Controllers;

use App\Models\SmsItem;
use App\Models\User;
use Illuminate\Http\Request;

class SmsItemController extends Controller
{
    public function store(Request $request, $id){
        $this->validate($request, [
            'type' => 'required|string',
        ]);

        if($request->type == 0){
            $this->validate($request, [
                'user' => 'required|numeric',
            ]);

            $user = User::find($request->user);

            $slist = new SmsItem();
            
            $slist->name = $user->name;
            $slist->phone = $user->phone;
            $slist->list_id = $id;

            $slist->save();

            return back()->with('message', 'Added Successful');

        }

        $this->validate($request, [
            'name' => 'required|string',
            'note' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $slist = new SmsItem();

        $slist->name = $request->name;
        $slist->note = $request->note;
        $slist->phone = $request->phone;
        $slist->list_id = $id;

        $slist->save();
        return back()->with('message', 'Added Successful');
    }

    public function delete($id){
        $slist = SmsItem::find($id);
        $slist->delete();
        return back()->with('message', 'Deleted Successful');
    }
}

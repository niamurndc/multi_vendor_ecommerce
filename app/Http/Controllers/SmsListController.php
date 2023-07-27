<?php

namespace App\Http\Controllers;

use App\Models\SmsItem;
use App\Models\SmsList;
use App\Models\User;
use Illuminate\Http\Request;

class SmsListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
        $this->middleware('admin')->except('index');
    }

    public function index(){
        $slists = SmsList::all();
        return view('admin.sms.list', ['slists' => $slists]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'comment' => 'nullable|string'
        ]);

        $slist = new SmsList();

        $slist->title = $request->title;
        $slist->comment = $request->comment;

        $slist->save();
        return redirect('/admin/sms-lists')->with('message', 'Added Successful');
    }

    public function view($id){
        $slist = SmsList::find($id);
        $users = User::all();
        return view('admin.sms.view-list', ['slist' => $slist, 'users' => $users]);
    }

    

    public function edit($id){
        $slist = SmsList::find($id);
        return view('admin.sms.edit-list', ['slist' => $slist]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'comment' => 'nullable|string'
        ]);
        
        $slist = SmsList::find($id);

        $slist->title = $request->title;
        $slist->comment = $request->comment;

        $slist->update();
        return redirect('/admin/sms-lists')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $slist = SmsList::find($id);
        $items = SmsItem::where('list_id', $id)->get();
        foreach($items as $item){
            $item->delete();
        }
        $slist->delete();
        return redirect('/admin/sms-lists')->with('message', 'Deleted Successful');
    }
}

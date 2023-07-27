<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('seller');
        $this->middleware('admin')->except('index', 'create', 'store');
    }

    public function index(){
        if(auth()->user()->role == 1){
            $withdraws = Withdraw::with('seller')->get();
        }else{
            $withdraws = Withdraw::where('user_id', auth()->user()->id)->get();
        }
        return view('admin.withdraw.index', ['withdraws' => $withdraws]);
    }

    public function create(){
        return view('admin.withdraw.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'amount' => 'required|numeric',
            'method' => 'required|string',
            'phone' => 'required|string',
        ]);

        if($request->amount == 5 || $request->amount  > auth()->user()->balance){
            return back()->with('message', 'You have not enough balance');
        }

        $withdraw = new Withdraw();

        $withdraw->amount = $request->amount;
        $withdraw->method = $request->method;
        $withdraw->phone = $request->phone;
        $withdraw->user_id = auth()->user()->id;
        $withdraw->status = 0;

        $user = User::find(auth()->user()->id);
        $user->balance -= $request->amount;
        $user->update();

        $withdraw->save();
        return redirect('/admin/withdraws')->with('message', 'Added Successful');
    }

    public function view($id){
        $withdraw = Withdraw::find($id);
        return view('admin.withdraw.view', ['withdraw' => $withdraw]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'status' => 'required|numeric'
        ]);
        
        $withdraw = Withdraw::find($id);

        $withdraw->status = $request->status;

        $withdraw->update();
        return redirect('/admin/withdraws')->with('message', 'Updated Successful');
    }

}

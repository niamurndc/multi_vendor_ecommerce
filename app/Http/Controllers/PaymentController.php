<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $payments = Payment::all();
        return view('admin.payment.index', ['payments' => $payments]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'number' => 'required|string',
            'logo' => 'nullable|image'
        ]);

        $payment = new Payment();

        $payment->title = $request->title;
        $payment->number = $request->number;
        $payment->status = 1;

        $image = $request->file('logo');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'payment-'.time().'.'.$ext;
            $payment->logo = $cover;
            $path = 'uploads/payment';
            $image->move($path, $cover);
        }

        $payment->save();
        return redirect('/admin/payments')->with('message', 'Added Successful');
    }

    public function edit($id){
        $payment = Payment::find($id);
        return view('admin.payment.edit', ['payment' => $payment]);
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|string',
            'number' => 'required|string',
            'logo' => 'nullable|image'
        ]);
        
        $payment = Payment::find($id);

        $payment->title = $request->title;
        $payment->number = $request->number;
        $payment->status = $request->status;

        $image = $request->file('logo');
        if($image != null){
            $ext = $image->getClientOriginalExtension();
            $cover = 'payment-'.time().'.'.$ext;
            $payment->logo = $cover;
            $path = 'uploads/payment';
            $image->move($path, $cover);
        }

        $payment->update();
        return redirect('/admin/payments')->with('message', 'Updated Successful');
    }

    public function delete($id){
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('/admin/payments')->with('message', 'Deleted Successful');
    }
}

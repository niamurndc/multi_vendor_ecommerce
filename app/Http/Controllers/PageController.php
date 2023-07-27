<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $page = Page::find(1);
        return view('admin.page', ['page' => $page]);
    }

    public function edit(Request $request){
        $page = Page::find(1);

        $page->privacy = $request->privacy;
        $page->terms = $request->terms;
        $page->return = $request->return;
        $page->payment = $request->payment;
        $page->about = $request->about;
        $page->contact = $request->contact;

        $page->save();
        return redirect('/admin/pages')->with('message', 'Updated Successful');

    }
}

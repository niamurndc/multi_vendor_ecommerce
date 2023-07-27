<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $reviews = ProductReview::all();
        return view('admin.review', ['reviews' => $reviews]);
    }

    public function delete($id){
        $review = ProductReview::find($id);
        $review->delete();
        return redirect()->back()->with('message', 'Deleted Successful');
    }
}

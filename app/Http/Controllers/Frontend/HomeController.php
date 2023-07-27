<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Area;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Review;
use App\Models\Savelist;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        $products = Product::where('status', 1)->get();
        $slider = Slider::all();
        $feature = Feature::find(1);
        $setting = Setting::find(1);
        return view('welcome', ['products' => $products, 'sliders' => $slider, 'feature' => $feature, 'setting' => $setting]);
    }

    public function shop(){
        $products = Product::where('status', 1)->get();
        return view('shop', ['products' => $products]);
    }

    public function campaign(){
        $products = Product::where('campaign', 'on')->where('status', 1)->get();
        return view('campaign', ['products' => $products]);
    }

    public function discount(){
        $products = Product::where('discount', 'on')->where('status', 1)->get();
        return view('discount', ['products' => $products]);
    }

    public function details($id){
        $product = Product::find($id);
        $products = Product::where('status', 1)->get();
        return view('details', ['products' => $products, 'product' => $product ]);
    }

    public function category($id){
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->where('status', 1)->get();
        return view('category', ['products' => $products, 'category' => $category ]);
    }

    public function brand($id){
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $id)->where('status', 1)->get();
        return view('brand', ['products' => $products, 'brand' => $brand ]);
    }

    public function search(){
        $kword = $_GET['search'];
        $products = Product::where('title', 'LIKE', '%'.$kword.'%')->where('status', 1)->get();
        return view('search', ['products' => $products, 'search' => $kword ]);
    }

    public function review(){
        $reviews = ProductReview::where('user_id', auth()->user()->id)->get();
        return view('review', ['reviews' => $reviews]);
    }

    public function addreview(){
        return view('add-review');
    }

    public function reviewpost(Request $request){
        $request->validate([
            'comment' => 'required',
            'rating' => 'required|numeric',
            'product_id' => 'required|numeric',
        ]);

        $review = new ProductReview();

        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        $review->user_id = auth()->user()->id;
        $review->name = auth()->user()->name;

        $review->save();

        return redirect()->back()->with('message', 'Review added');
    }

    public function deletereview($id){
        $review = ProductReview::find($id);
        $review->delete();
        return redirect()->back()->with('message', 'Review deleted');
    }

    public function address(){
        $address = Address::where('user_id', auth()->user()->id)->get();
        return view('address', ['address' => $address]);
    }

    public function addaddress(){
        $area = Area::all();
        return view('add-address', ['areas' => $area]);
    }

    public function addresspost(Request $request){
        $request->validate([
            'address' => 'required'
        ]);

        $address = new Address();

        $address->address = $request->address;
        $address->home = $request->home;
        $address->area_id = $request->area;
        $address->user_id = auth()->user()->id;

        $address->save();

        return redirect('/address')->with('message', 'Address added');
    }

    public function setaddress(Request $request){
        $request->validate([
            'address' => 'required'
        ]);

        $uid = auth()->user()->id;

        $user = User::find($uid);

        $user->address_id = $request->address;

        $user->update();
        return redirect('/checkout')->with('message', 'Address set');
    }

    public function trackorder(){
        return view('track-order', ['order' => null]);
    }

    public function trackorderpost(Request $request){
        $order = Order::find($request->id);
        if($order != null){
            return view('track-order', ['order' => $order]);
        }else{
            return redirect('/track-order')->with('message', 'Your order ID not found');
        }
        
    }

    public function cart(){
        $setting = Setting::find(1);
        $carts = OrderItem::where('sid', session_id())->orderBy('seller_id', 'asc')->get();
        return view('cart', ['carts' => $carts, 'setting' => $setting]);
    }

    public function buynow($id){
        
        $carto = OrderItem::where('sid', session_id())->where('product_id', $id)->first();
        if($carto == null){
            $product = Product::find($id);
            $cart = new OrderItem();
            $cart->product_id = $id;
            $cart->price = $product->price;
            $cart->seller_id = $product->seller_id;
            $cart->qty = 1;
            $cart->sid = session_id();
            $cart->save();
        }else{
            $carto->qty++;
            $carto->update();
        }
        
        return redirect('/checkout')->with('message', 'Product added into cart');
    }

    public function addcart($id){
        
        $carto = OrderItem::where('sid', session_id())->where('product_id', $id)->first();
        if($carto == null){
            $product = Product::find($id);
            $cart = new OrderItem();
            $cart->product_id = $id;
            $cart->price = $product->price;
            $cart->seller_id = $product->seller_id;
            $cart->qty = 1;
            $cart->sid = session_id();
            $cart->save();
        }else{
            $carto->qty++;
            $carto->update();
        }
        
        return redirect()->back()->with('message', 'Product added into cart');
    }

    public function buynowpost(Request $request, $id){
        
        $carto = OrderItem::where('sid', session_id())->where('product_id', $id)->where('size', $request->size)->where('color', $request->color)->first();
        if($carto == null){
            $product = Product::find($id);
            $cart = new OrderItem();
            $cart->product_id = $id;
            $cart->price = $product->price;
            $cart->qty = $request->qty;
            $cart->size = $request->size;
            $cart->color = $request->color;
            $cart->sid = session_id();
            $cart->seller_id = $product->seller_id;
            $cart->save();
        }else{
            $carto->qty++;
            $carto->update();
        }
        return redirect('/checkout')->with('message', 'Product added into cart');
    }

    public function addcartpost(Request $request, $id){
        
        $carto = OrderItem::where('sid', session_id())->where('product_id', $id)->where('size', $request->size)->where('color', $request->color)->first();
        if($carto == null){
            $product = Product::find($id);
            $cart = new OrderItem();
            $cart->product_id = $id;
            $cart->price = $product->price;
            $cart->qty = $request->qty;
            $cart->size = $request->size;
            $cart->color = $request->color;
            $cart->sid = session_id();
            $cart->seller_id = $product->seller_id;
            $cart->save();
        }else{
            $carto->qty++;
            $carto->update();
        }
        return redirect()->back()->with('message', 'Product added into cart');
    }

    public function updatecart(Request $request, $id){
        
        $cart = OrderItem::find($id);
        $cart->qty = $request->qty;
        $cart->update();
        return redirect()->back()->with('message', 'Cart updated');
    }

    public function deleteCart($id){
        $cart = OrderItem::find($id);
        $cart->delete();
        return redirect()->back()->with('message', 'Cart item deleted');
    }

    public function checkout(){
        if(auth()->user()->status == 0){
            return redirect('/varify');
        }
        $setting = Setting::find(1);
        $carts = OrderItem::where('sid', session_id())->orderBy('seller_id', 'asc')->get();
        $user = User::find(auth()->user()->id);
        return view('checkout', ['carts' => $carts, 'user' => $user, 'setting' => $setting]);
    }

    public function order(){
        if(auth()->user()->status == 0){
            return redirect('/varify');
        }
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('orders', ['orders' => $orders]);
    }

    public function postorder(Request $request){
        $request->validate([
            'total' => 'required|numeric',
            'charge' => 'required|numeric',
        ]);

        

        if(auth()->user()->address_id == null){
            return redirect()->back()->with('message', 'Please set address first');
        }else{

            $seller_list = explode(',', $request->seller_list);

            $charge = $request->charge / count($seller_list);

            if(count($seller_list) <= 0){

            }else{
                foreach($seller_list as $seller){
                    $sid = auth()->user()->id;
                    $carts = OrderItem::where('sid', $sid)->where('order_id', 0)->where('seller_id', $seller)->get();

                    $total = 0;

                    foreach($carts as $cart){
                        $total += $cart->price * $cart->qty;
                    };

                    $order = new Order();
                    $order->address_id = auth()->user()->address_id;
                    $order->total = $total;
                    $order->charge = $charge;
                    $order->subtotal = $total + $charge;
                    $order->user_id = auth()->user()->id;
                    $order->trackid = 0;
                    $order->currier_id = 0;
                    $order->seller_id = $seller;
                    $order->method = 'non';
                    $order->status = 4;


                    $order->save();

                    foreach($carts as $cart){
                        $cart->order_id = $order->id;
                        $cart->sid = null;
                        $cart->update();
                    }
                }
                return redirect('/payment/'.$order->id);
            }

        }
        
    }

    public function payment($id){
        $order = Order::find($id);
        $methods = Payment::where('status', 1)->get();
        return view('payment', ['order' => $order, 'methods' => $methods]);
    }

    public function givepayment(Request $request, $id){
        $order = Order::find($id);

        if($request->payment == 'cod'){
            $order->method = $request->payment;
            $order->status = 0;

            $order->update();

            return redirect('/home')->with('message', 'Order Send Successful');
        }else{
            return redirect('/payment-method/'.$request->payment.'/'.$id);
        }
        
    }

    public function paymentmethod($method, $id){
        $payment_method = Payment::where('title', $method)->first();
        return view('payment-method', ['method' => $payment_method, 'id' => $id]);
    }

    public function postpaymentmethod(Request $request, $method, $id){
        $request->validate([
            'trxid' => 'required|string'
        ]);
        
        $order = Order::findOrFail($id);
        $order->method = $method . ', trxid: '.$request->trxid;
        $order->status = 0;

        $order->update();

        return redirect('/home')->with('message', 'Order Send Successful');
    }

    public function profile(){
        if(auth()->user()->status == 0){
            return redirect('/varify');
        }
        return view('profile');
    }

    public function updateprofile(Request $request){
        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->address = $request->address;
        if($request->password != null){
            $user->password = bcrypt($request->password);
        } 
        
        $user->update();
        return redirect('/profile')->with('message', 'Profile Updated');
    }

    public function saveList(){
        $uid = auth()->user()->id;
        $savelists = Savelist::where('user_id', $uid)->get();
        return view('save-list', ['savelists' => $savelists]);
    }

    public function saveListId($id){
        $uid = auth()->user()->id;
        $savelist = new Savelist();

        $savelist->user_id = $uid;
        $savelist->product_id = $id;

        $savelist->save();
        return redirect('/save-later')->with('message', 'Save product for later');
    }

    public function saveListDelete($id){
        $savelist = Savelist::find($id);
        $savelist->delete();
        return redirect('/save-later')->with('message', 'Save product deleted');
    }

    public function showPage($name){
        $page = Page::find(1);

        if($name == 'privacy'){
            $title = 'Privacy Policy';
            $content = $page->privacy;
        }else if($name == 'terms'){
            $title = 'Terms & Conditons';
            $content = $page->terms;
        }else if($name == 'return'){
            $title = 'Return Policy';
            $content = $page->return;
        }else if($name == 'payment'){
            $title = 'Payment Policy';
            $content = $page->payment;
        }else if($name == 'about'){
            $title = 'About Us';
            $content = $page->about;
        }else if($name == 'contact'){
            $title = 'Contact Us';
            $content = $page->contact;
        }

        return view('page', ['title' => $title, 'content' => $content]);
    }
}

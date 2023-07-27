@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
Cart
@endsection

@section('content')
<?php $total = 0 ; ?>
  <div class="container my-5">
    <div class="">
      
      <div class="row py-2 py-md-0 px-md-4">
        <div class="col-md-8">
          <div class="card p-4">
            <h3 class="text-uppercase mb-4 border-bottom">Shopping cart</h3>
            <?php $seller_id = 0; $seller_no = 0; ?>
            @foreach($carts as $cart)
            

            @if($seller_id != $cart->seller_id)
            <?php $seller_id = $cart->seller_id; $seller_no++; ?>
            <h5 class="mb-0 pb-0 mt-4">@if($cart->seller->shop_name == null) Own Product @else {{$cart->seller->shop_name}} @endif</h5>
            <hr>
            @endif
            
            <div class="row border-bottom p-3">
              <div class="col-3">
                <img src="/uploads/product/{{$cart->product->image}}" alt="img" class="cart-product-image">
              </div>
              <div class="col-9">
                <div class="row">
                  <div class="col md-8">
                    <h5 class="mb-1 pb-0">{{$cart->product->title}}</h5>
                    <small class="text-skyblue">@if($cart->size != null)Size: {{$cart->size}} @endif @if($cart->color != null)Color: {{$cart->color}} @endif</small>
                    <p>Quantity: {{$cart->qty}} Price: {{$cart->price}}</p>
                  </div>
                  <div class="col md-4">
                    <h5 class="text-right"><b>{{$cart->price * $cart->qty}} BDT </b> </h5>
                    <?php $total += $cart->price * $cart->qty; ?>
                  </div>
                </div>
                <?php $total += $cart->price * $cart->qty; ?>
                <div class="d-flex align-items-center justify-content-between">
                  <form action="/cart/update/{{$cart->id}}" method="post" class="d-flex align-items-center"> @csrf
                    <select name="qty" class="form-control form-control-sm cart-qty-box" required>
                      <option {{$cart->qty == 1 ? 'selected' : ''}} value="1">1</option>
                      <option {{$cart->qty == 2 ? 'selected' : ''}} value="2">2</option>
                      <option {{$cart->qty == 3 ? 'selected' : ''}} value="3">3</option>
                      <option {{$cart->qty == 4 ? 'selected' : ''}} value="4">4</option>
                      <option {{$cart->qty == 5 ? 'selected' : ''}} value="5">5</option>
                    </select>
                    <button type="submit" class="btn btn-skyblue btn-sm">Update</button>
                  </form>
                  <a href="/cart/delete/{{$cart->id}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4">
            <h4>Total: {{$total}} BDT</h4>
            <p>Shipping Cost: {{$ship = $seller_no * $setting->shipping_cost}} BDT</p>
            <h4 class="border-top">Subtotal: {{$total + $ship}} BDT</h4>

            <a href="/checkout" class="btn btn-skyblue btn-block mt-4 text-white">Proced to Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 <!-- / Cart view section -->

@endsection
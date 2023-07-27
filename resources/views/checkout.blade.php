@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
Checkout
@endsection

@section('content')
<?php $total = 0 ; ?>
  <div class="container my-5">
    <div class="">
      
      <div class="row py-2 py-md-0 px-md-4">
        <div class="col-md-8">
          <div class="card p-4">
            <h4 class="text-uppercase mb-4 border-bottom">Checkout</h4>
            <h4 class="text-skyblue">Shipping Address</h4>
            <div class="border border-skyblue p-3">
              <h6><b> Name: {{$user->name}} </b></h6>
              <h6><b> Phone: {{$user->phone}} </b></h6>
              <h6><b> Email: {{$user->email}} </b></h6>
              <h6><b> Address: </b></h6>
              @if($user->address != null)
              <p>{{$user->address->home}} {{$user->address->address}} <br>{{optional($user->address->area)->title}}</p>
              @endif

              <div class="text-right">
                <a class="btn btn-skyblue btn-sm text-light" href="/address">Change Address</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3">
            <h4 class="text-skyblue">Product Details</h4>
            @foreach($carts as $cart)
            <div class="row mx-0 border border-skyblue text-secondary">
              <div class="col-8 d-flex jsutify-content-start align-items-center">
                <img src="/uploads/product/{{$cart->product->image}}" alt="img" height="30px" width="30px">
                <b>{{$cart->product->title}} ({{$cart->qty}})</b>
              </div>
              <div class="col-4 text-right"><b class="text-skyblue">{{$cart->qty * $cart->price}}</b></div>
              <?php $total += $cart->qty * $cart->price; ?>
            </div>
            @endforeach

            <h4 class="mt-5 text-skyblue">Order Summery</h4>
            <div class="d-flex justify-content-between text-skyblue">
              <b>Order Total:</b><b>{{$total}} BDT</b>
            </div>
            <div class="d-flex justify-content-between text-skyblue">
              <b>Shipping Cost:</b><b>{{$ship = $setting->shipping_cost}} BDT</b>
            </div>
            <h4 class="border-top">Subtotal: <span class="text-skyblue">{{$total + $ship}} BDT</span>  </h4>

            <form action="order" method="post"> @csrf
              <input type="number" name="total" value="{{$total}}" class="d-none">
              <input type="number" name="charge" value="{{$ship}}" class="d-none">

              <button type="submit" class="btn btn-skyblue btn-block text-light mt-4">Go to Payment</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- / Cart view section -->

@endsection
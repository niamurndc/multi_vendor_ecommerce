@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Your Orders
@endsection

@section('content')
<div class="container my-5">
  <div class="card p-4">
    <h4 class="">Your Orders</h4>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Products</th>
            <th>Address</th>
            <th>Subtotal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td><strong class="aa-cart-title">#{{$order->id}}</strong> </td>
            <td>{{$order->created_at->format('d-M-Y')}}</td>
            <td>
              @foreach($order->carts as $cart) 
                <p class="mb-1"><i class="fa fa-circle"></i> {{$cart->product->title}} x {{$cart->qty}} = {{$cart->price * $cart->qty}}</p>
              @endforeach
            </td>
            <td>
              <p class="text-uppercase mb-0">{{$order->name}}</p>
              <p class="mb-0"><b>{{$order->phone}}</b></p>
              <p>{{optional($order->address)->home}} {{optional($order->address)->address}}, {{optional(optional($order->address)->area)->title}}</p>
              
            </td>
            <td>{{$order->subtotal}}</td>
            <td>
              @if($order->status == 0)
              <span class="badge bg-info">Processing</span>
              @elseif($order->status == 1)
              <span class="badge bg-skyblue">Out For Delivery</span>
              @elseif($order->status == 2)
              <span class="badge bg-success">Delivered</span>
              @elseif($order->status == 3)
              <span class="badge bg-danger">Cancel</span>
              @elseif($order->status == 4)
              <span class="badge bg-danger">Uncomplete</span> <br>
              <a href="/payment/{{$order->id}}" class="btn btn-warning btn-sm">Go Payment</a>
              @endif
            </td>
          </tr>
          @endforeach

          </tbody>
      </table>
    </div>

  </div>
</div>

@endsection
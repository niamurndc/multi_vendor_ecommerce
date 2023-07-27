@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->track_desc}}">
<meta name="tags" content="{{$setting->track_tags}}">
@endsection

@section('title')
Track Order
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase text-skyblue">Track Your Order</h2>
      <div class="d-flex justify-content-center">
          <div class="col-md-6">
            <div class="mt-4 p-4">
                <form action="track-order" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="id">Order ID</label>
                        <input type="number" name="id" id="id" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-skyblue btn-block text-light">Track</button>
                </form>

                @if(session('message'))
                <h3 class="mt-4 text-danger text-center">{{session('message')}}</h3>
                @endif
                @if($order != null)
                    <h3 class="mt-4 text-success text-center">Your Given Order ID: {{$order->id}}</h3>
                    @if($order->status == 0)
                    <h3 class="text-success text-center">Last Status: Processing</h3>
                    @elseif($order->status == 1)
                    <h3 class="text-success text-center">Last Status: Out For Delivery</h3>
                    @elseif($order->status == 2)
                    <h3 class="text-success text-center">Last Status: Delivered</h3>
                    @elseif($order->status == 3)
                    <h3 class="text-success text-center">Last Status: Cancel</h3>
                    @endif
                @endif
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
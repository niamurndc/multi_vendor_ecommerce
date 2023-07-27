@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
Order Payment
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase text-skyblue">Select Payment Method</h2>
      <div class="d-flex justify-content-center">
          <div class="col-md-6">
            <div class="mt-4 p-4">
                <form action="/payment/{{$order->id}}" method="post">
                    @csrf

                    <div class="card p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="cod" value="cash" checked required>
                            <label class="form-check-label" for="cod">
                                Cash on Delivery
                            </label>
                        </div>
                    </div>

                    @foreach($methods as $method)
                    <div class="card p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="{{$method->id}}" value="{{$method->title}}" required>
                            <label class="form-check-label" for="{{$method->id}}">
                                {{$method->title}} - {{$method->number}}
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <button type="submit" class="btn btn-skyblue btn-block text-light">Confirm Payment</button>
                </form>
            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
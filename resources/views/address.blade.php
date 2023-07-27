@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Address
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase mb-5 text-skyblue">Shipping Address</h2>

      <div class="row d-flex justify-content-center">
          <div class="col-md-7">
            <a href="/add-address" class="btn btn-skyblue text-light w-100 text-center mb-3"><i class="fa fa-plus"></i> Add new address</a>
            <form action="set-address" method="post">@csrf
            @foreach($address as $review)
              <div class="border p-4 d-flex justify-content-between">
                  <div>
                    <h5>{{$review->home}} | {{$review->address}}</h5>
                    <p class="mb-1">Area: {{optional($review->area)->title}}</p>
                  </div>
                  <div class="pt-3">
                    <input class="form-check-input" type="radio" name="address" id="address" value="{{$review->id}}" required>
                  </div>
                  
              </div>
            @endforeach

            <div class="d-flex justify-content-between mt-4">
                <a href="/checkout" class="btn btn-secondary-skyblue">Back</a>
                <button type="submit" class="btn btn-skyblue text-light">Set Address</button>
            </div>
            </form>
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
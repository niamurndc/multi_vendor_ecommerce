@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Add Address
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase text-skyblue">Add Shipping Address</h2>
      <div class="d-flex justify-content-center">
          <div class="col-md-6">
            <div class="mt-4 p-4">
                <form action="add-address" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="area">Area</label>
                        <select name="area" id="area" class="form-control" required>
                            @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Street, road or village</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="home">Apartment or House no.</label>
                        <input type="text" name="home" id="home" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-skyblue btn-block text-light">Add Address</button>
                </form>

            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
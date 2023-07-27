@extends('layouts.home')


<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->camp_desc}}">
<meta name="tags" content="{{$setting->camp_tags}}">
@endsection


@section('title')
Campaign Products
@endsection

@section('content')

  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="">
      <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">campaign Products</h3>
      <h4 class="text-center text-uppercase mt-4"><span class="badge badge-danger text-light rounded-pill text-wrap" id="demotime"></span></h4>
      <div class="mt-4">
        <div class="row">
          @foreach($products as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
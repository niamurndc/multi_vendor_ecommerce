@extends('layouts.home')


<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->brand_desc}}">
<meta name="tags" content="{{$setting->brand_tags}}">
@endsection


@section('title')
{{$brand->title}}
@endsection

@section('content')

  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="">
      <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">brand: {{$brand->title}}</h3>
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
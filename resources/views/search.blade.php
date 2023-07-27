@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Search of {{$search}}
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="">
      <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">SEARCH RESULT OF: {{$search}}</h3>
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
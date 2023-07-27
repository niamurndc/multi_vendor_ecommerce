@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
{{$title}}
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h3 class="text-uppercase border-bottom pb-2">{{$title}}</h3>
      <div class="mt-4">
        {!!$content!!}
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
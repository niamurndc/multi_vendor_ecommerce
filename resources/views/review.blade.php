@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Customer Review
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase mb-5 text-skyblue">Your Reviews</h2>

      <div class="row d-flex justify-content-center">
          <div class="col-md-9 card p-3">
            @foreach($reviews as $rating)
            <div class="border-bottom">
              <div class="d-flex justify-content-between">
                <p class="mb-0">By <b>{{$rating->name}}</b>, {{$rating->created_at->format('d M Y')}}</p>
                <a href="/review/delete/{{$rating->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
              </div>
              
              @for($i = 0; $i < $rating->rating; $i++)
              <i class="fa fa-star"></i>
              @endfor
              <p>{{$rating->comment}}</p>
              
            </div>
            @endforeach
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
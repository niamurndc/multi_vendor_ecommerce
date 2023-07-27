@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
Add Review
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="p-4">
      <h2 class="text-center text-uppercase text-skyblue">Write Your Review</h2>
      <div class="d-flex justify-content-center">
          <div class="col-md-6">
            <div class="mt-4 p-4">
                <form action="add-review" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="desc">Write your opinion here</label>
                        <textarea name="desc" id="desc" rows="5" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-skyblue btn-block text-light">Track</button>
                </form>

            </div>
          </div>
      </div>
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
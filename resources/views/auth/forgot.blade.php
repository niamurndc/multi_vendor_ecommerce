@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Forgot Password
@endsection

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Forgot Password</h3>

    <form action="/forgot" method="POST"> @csrf

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" required autofocus>
      @error('phone')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-skyblue btn-block text-light my-4">Send Code</button>
    
    </form>

    <a href="/login" class="btn btn-outline-skyblue btn-block">
      Login
    </a>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
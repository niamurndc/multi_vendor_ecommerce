@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Password Reset
@endsection

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Reset Password</h3>

    <form action="/reset-pass" method="POST"> @csrf

    <div class="form-group">
      <label for="code">Code</label>
      <input type="number" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" required autofocus>
      @error('code')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required>
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="confirm-password">Confirm Password</label>
      <input type="password" name="password_confirmation" id="confirm-password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-skyblue btn-block text-light my-4">Reset Password</button>
    
    </form>

    <a href="/forgot" class="btn btn-outline-skyblue btn-block">
      Go Back
    </a>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
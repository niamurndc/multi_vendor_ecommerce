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

<div class="col-md-4 my-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Register</h3>

    <form action="{{ route('register') }}" method="POST"> @csrf

    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" required autofocus>
      @error('name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" required autofocus>
      @error('phone')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
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

    <button type="submit" class="btn btn-skyblue btn-block my-4 text-light">Register</button>

    <a href="/login" class="btn btn-outline-skyblue btn-block">
      Have an account? Login
    </a>

    <a href="/seller/register" class="btn btn-outline-danger mt-4 btn-block">
      Become a Seller
    </a>
    
    </form>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
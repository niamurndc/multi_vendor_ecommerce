@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
User Login
@endsection

@section('content')

<div class="col-md-4 my-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Login</h3>

    <form action="{{ route('login') }}" method="POST"> @csrf

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
      <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" required>
      @error('password')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>
    <a href="/forgot" class="text-dark">Lost your password?</a>

    <button type="submit" class="btn btn-skyblue btn-block text-light my-4">Login</button>
    
    </form>

    <a href="/register" class="btn btn-outline-skyblue btn-block">
      Create new account
    </a>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
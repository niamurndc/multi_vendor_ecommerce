@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->seller_desc}}">
<meta name="tags" content="{{$setting->seller_tags}}">
@endsection

@section('title')
Seller Login
@endsection

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Seller Login</h3>

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
    <a href="#" class="text-dark">Lost your password?</a>

    <button type="submit" class="btn btn-skyblue btn-block my-4">Login</button>

    <p class="text-center"><a href="/seller/register" class="text-dark"></a></p>
    
    </form>
    <a href="/seller/register" class="btn btn-outline-skyblue">Create new seller account</a>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->seller_desc}}">
<meta name="tags" content="{{$setting->seller_tags}}">
@endsection


@section('title')
Seller Registration
@endsection

@section('content')

<div class="col-md-4 mt-5 mx-auto">
  <div class="card p-4">
    
    <h3 class="text-center">Seller Register</h3>

    <form action="/seller/register" method="POST"> @csrf

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
      <label for="email">Email (optional)</label>
      <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" autofocus>
      @error('email')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="shop_name">Shop Name</label>
      <input type="text" name="shop_name" id="shop_name" class="form-control @error('shop_name') is-invalid @enderror" value="{{old('shop_name')}}" required autofocus>
      @error('shop_name')
        <div class="invalid-feedback">
          {{$message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="shop_address">Shop Address</label>
      <input type="text" name="shop_address" id="shop_address" class="form-control @error('shop_address') is-invalid @enderror" value="{{old('shop_address')}}" required autofocus>
      @error('shop_address')
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

    <button type="submit" class="btn btn-skyblue btn-block my-4">Register</button>

    
    </form>

    <a href="/seller/login" class="btn btn-outline-skyblue">Have seller account? Login</a>
  </div>
</div>
 <!-- / Cart view section -->
@endsection
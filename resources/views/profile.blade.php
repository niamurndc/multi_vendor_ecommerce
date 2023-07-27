@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
User Profile
@endsection

@section('content')

<div class="col-md-6 mx-auto my-5">
  <div class="card p-4">
    <h4>My Profile</h4>
    <p>Update your profile</p>
    <form action="/profile" method="POST">
      @csrf 
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{auth()->user()->phone}}" readonly>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-skyblue btn-block mt-4">Update</button>
    </form>
  </div>
</div>
@endsection
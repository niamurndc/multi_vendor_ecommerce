@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
{{$method->title}} Payment
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container my-5">
      <div class="d-flex justify-content-center">
          <div class="col-md-4">
            <div class="card mt-4 py-4 px-2 text-center d-flex align-items-center flex-column">
                <img src="/uploads/payment/{{$method->logo}}" alt="payment Image" height="100px" width="200px">

        
                <form action="/payment-method/{{$method->title}}/{{$id}}" method="post">
                    @csrf

                    <input type="text" name="trxid" placeholder="Transection ID" class="form-control my-4 @error('trxid') is-invalid @enderror" required>


                    <button type="submit" class="btn btn-skyblue btn-block text-light">Submit</button>
                </form>
            </div>
          </div>
      </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
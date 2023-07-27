@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Page Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Setup Page Content</h6>
        <form action="/admin/page/edit" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="privacy">Privacy Policy</label>
              <textarea row="5" name="privacy" id="privacy" class="form-control @error('privacy') is-invalid @enderror" required>{{$page->privacy}}</textarea>
              @error('privacy')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="terms">Terms & Conditions</label>
              <textarea row="5" name="terms" id="terms" class="form-control @error('terms') is-invalid @enderror" required>{{$page->terms}}</textarea>
              @error('terms')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="return">Return Policy</label>
              <textarea row="5" name="return" id="return" class="form-control @error('return') is-invalid @enderror" required>{{$page->return}}</textarea>
              @error('return')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="payment">Payment Policy</label>
              <textarea row="5" name="payment" id="payment" class="form-control @error('payment') is-invalid @enderror" required>{{$page->payment}}</textarea>
              @error('payment')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="about">About Us</label>
              <textarea row="5" name="about" id="about" class="form-control @error('about') is-invalid @enderror" required>{{$page->about}}</textarea>
              @error('about')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="contact">Contact Us</label>
              <textarea row="5" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" required>{{$page->contact}}</textarea>
              @error('contact')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div> 





    </div>
  </div>
</div>

@endsection
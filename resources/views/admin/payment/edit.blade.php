@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Payment Methods</h2>
    <a href="/admin/payments" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Payment method</h6>
        <div class="d-flex justify-content-end">
          <img src="/uploads/payment/{{$payment->logo}}" alt="payment image" height="50px" width="50px">
        </div>
        <form action="/admin/payment/edit/{{$payment->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$payment->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="number">Number</label>
              <input type="text" name="number" id="number" value="{{$payment->number}}" class="form-control @error('number') is-invalid @enderror">
              @error('number')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="logo">Logo</label>
              <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror">
              @error('logo')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="status">Active</label>
              <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option {{ $payment->status == 0 ? 'selected' : ''}} value="0">Deactive</option>
                <option {{ $payment->status == 1 ? 'selected' : ''}} value="1">Active</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="col-md-4 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection
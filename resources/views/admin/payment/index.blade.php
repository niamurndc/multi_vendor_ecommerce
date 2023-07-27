@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Payment Methods</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
      <div class="card px-3 py-3">
        <h6 class="mb-3">Add New Payment Method</h6>
        <form action="/admin/payment/create" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="number">Marchent/Payment Number</label>
              <input type="text" name="number" id="number" class="form-control @error('number') is-invalid @enderror">
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

            <div class="col-md-4 text-left">
              <button type="submit" class="btn btn-primary mt-4">Add New</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Payment Method</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Logo</th>
              <th scope="col">Title</th>
              <th scope="col">Number</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($payments as $payment)
            <tr>
              <td><img src="/uploads/payment/{{$payment->logo}}" alt="payment image" height="30px" width="30px"></td>
              <td>{{$payment->title}}</td>
              <td>{{$payment->number}}</td>
              <td>@if($payment->status == 0) Deactive @else Active @endif</td>
              <td>
              @if(auth()->user()->role == 1)
                <a href="/admin/payment/edit/{{$payment->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/payment/delete/{{$payment->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
              @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
@endsection

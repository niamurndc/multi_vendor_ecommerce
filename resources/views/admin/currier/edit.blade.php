@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Curriers</h2>
    <a href="/admin/curriers" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Currier</h6>
        <div class="d-flex justify-content-end">
          <img src="/uploads/currier/{{$currier->image}}" alt="currier image" height="50px" width="50px">
        </div>
        <form action="/admin/currier/edit/{{$currier->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$currier->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="form-group col-md-4">
              <label for="total">Total Amount</label>
              <input type="number" step="0.01" name="total" id="total" class="form-control @error('total') is-invalid @enderror" value="{{$currier->total}}">
              @error('total')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="paid">Paid Amount</label>
              <input type="number" step="0.01" name="paid" id="paid" class="form-control @error('paid') is-invalid @enderror" value="{{$currier->paid}}">
              @error('paid')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="due">Processing Amount</label>
              <input type="number" step="0.01" name="due" id="due" class="form-control @error('due') is-invalid @enderror" value="{{$currier->due}}">
              @error('due')
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
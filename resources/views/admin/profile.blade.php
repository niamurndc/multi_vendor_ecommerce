@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Update Profile</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Update Profile</h6>
        <form action="/admin/profile" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" value="{{$profile->name}}" class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" value="{{$profile->phone}}" class="form-control" readonly>
            </div>

            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" value="{{$profile->email}}" class="form-control">
            </div>



            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
              @error('password')
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
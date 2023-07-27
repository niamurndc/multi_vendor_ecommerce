@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>SMS Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Update SMS Setting</h6>
        <form action="/admin/sms/setting" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
              <label for="url">Sms URL</label>
              <input type="text" name="url" id="url" value="{{$sms->url}}" class="form-control @error('url') is-invalid @enderror">
              @error('url')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="api">Api Key</label>
              <input type="text" name="api" id="api" value="{{$sms->api}}" class="form-control @error('api') is-invalid @enderror">
              @error('api')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="phone">Sender ID</label>
              <input type="text" name="phone" id="phone" value="{{$sms->phone}}" class="form-control @error('phone') is-invalid @enderror">
              @error('phone')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-6">
              <label for="type">Type</label>
              <input type="text" name="type" id="type" value="{{$sms->type}}" class="form-control @error('type') is-invalid @enderror">
              @error('type')
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
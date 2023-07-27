@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>SMS Send</h2>
    <a href="/admin/sms-lists" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Send SMS</h6>
        <div class="d-flex justify-content-end">
        </div>
        <form action="/admin/sms-send" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6">
                <label for="list">Select List</label>
                <select name="list" id="list" class="form-control @error('list') is-invalid @enderror">
                    <option value="">--select--</option>
                    <option value="0">All Customers</option>
                    <option value="-1">Single Customer</option>
                    @foreach($lists as $list)
                    <option value="{{$list->id}}">{{$list->title}}</option>
                    @endforeach
                </select>
                @error('list')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="user">Select User (for single customer)</label>
                <select name="user" id="user" class="form-control @error('user') is-invalid @enderror">
                    <option value="">Select User</option>
                    @foreach($users as $user)
                    <option value="{{$user->phone}}">{{$user->name}}-{{$user->phone}}</option>
                    @endforeach
                </select>
                @error('user')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>


            <div class="col-md-12 mt-4">
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="3" class="form-control" placeholder="type message here...."></textarea>
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
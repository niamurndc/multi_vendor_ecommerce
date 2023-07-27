@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>{{$slist->title}}</h2>
    <a href="/admin/sms-lists" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Add Number to List</h6>

        <form action="/admin/sms-item/create/{{$slist->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="0">Existing (select user)</option>
                    <option value="1">New (add new user)</option>
                </select>
                @error('type')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="user">Select User</label>
                <select name="user" id="user" class="form-control @error('user') is-invalid @enderror">
                    <option value="">Select User</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}-{{$user->phone}}</option>
                    @endforeach
                </select>
                @error('user')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" value="{{$slist->name}}" class="form-control @error('name') is-invalid @enderror">
              @error('name')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="note">Note</label>
              <input type="text" name="note" id="note" value="{{$slist->note}}" class="form-control @error('note') is-invalid @enderror">
              @error('note')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="phone">Phone</label>
              <input type="number" name="phone" id="phone" value="{{$slist->phone}}" class="form-control @error('phone') is-invalid @enderror">
              @error('phone')
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

      <div class="card px-3 py-3">
          <div class="table-responsive ">
              <table class="table-bordered col-md-6">
                  <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Note</th>
                      <th>Delete</th>
                  </tr>
                  @foreach($slist->items as $item)
                  <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->phone}}</td>
                      <td>{{$item->note}}</td>
                      <td><a href="/admin/sms-item/delete/{{$item->id}}" class="btn btn-danger">X</a></td>
                  </tr>
                  @endforeach
              </table>
          </div>
      </div>

    </div>
  </div>
</div>

@endsection
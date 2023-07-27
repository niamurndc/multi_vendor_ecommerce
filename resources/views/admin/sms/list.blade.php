@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>SMS List</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
      <div class="card px-3 py-3">
        <h6 class="mb-3">Add New List</h6>
        <form action="/admin/sms-list/create" method="post" enctype="multipart/form-data">
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
              <label for="comment">Comment</label>
              <input type="text" name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">
              @error('comment')
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
        <h6 class="mb-3">All List</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Comment</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($slists as $slist)
            <tr>
              <td>{{$slist->title}}</td>
              <td>{{$slist->comment}}</td>
              <td>
              @if(auth()->user()->role == 1)
                <a href="/admin/sms-list/view/{{$slist->id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                <a href="/admin/sms-list/edit/{{$slist->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/sms-list/delete/{{$slist->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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

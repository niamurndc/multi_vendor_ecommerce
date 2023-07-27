@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Currier</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
      <div class="card px-3 py-3">
        <h6 class="mb-3">Add New Currier</h6>
        <form action="/admin/currier/create" method="post" enctype="multipart/form-data">
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
              <label for="total">Total Amount</label>
              <input type="number" step="0.01" name="total" id="total" class="form-control @error('total') is-invalid @enderror">
              @error('total')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="paid">Paid Amount</label>
              <input type="number" step="0.01" name="paid" id="paid" class="form-control @error('paid') is-invalid @enderror">
              @error('paid')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="due">Processing Amount</label>
              <input type="number" step="0.01" name="due" id="due" class="form-control @error('due') is-invalid @enderror">
              @error('due')
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
        <h6 class="mb-3">All Categories</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Total Amount</th>
              <th scope="col">Paid</th>
              <th scope="col">Processing</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($curriers as $currier)
            <tr>
              <td>{{$currier->title}}</td>
              <td>{{$currier->total}}</td>
              <td>{{$currier->paid}}</td>
              <td>{{$currier->due}}</td>
              <td>
                <a href="/admin/currier/edit/{{$currier->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/currier/delete/{{$currier->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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

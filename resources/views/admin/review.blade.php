@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Product Reviews</h2>
    <a href="/admin/product/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Product Reviews</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Product Title</th>
          <th scope="col">Time</th>
          <th scope="col">Star</th>
          <th scope="col">Comment</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reviews as $review)
        <tr>
          <td>{{$review->name}}</td>
          <td><img src="/uploads/product/{{optional($review->product)->image}}" alt="" height="60px" width="60px"></td>
          <td>{{optional($review->product)->title}}</td>
          <td>{{$review->created_at}}</td>
          <td>{{$review->star}}</td>
          <td>{{$review->comment}}</td>
          <td>
            <a href="/admin/review/delete/{{$review->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

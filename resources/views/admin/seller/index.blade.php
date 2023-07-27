@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Sellers</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All sellers</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Shop</th>
          <th scope="col">Address</th>
          <th scope="col">Balance</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sellers as $seller)
        <tr>
          <td>{{$seller->id}}</td>
          <td>{{$seller->name}}</td>
          <td>{{$seller->phone}}</td>
          <td>{{$seller->shop_name}}</td>
          <td>{{$seller->shop_address}}</td>
          <td>{{$seller->balance}} Tk</td>
          <td>
            <a href="/admin/seller/edit/{{$seller->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="/admin/seller/delete/{{$seller->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

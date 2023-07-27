@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Offline Order</h2>
    <a href="/admin/sell/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All offline orders</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Date</th>
          <th scope="col">Invc.</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Area</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Paid</th>
          <th scope="col">Due</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sells as $sell)
        <tr>
          <td>{{$sell->id}}</td>
          <td>{{$sell->created_at->format('d-M-y')}}</td>
          <td>{{$sell->invc}}</td>
          <td>{{$sell->name}}</td>
          <td>{{$sell->phone}}</td>
          <td>{{$sell->area}}</td>
          <td>{{$sell->subtotal}}</td>
          <td>{{$sell->pay}}</td>
          <td>{{$sell->due}}</td>
          <td>
            <a href="/admin/sell/view/{{$sell->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
            <a href="/admin/sell/edit/{{$sell->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="/admin/sell/delete/{{$sell->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

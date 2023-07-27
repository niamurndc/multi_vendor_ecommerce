@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Online Order</h2>
    <a href="/admin/sell/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Online Orders</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Date</th>
          @if(auth()->user()->role == 1)
          <th scope="col">Shop</th>
          <th scope="col">Comis.</th>
          @endif
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Area</th>
          <th scope="col">Subtotal</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{$order->id}}</td>
          <td>{{$order->created_at->format('d-M-y')}}</td>
          @if(auth()->user()->role == 1)
          <td>{{optional($order->seller)->shop_name}}</td>
          <td>@if($order->comission == 1) ok @endif</td>
          @endif
          <td>{{optional($order->user)->name}}</td>
          <td>{{optional($order->user)->phone}}</td>
          <td>{{optional(optional($order->address)->area)->title}}</td>
          <td>{{$order->subtotal}}</td>
          <td>
            @if($order->status == 0)
            <span class="badge bg-info">Processing</span>
            @elseif($order->status == 1)
            <span class="badge bg-warning">Out For Delivery</span>
            @elseif($order->status == 2)
            <span class="badge bg-success">Delivered</span>
            @elseif($order->status == 3)
            <span class="badge bg-danger">Cancel</span>
            @endif
          </td>
          <td>
            <a href="/admin/order/edit/{{$order->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
            @if(auth()->user()->role == 1)
            <a href="/admin/order/delete/{{$order->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

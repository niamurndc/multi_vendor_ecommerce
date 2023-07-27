@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Offline Order</h2>
    <a href="/admin/sells" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card p-3 mb-5">
        <h6>Order Details</h6>
        <h5 class="mb-4 text-primary">ID: #{{$sell->id}}</h5>

        <h6>Invoice No.: {{$sell->invc}}</h6>
        <p>Name: {{$sell->name}}</p>
        <p>Phone: {{$sell->phone}}</p>
        <p>Area: {{$sell->area}}</p>
        <p>Address: {{$sell->address}}</p>
        <p>Total: {{$sell->total}}</p>
        <p>Delivery Charge: {{$sell->charge}}</p>
        <p>Subtotal: {{$sell->subtotal}}</p>
        <p>Paid: {{$sell->pay}}</p>
        <p>Due: {{$sell->due}}</p>

        <h6>Order Time: {{$sell->created_at->format('d-M-Y')}}</h6>
      </div>

      <div class="card p-3 mb-5">
        <h6>Product Details</h6>
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <?php $total = 0; ?>
          <tbody>
            @foreach($sell->carts as $cart)
            <tr>
              <td>{{$cart->product->title}}</td>
              <td> {{$cart->price}}</td>
              <td>{{$cart->qty}}</td>
              <td>{{$total += $cart->price * $cart->qty}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
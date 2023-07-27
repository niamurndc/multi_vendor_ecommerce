



@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Online Order</h2>
    <a href="/admin/orders" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card p-3 mb-5">
        <h6>Order Details</h6>
        <div class="d-flex justify-content-between align-items-center">
          
          <h5 class="mb-4 text-primary">ID: #{{$order->id}}</h5>
          <div>
            @if($order->status == 0)
            <span class="badge bg-info">Processing</span>
            @elseif($order->status == 1)
            <span class="badge bg-warning">Out For Delivery</span>
            @elseif($order->status == 2)
            <span class="badge bg-success">Delivered</span>
            @elseif($order->status == 3)
            <span class="badge bg-danger">Cancel</span>
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-md-7">
            <table class="table table-bordered">
              <tr>
                <td>Name: </td>
                <td><b>{{optional($order->user)->name}}</b></td>
              </tr>
              <tr>
                <td>Phone: </td>
                <td><b>{{optional($order->user)->phone}}</b></td>
              </tr>
              <tr>
                <td>Area: </td>
                <td><b>{{optional(optional($order->address)->area)->title}}</b></td>
              </tr>
              <tr>
                <td>Address: </td>
                <td>{{optional($order->address)->home}} {{optional($order->address)->address}}</td>
              </tr>
              <tr>
                <td>Total: </td>
                <td><b>{{$order->total}}</b></td>
              </tr>
              <tr>
                <td>Delivery Charge: </td>
                <td><b>{{$order->charge}}</b></td>
              </tr>
              <tr>
                <td>Subtotal: </td>
                <td><b>{{$order->subtotal}}</b></td>
              </tr>
              <tr>
                <td>Payment Method: </td>
                <td><b>{{$order->method}}</b></td>
              </tr>
              <tr>
                <td>Order Time: </td>
                <td><b>{{$order->created_at->format('d-M-Y')}}</b></td>
              </tr>
            </table>
          </div>

          <div class="col-md-5">
            <form action="/admin/order/edit/{{$order->id}}" method="post">
              @csrf 
              <div class="form-group">
                <label for="status">Order Status</label>
                <select name="status" class="form-control">
                  <option {{ $order->status == 0 ? 'selected' : ''}} value="0">Processig</option>
                  <option {{ $order->status == 1 ? 'selected' : ''}} value="1">Out For Delivery</option>
                  <option {{ $order->status == 2 ? 'selected' : ''}} value="2">Delivered</option>
                  <option {{ ($order->status == 3) ? 'selected' : ''}} value="3">Cancel</option>
                </select>
              </div>
              

              <div class="form-group">
                <label for="currier">Currier</label>
                <select name="currier" id="currier" class="form-control">
                  <option value="0">No currier selected</option>
                  @foreach(App\Models\Currier::all() as $curi)
                  <option value="{{$curi->id}}">{{$curi->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="trackid">Currier Track ID</label>
                <input type="text" name="trackid" id="trackid" class="form-control" value="{{$order->trackid}}">
              </div>

              <button type="submit" class="btn btn-primary mt-3">Update Status</button>
            </form>
          </div>
        </div>
      </div>

      <div class="card p-3 mb-5">
        <h6>Product Details</h6>
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Size</th>
              <th scope="col">Color</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <?php $total = 0; ?>
          <tbody>
            @foreach($order->carts as $cart)
            <tr>
              <td>{{$cart->product->title}}</td>
              <td> {{$cart->price}}</td>
              <td>{{$cart->size}}</td>
              <td>{{$cart->color}}</td>
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
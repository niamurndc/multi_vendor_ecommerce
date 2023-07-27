@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Product Sell Report</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <div class="row mb-4">
      <div class="col-md-6">
        <h6 class="mb-3">Product Wise Sale</h6>
      </div>
      <div class="col-md-6 text-right">
        <form action="/admin/report/product-sell" method="post">
          @csrf 
          <div class="row">
            <div class="col-md-8">
              <select name="product_id" class="form-control" required>
                <option value="">Select a product</option>
                @foreach($products as $pro)
                  <option value="{{$pro->id}}">{{$pro->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>

    @if($carts != null)
    <div class="row">
      <div class="col-md-7">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <?php $tqty = 0; $total = 0; ?>
          <tbody>
            @foreach($carts as $cart)
            <tr>
              <td>{{$cart->created_at->format('d-M-y')}}</td>
              <td>{{$tqty += $cart->qty}}</td>
              <td>{{$cart->price}}</td>
              <td>{{$total = $cart->price * $cart->qty}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-md-5 mt-4 border py-4">
        <h6>Total Unit Sale: {{$tqty}}</h6>
        <h6>Total Sale Price: {{$total}}</h6>
      </div>
    </div>
    @endif
  </div>

</div>
@endsection

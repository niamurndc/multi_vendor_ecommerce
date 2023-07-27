@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Inventory (Brand)</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <div class="row mb-4">
      <div class="col-md-4">
        <h6 class="mb-3">Brand Wise Product</h6>
      </div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <form action="/admin/inventories/brand" method="post">
          @csrf 
          <div class="row">
            <div class="col-9">
              <select name="search" class="form-control col-9">
                <option value="0">Select a brand</option>
                @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary col-2"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    
    <table class="table table-striped" >
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Brand</th>
          <th scope="col">Qty</th>
          <th scope="col">Adjustment</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td><img src="/uploads/product/{{$product->image}}" alt="Image" height="40px" width="40px"></td>
          <td>{{$product->title}}</td>
          <td>{{$product->price}} <br> <strike>{{$product->offprice}}</strike></td>
          <td>@if($product->category_id != 0){{$product->category->title}} @endif</td>
          <td>@if($product->brand_id != 0){{$product->brand->title}} @endif</td>
          <td>{{$product->qty}}</td>
          <td>
            <form action="/admin/inventory/edit/{{$product->id}}" method="post" class="form-inline row"> @csrf
            <input type="number" name="qty" class="form-control form-control-sm col-9" style="width: 80px;" value="{{$product->qty}}">
            <button type="submit" class="btn btn-sm btn-primary col-3"><i class="fa fa-pencil"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection

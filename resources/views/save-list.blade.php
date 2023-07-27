@extends('layouts.home')

<?php $setting = App\Models\Setting::find(1); ?>
@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection


@section('title')
Favorite Products
@endsection

@section('content')
<?php $total = 0 ; ?>
  <div class="container my-5">
    <div class="">
      
      <div class="row py-2 py-md-0 px-md-4">
        <div class="col-md-8">
          <div class="card p-4">
            <h3 class="text-uppercase mb-4 border-bottom">saved products</h3>
            @foreach($savelists as $cart)
            <div class="row border-bottom p-3">
              <div class="col-3">
                <img src="/uploads/product/{{$cart->product->image}}" alt="img" class="cart-product-image">
              </div>
              <div class="col-9">
                <h5>{{$cart->product->title}}</h5>
                <p>Category: {{$cart->product->category != null ? $cart->product->category->title : 'No Category'}}</p>
                <h4 class="my-md-3">{{$cart->product->price}} BDT</h4>

                <div class="d-flex align-items-center justify-content-end">
                  <a href="/save-later/delete/{{$cart->id}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
                
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
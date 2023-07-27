@extends('layouts.home')

@section('meta')
<meta name="description" content="{{$product->meta_desc}}">
<meta name="tags" content="{{$product->tags}}">
@endsection

@section('title')
{{$product->title}}
@endsection

@section('content')
  <!-- First Product Show Category -->
  <div class="container mt-5">
    <div class="">
      <div class="row">
        <div class="col-md-8">
          <div class="card p-4">
            <div class="row">
              <div class="col-md-5">
                <img src="/uploads/product/{{$product->image}}" class="product-details-image">
              </div>
              <div class="col-md-7">
                <h4 class="mt-4 mt-md-0">{{$product->title}}</h4>

                <p class="text-secondary mt-4 border-bottom">Sold By: {{optional($product->seller)->shop_name}}</p>

                <h5>Avilability: @if($product->qty > 0) <b class="text-success">In Stock</b> @else <b class="text-danger">Out of Stock</b> @endif </h5>

                <div class="row my-5">
                  <div class="col-9">
                    <h2 class="text-dark">{{$product->price}} BDT</h2>
                  </div>
                  <div class="col-2">
                    <a href="/save-later" class="btn btn-light btn-lg"><i class="fa fa-heart-o text-tartiary-skyblue"></i></a>
                  </div>
                </div>
                

                <form action="/add-cart/{{$product->id}}" method="post">@csrf 

                <div class="row">

                  @if($product->size != null)
                  <div class="form-group col-md-6">
                    <label for="size">Size</label>
                    <select name="size" id="size" class="form-control" required>
                      @foreach(json_decode($product->size) as $size)
                      <option value="{{$size}}">{{$size}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif

                  @if($product->color != null)
                  <div class="form-group col-md-6">
                    <label for="color">Color</label>
                    <select name="color" id="color" class="form-control" required>
                      @foreach(json_decode($product->color) as $color)
                      <option value="{{$color}}">{{$color}}</option>
                      @endforeach
                    </select>
                  </div>
                  @endif

                  <div class="form-group col-md-12">
                    <label for="qty">Quantity</label>
                    <select name="qty" id="qty" class="form-control" required>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>

                </div>
                
                <div class="col-md-6 pl-0">
                  
                </div>

                @if($product->qty > 0)
                <div class="cart-button-grp mt-4 row px-3 d-flex">
                  <a href="/buy-now/{{$product->id}}" class="btn btn-secondary-skyblue col-6">Buy Now</a>
                  <button type="submit" class="btn btn-skyblue col-6 text-white">Add to Cart</button>
                </div>
                @endif
                
              </div>
              </form>

              <div class="col-md-12 mt-5">
                <h5 class="text-skyblue">Description</h5>
                <hr>
                {{$product->desc}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-3">
            <p class="pt-4"><i class="fa fa-money text-skyblue"></i> Cash on Delivery Avilable</p>
            <p><i class="fa fa-truck text-skyblue"></i> Free Shipping</p>
            <p class="mb-4"><i class="fa fa-refresh text-skyblue"></i> 7 days Easy Return</p>
          </div>

          <!-- rating section -->
          <div class="card p-3 mt-4">
            <h5 class="text-skyblue">Product Review & Ratings</h5>
            
            <div class="d-flex border-bottom">
              @if(count($product->ratings) == 0)
              <h1 class="text-skyblue">0.0</h1>
              <div class="px-4">
                <p class="mb-0 text-secondary">No Ratings </p>
              </div>
              @else
              <?php $totalRating = App\Models\ProductReview::where('product_id', $product->id)->sum('rating') / count($product->ratings) ?>
              <h1 class="text-skyblue">{{round($totalRating)}}.0</h1>
              <div class="px-4">
                <p class="mb-0 text-secondary">{{count($product->ratings)}} Ratings </p>
                @for($i = 1; $i <= round($totalRating); $i++)
                <i class="fa fa-star text-skyblue"></i>
                @endfor
              </div>
              @endif
              <div>
                @guest
                <a href="/login" class="btn btn-secondary-skyblue btn-lg">Give Rating</a>
                @endguest
              </div>
              
            </div>
            @auth
            <div class="border-bottom p-3">
              <form action="/add-review" method="post">
                @csrf 
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="row">
                  <div class="col-8">
                    <select name="rating" id="rating" class="form-control mt-3">
                      <option value="">Give Rating</option>
                      <option value="1">1 Start</option>
                      <option value="2">2 Start</option>
                      <option value="3">3 Start</option>
                      <option value="4">4 Start</option>
                      <option value="5">5 Start</option>
                    </select>
                  </div>
                  
                
                  <div class="col-8">
                    <textarea name="comment" rows="3" class="form-control mt-3" placeholder="Write your comment here"></textarea>
                  </div>

                </div>

                <button type="submit" class="btn btn-skyblue mt-3 text-light">Add Review</button>
              </form>
            </div>
            @endauth

            @php $ratecount = 1; @endphp
            @foreach($product->ratings as $rating)
            @if($ratecount  < 4)
            <div class="border-bottom p-3">
              <p class="mb-0 text-tartiary-skyblue">By <b>{{$rating->name}}</b>, {{$rating->created_at->format('d M Y')}}</p>
              @for($i = 0; $i < $rating->rating; $i++)
              <i class="fa fa-star text-skyblue"></i>
              @endfor
              <p class="text-secondary">{{$rating->comment}}</p>
              @php $ratecount++; @endphp
            </div>
            @endif
            @endforeach
          </div>
        </div>

        
      </div>   
    </div>
  </div>

  <!-- First Product Show Category -->
  <div class="container my-5">
    <div class="">
      <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">Releted Products</h3>
      <p class="text-center"><a href="/" class="text-dark">Shop more</a></p>
      <div class="mt-4 p-md-4">
        <div class="row">
          @foreach(App\Models\Product::where('category_id', $product->category_id)->limit(4)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

@endsection
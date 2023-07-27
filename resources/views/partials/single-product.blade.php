<div class="col-6 col-sm-4 col-md-4 col-lg-3 mb-4 px-4">
  <div class="card shadow rounded position-relative h-100">

    <div class="p-1 p-md-4">
      @if($product->campaign != null)
      <span class="position-absolute bg-warning rounded-circle px-1 py-2 font-weight-bold">SALE</span>
      @endif
      <a href="/product/{{$product->id}}" class="text-dark text-decoration-none">
      <img src="/uploads/product/{{$product->image}}" alt="product-image" class="product-image">
      <div class="product-title my-2 text-center">
        <h6 class="mb-0">{{Str::limit($product->title, 60)}}</h6>
      </div>
      </a>
      <h5 class="text-center font-weight-bold">{{$product->price}} BDT</h5>

    </div>

    <div class="bg-skyblue d-flex row py-2 mb-4 mx-0 text-center">
      <a href="/product/{{$product->id}}" class="text-light border-right col-7">Details</a>
      <a href="/add-cart/{{$product->id}}" class="text-light col-5">Buy</a>
    </div>

    
  </div>
</div>
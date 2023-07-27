@extends('layouts.home')

@section('meta')
<meta name="description" content="{{$setting->home_desc}}">
<meta name="tags" content="{{$setting->home_tags}}">
@endsection

@section('title')
{{$setting->subtitle}}
@endsection

@section('content')
  <!-- Start slider -->
  <div class="container my-3">
    @include('partials.slider')
  </div>
  
  <!-- / slider -->
  <!-- product Categories -->
  <div class="container mt-5">
    <div class="">
      <h5 class="text-center py-2 text-light mb-0"><span class="bg-skyblue rounded-top px-3 py-2"> TOP CATEGORIES </span> </h5>
      <div class="border border-skyblue rounded pt-2">
        <div class="row">
          @foreach(App\Models\Category::limit($setting->cat_num)->get() as $category)
          <div class="col-lg-2 col-md-3 col-sm-3 col-4 mb-4">
            <div class="card shadow p-2">
                <a href="/category/{{$category->id}}" class="text-dark category-text text-decoration-none">
                  <div class="text-center">
                    <img src="/uploads/category/{{$category->image}}" alt="" class="cat-image">
                  
                  </div>
                  <div class="text-center mt-2">
                    <h5>{{$category->title}}</h5>
                  </div>
                </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- / product categories end -->


    <!-- product Brands -->
    <div class="container mt-5">
    <div class="">
      <h5 class="text-center py-2 text-light mb-0"><span class="bg-skyblue rounded-top px-3 py-2">SHOP BY BRANDS </span></h5>
      <div class="border border-skyblue pt-2 rounded">
        <div class="row">
          @foreach(App\Models\Brand::limit($setting->cat_num)->get() as $brand)
          <div class="col-lg-2 col-md-3 col-sm-3 col-4 mb-4">
            <div class="card shadow p-2">
              <a href="/brand/{{$brand->id}}" class="text-dark category-text text-decoration-none">
                <div class="text-center">
                  <img src="/uploads/brand/{{$brand->image}}" alt="" class="cat-image">
                
                </div>
                <div class="text-center mt-2">
                  <h5>{{$brand->title}}</h5>
                </div>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- / product brands end -->

  <!-- Campaign Products Section -->
  <div class="container mt-5">
    <div class="">
    <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">campaign product</h3>
    <h4 class="text-center text-uppercase mt-4"><span class="badge badge-danger text-light rounded-pill text-wrap" id="demotime"></span></h4>
      <div class="mt-4">
        <div class="row">
          @foreach(App\Models\Product::where('campaign', 'on')->orderBy('id', 'desc')->where('status', 1)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- Campaign Products Section -->
  <div class="container mt-5">
    <div class="">
    <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">special discount</h3>
      <div class="mt-4">
        <div class="row">
          @foreach(App\Models\Product::where('discount', 'on')->orderBy('id', 'desc')->where('status', 1)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>


  <!-- Trending Products Section -->
  <div class="container mt-5">
    <div class="">
    <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">{{$feature->title1}}</h3>
      <div class="mt-4">
        <div class="row">
          @foreach(App\Models\Product::limit($feature->number1)->orderBy('id', 'desc')->where('status', 1)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / Trending Products Section -->

  <!-- First Product Show Category -->
  <div class="container mt-5">
    <div class="">
    <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">{{$feature->title2}}</h3>
      <div class="mt-4">
        <div class="row">
          @foreach(App\Models\Product::where('category_id', $feature->cat_id2)->where('status', 1)->limit($feature->number2)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

  <!-- First Product Show Category -->
  <div class="container mt-5">
    <div class="">
      <h3 class="text-center text-uppercase bg-skyblue py-2 text-light">{{$feature->title3}}</h3>

      <div class="mt-4">
        <div class="row">
          @foreach(App\Models\Product::where('category_id', $feature->cat_id3)->where('status', 1)->limit($feature->number3)->get() as $product)
            @include('partials.single-product')
          @endforeach
        </div>
      </div>
      
    </div>
  </div>

  <!-- / First Product Show Category -->

  <!-- Support section -->
  <div class="bg-support px-5 text-light mt-5">
    <div class="p-4 container support">
      <div class="row">
        <div class="col-md-4 text-center px-5">
          <i class="fa fa-truck mb-3"></i>
          <h4>EVERYDAY DELIVARY</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis rerum labore ut tempora nam ab ipsam.</p>
        </div>
        <div class="col-md-4 text-center px-5">
          <i class="fa fa-clock-o mb-3"></i>
          <h4>FAST DELIVARY</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis rerum labore ut tempora nam ab ipsam.</p>
        </div>
        <div class="col-md-4 text-center px-5">
          <i class="fa fa-phone mb-3"></i>
          <h4>24/7 SUPPORT</h4>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis rerum labore ut tempora nam ab ipsam.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- / Support section -->




@endsection
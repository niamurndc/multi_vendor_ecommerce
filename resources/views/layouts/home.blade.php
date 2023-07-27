<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  @yield('meta')
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fontawesome ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >

  <link rel="stylesheet" href="/css/app.css">

   <!-- toaster -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" href="/css/style.css">
  <?php $setting = App\Models\Setting::find(1); ?>

  <title>{{$setting->title}} - @yield('title')</title>
</head>
<body>
  

  <div class="top-header text-dark bg-second-skyblue d-none d-md-block">
    <div class="px-4 py-2">
      <div class="row">
        <div class="col-md-6 d-flex">
          <p class="mb-0 mt-1 mr-4"><i class="fa fa-phone"></i> {{$setting->phone}}</p>
          <p class="mb-0 mt-1 mr-4"><i class="fa fa-envelope"></i> {{$setting->email}}</p>
          <p class="mb-0 mt-1"><a href="/track-order" class="text-dark"><i class="fa fa-paper-plane"></i> Track Order</a> </p>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{$setting->facebook}}" class="social-link text-dark"><i class="fa fa-facebook"></i></a>
            <a href="{{$setting->twitter}}" class="social-link text-dark"><i class="fa fa-twitter"></i></a>
            <a href="{{$setting->instagram}}" class="social-link text-dark"><i class="fa fa-instagram"></i></a>
            <a href="{{$setting->youtube}}" class="social-link text-dark"><i class="fa fa-youtube"></i></a>
        </div>
      </div>
    </div>
  </div>
  <header class="bg-skyblue text-white">
    <div class="header-content d-flex justify-content-between align-items-center p-2 px-md-4">
      <div class="header-box-left text-left d-flex align-items-center">
        <i class="fa fa-bars mr-3" id="menu-button"></i>
        <a href="/" class="text-white"><h3 class="brand-logo">{{$setting->title}}</h3></a>
        
      </div>
      
      <div class="search-box">
        <form action="/search" method="get" class="search-form d-flex align-items-center">
          <input type="text" name="search" id="search" class="form-control header-search">
          <button type="submit" class="btn btn-warning btn-sm p-1"><i class="fa fa-search"></i></button>
        </form>
        
      </div>
      <div class="review-campaign d-flex justify-content-start align-items-center">
        <a href="/review" class="header-box-link text-light mr-4 d-none d-md-flex align-items-center"><i class="fa fa-comment"></i> Review</a>
            <a href="/product-campaign" class="header-box-link text-light mr-4 d-none d-md-flex align-items-center"><i class="fa fa-bullhorn"></i> Campaign</a>
      </div>
      <div class="header-box-3 text-right d-flex align-items-center">
        <div class="icon-box d-flex align-items-center mr-3 mr-md-5">
          <a href="/cart" class="text-light"><i class="fa fa-shopping-cart"></i><span class="badge badge-danger badge-sm">{{App\Models\OrderItem::where('sid', session_id())->sum('qty')}}</span></a>
          
        </div>
        @guest
        <a href="/login" class="btn btn-light">LOGIN</a>
        @else
        <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            PROFILE
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/profile">{{Auth::user()->name}}</a>
            <a class="dropdown-item" href="/save-later">Save Products</a>
            <a class="dropdown-item" href="/home">Orders</a>
            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
        @endguest
      </div>
    </div>

    <div class="search-box-small p-2">
      <form action="/search" method="get" class="search-form d-flex align-items-center">
        <input type="text" name="search" id="search" class="form-control header-search">
        <button type="submit" class="btn btn-warning btn-sm p-1"><i class="fa fa-search"></i></button>     
      </form>
    </div>
  </header>

  <div class="sidebar bg-light position-absolute shadow shadow-lg">
    <ul class="side-nav"> 
      <li class="side-nav-item"><a class="text-dark" href="/">Home</a></li>
      @guest
      <li class="side-nav-item"><a class="text-dark" href="/login">Login</a></li>
      @endguest
      <li class="side-nav-item"><a class="text-dark" href="/product-campaign">Campaign</a></li>
      <li class="side-nav-item"><a class="text-dark" href="/product-offer">Discount</a></li>
      @foreach(App\Models\Category::all() as $category)

      <li class="side-nav-item"><a class="text-dark" href="/category/{{$category->id}}">{{$category->title}}</a></li>
      @endforeach
    </ul>
  </div>

  @yield('content')

  <div class="mobile-bottom-box d-block d-md-none">
    <div class="row">
      <div class="col-3 text-center"><a href="/" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-home"></i></h5> <small>Home</small></a></div>
      <div class="col-3 text-center bg-danger"><a href="/cart" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-shopping-cart"></i></h5> <small>Cart</small></a></div>
      @guest
      <div class="col-3 text-center"><a href="/login" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-user-o"></i></h5> <small>Login</small></a></div>
      <div class="col-3 text-center"><a href="/review" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-comment"></i></h5> <small>Review</small></a></div>
      @else
      <div class="col-3 text-center"><a href="/profile" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-user-o"></i></h5> <small>Profile</small></a></div>
      <div class="col-3 text-center"><a href="/home" class="text-white"><h5 class="mb-0 pb-0 mt-1"><i class="fa fa-comment"></i></h5> <small>Order</small></a></div>
      @endguest
      
    </div>
  </div>

  <footer class="text-light pt-5 pb-4">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-3 mb-4">
          <h1 class="text-tartiary-skyblue">{{$setting->title}}</h1>

          <p class="lead">This is an ecommerce website to sell everything</p>

          <p class="mb-1">Phone: {{$setting->phone}}</p>
          <p class="mb-1">Email: {{$setting->email}}</p>
          
        </div>
        <div class="col-md-2 mb-3">
          <h4 class="border-bottom border-success text-tartiary-skyblue">Company</h4>
          <a href="/track-order" class="nav-link text-light pl-0 pb-0">Track Order</a>
          <a href="/seller/login" class="nav-link text-light pl-0 pb-0">Seller Registration</a>
        </div>
        <div class="col-md-2 mb-3">
          <h4 class="border-bottom border-success text-tartiary-skyblue">Legal</h4>
          <a href="/page/privacy" class="nav-link text-light pl-0 pb-0">Privacy Policy</a>
          <a href="/page/terms" class="nav-link text-light pl-0 pb-0">Terms & Conditions</a>
          <a href="/page/return" class="nav-link text-light pl-0 pb-0">Return Policy</a>
        </div>
        <div class="col-md-2 mb-3">
          <h4 class="border-bottom border-success text-tartiary-skyblue">Customer Care</h4>
          <a href="/page/terms" class="nav-link text-light pl-0 pb-0">Terms & Conditions</a>
          <a href="/page/return" class="nav-link text-light pl-0 pb-0">Return & Refund</a>
          

          
        </div>
        <div class="col-md-3 mb-6">
          <h4 class="border-bottom border-success text-tartiary-skyblue">Follow Us</h4>
          <a href="{{$setting->facebook}}" class="social-link"><i class="fa fa-facebook"></i></a>
          <a href="{{$setting->twitter}}" class="social-link"><i class="fa fa-twitter"></i></a>
          <a href="{{$setting->instagram}}" class="social-link"><i class="fa fa-instagram"></i></a>
          <a href="{{$setting->youtube}}" class="social-link"><i class="fa fa-youtube"></i></a>
          <div class="card bg-dark p-4 mt-4">
            

            <h3 class="text-tartiary-skyblue">Download Our App</h3>
            <div class="row flex align-items-center justify-content-between">
              <div class="col-8">
                <img src="/image/android.png" alt="" width="100%" class="pr-4">
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="">
        <p class="my-3">{{$setting->title}} &copy; All Right Reserved | Powerd By Bloop Web Solution</p>
      </div>
    </div>
  </footer>

  <a href="https://wa.me/+8801712943837" target="_blank" class="wa-style">
    <img src="/image/whatsapp.png" alt="whats app image" width="100%">
  </a>

  <script src="/js/app.js"></script>

  <!-- toaster -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>

    const menuButton = document.getElementById('menu-button');
    const sidebar = document.querySelector('.sidebar');
    
    let showBar = 0;
    menuButton.addEventListener('click', function() {
      //console.log(123);
      if(showBar == 1){
        sidebar.style.display = 'none';
        showBar = 0;
        console.log(showBar);
      }else{
        sidebar.style.display = 'block';
        showBar = 1;
        console.log(showBar);
      }
      
    
    });

  </script>

  @if(Session::has('message'))
  <script>
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
      toastr.success("{{ session('message') }}");
  </script>
  @endif

  @if(Session::has('error'))
  <script>
      toastr.options =
      {
        "closeButton" : true,
        "progressBar" : true
      }
      toastr.error("{{ session('error') }}");
  </script>
  @endif

</body>
</html>
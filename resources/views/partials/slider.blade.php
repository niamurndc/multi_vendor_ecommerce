

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($sliders as $slider)
    @if($loop->first)
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    @else
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    @endif
    @endforeach
  </ol>
  
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    @if($loop->first)
    <div class="carousel-item active">
      <img src="/uploads/slider/{{$slider->image}}" class="d-block w-100" alt="...">
    </div>
    @else
    <div class="carousel-item">
      <img src="/uploads/slider/{{$slider->image}}" class="d-block w-100" alt="...">
    </div>
    @endif
    @endforeach
  </div>
  
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
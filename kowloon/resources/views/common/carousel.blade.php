<a href="/home"><img src="/img/logo_big.png" class="carousel-logo"></a>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach ($carousel as $key => $image)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach ($carousel as $key => $image)
        <div class="item {{$key == 0 ? 'active' : ''}}">
            <img src="/img/{{$image->image_url}}">
        </div>
    @endforeach
  </div>
</div>
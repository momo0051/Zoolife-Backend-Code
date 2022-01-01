<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
  
</head>
<body>

<div class="container">
  <h2>Carousel Example</h2>  
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
      <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
        
        <img class="d-block w-100" src="{{ asset('/uploads/slider/' . $slider->image) }}" alt="First slide" style="height: 400px;">
      </div>
      @endforeach
            
            
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<script src="{{ asset('theme/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
<script type="text/javascript">
  $('.carousel').carousel()
</script>

</body>
</html>

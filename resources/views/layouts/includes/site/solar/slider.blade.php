@if (!$sliders->isEmpty())
  <!-- Hero section  -->
  <section class="hero-section">
    <div class="hero-slider owl-carousel">
       @foreach($sliders as $slider)
      <div class="hero-item set-bg" data-setbg="{{ asset('/uploads/slider/' . $slider->image) }}">
        <div class="container">
          <div class="row">
            <div class="col-xl-8">
              <!-- <h2><span>{{$slider->title}}</span></h2>
               <p>{{$slider->description}}</p> -->
             <!--  <a href="#" class="site-btn sb-white mr-4 mb-3">Read More</a>
              <a href="#" class="site-btn sb-dark">our Services</a> -->
            </div>
          </div>
        </div>
      </div>
     @endforeach   
    </div>
  </section>

@endif
  


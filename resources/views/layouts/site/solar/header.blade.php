<?php
$route = Route::current();
$currentRouteName = \Route::currentRouteName();
$action = Route::currentRouteAction();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>The Solar Sale System</title>
  <meta charset="UTF-8">
  <meta name="description" content="Industry.INC HTML Template">
  <meta name="keywords" content="industry, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon --> 
  <link href="img/favicon.ico" rel="shortcut icon"/>

  

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('solar/css/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('solar/css/font-awesome.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('solar/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('solar/css/slicknav.min.css') }}">
  <link rel="stylesheet" href="{{ asset('solar/css/owl.carousel.min.css') }}">
  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{ asset('solar/css/style.css') }}">


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
        @font-face {
            font-family: 'Vollkorn-Bold'; 
            src: url({{ asset('solar/fonts/TTF/Vollkorn-Bold.ttf') }});
            font-weight: 400; 
            font-style: normal; 
         }        
</style>

  @if(in_array($currentRouteName, ['home']))
<style type="text/css">
  .owl-nav {
    display: none;
}
.services-warp::before{
  background: #17172d !important;
}

.feature-box iframe {
    width: 100%;
}

    @media screen and (min-width: 800px) {
    section.page-top-section.set-bg {
    height: 800px;
}
}

</style>
  @endif

</head>
<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header section  -->
  <header class="header-section clearfix">  
    <div class="site-navbar">
      <!-- Logo -->
      <a href="{{route('home')}}" class="site-logo">
        <img src="{{ asset('logo.png') }}" alt="" style="width: 150px; height: auto;">
      </a>
      <div class="header-right">
        <div class="header-info-box">
          <div class="hib-icon">
            <img src="{{ asset('solar/img/icons/phone.png') }}" alt="" class="">
          </div>
          <div class="hib-text">
            <h6 style="font-size:16px;">{!! (new \App\Helpers\HeaderHelper)->getHeaderContactNo() !!}</h6>
            <p>{!! (new \App\Helpers\HeaderHelper)->getHeaderEmail() !!}</p>
          </div>
        </div>
        <div class="header-info-box">
          <div class="hib-icon">
            <img src="{{ asset('solar/img/icons/map-marker.png') }}" alt="" class="">
          </div>
          <div class="hib-text">
            <h6>{!! (new \App\Helpers\HeaderHelper)->getHeaderWebAddress() !!}</h6>
            <p style="color: #ffffff;">{!! (new \App\Helpers\HeaderHelper)->getHeaderWebAddress() !!}</p>
          </div>
        </div>
        <!-- <button class="search-switch"><i class="fa fa-search"></i></button> -->
      </div>
      <!-- Menu -->
      <nav class="site-nav-menu">
        <ul>
          <li class="{{ request()->is('/') ? 'active' : ''  }}"><a href="{{route('home')}}">Home</a></li>
          <li class="{{ request()->is('about-us') ? 'active' : ''  }}"><a href="{{route('aboutus')}}">About us</a></li>
          <!-- <li><a href="solutions.html">Solutions</a>
            <ul class="sub-menu">
              <li><a href="elements.html">Elements</a></li>
            </ul>
          </li>
          <li><a href="blog.html">Blog</a></li> -->
          <li class="{{ request()->is('contact') ? 'active' : ''  }}"><a href="{{route('contact')}}">Contact</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <!-- Header section end  -->
  <main class="py-4">
      @yield('content')
    </main>


  <!-- Footer section -->
  <footer class="footer-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="footer-widget about-widget">
            <h2 class="fw-title">Solar Sales Team</h2>
            <p>  {!! (new \App\Helpers\FooterHelper)->getFooterRightContent() !!}</p>
            
          </div>
        </div>
        <!-- <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h2 class="fw-title">Useful Resources</h2>
            <ul>
              <li><a href="">Jobs Vacancies</a></li>
              <li><a href="">Client Testimonials</a></li>
              <li><a href="">Green  Energy</a></li>
              <li><a href="">Chemical Research</a></li>
              <li><a href="">Oil Extractions</a></li>
              <li><a href="">About our Work</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer-widget">
            <h2 class="fw-title">Our Solutions</h2>
            <ul>
              <li><a href="">Metal Industry</a></li>
              <li><a href="">Agricultural Engineering</a></li>
              <li><a href="">Green  Energy</a></li>
              <li><a href="">Chemical Research</a></li>
              <li><a href="">Oil Extractions</a></li>
              <li><a href="">Manufactoring</a></li>
            </ul>
          </div>
        </div> -->
        <div class="col-lg-3 col-md-6 col-sm-7">
          <div class="footer-widget">
            <h2 class="fw-title">Contact Us</h2>
            {!! (new \App\Helpers\FooterHelper)->getFooterLeftContent() !!}
            
          </div>
        </div>
      </div>
    </div>
    <div class="footer-buttom">
      <div class="container">
      <div class="row">
        <div class="col-lg-4 order-2 order-lg-1 p-0">
          <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
        </div>
        <div class="col-lg-7 order-1 order-lg-2 p-0">
          <ul class="footer-menu">
            <li class="active"><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('aboutus')}}">About us</a></li>            
            <li><a href="{{route('contact')}}">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- Footer section end -->

  <!-- Search model -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  <!-- Search model end -->
  
  <!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('solar/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('solar/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('solar/js/jquery.slicknav.min.js') }}"></script>
  <script src="{{ asset('solar/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('solar/js/circle-progress.min.js') }}"></script>
  <script src="{{ asset('solar/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('solar/js/main.js') }}"></script>

  </body>
</html>

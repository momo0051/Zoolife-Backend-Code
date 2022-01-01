<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    
    <title>Smarqtech</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="{{ asset('theme/css/app.css') }}" rel="stylesheet">-->
    
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/panorama_viewer.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    
    
    <header class="">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="javascript:void(0)">
              <img src="{{ asset('/site/logo3.png') }}" class="img-fluid" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="lnr lnr-menu"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-auto">
                  
                  <li class="nav-item">
                    <a class="nav-link " href="{{route('home')}}">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{route('aboutus')}}">About us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{route('gallery')}}">Gallery</a>
                  </li>


                  
              
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                      @foreach ($menus as $service)
                      <li class="dropdown-item" href="#"><a target="_blank" href="{{route('services.detail',$service->slug)}}">{{$service->name}}</a></li>
                      @endforeach
                     <!--  <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                          <li class="dropdown-item" href="#"><a>Action 1.1</a></li>
                          <li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1.1</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">
                              <li class="dropdown-item" href="#"><a>Action 1.1.1</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li> -->
                    </ul>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link " href="{{route('contact')}}">Contact</a>
                  </li>

                  
                </ul>
                
              </div>
            </nav>
            
          </div>
        </div>
      </div>
    </header>
    
    <main class="py-4">
      @yield('content')
    </main>
    <!-- /.content-wrapper -->
    <footer class="overview-block-pt">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-5 col-lg-8">
            <div class="about-info">            
              
              <h3>Smarqtech</h3>
              
              {!! (new \App\Helpers\FooterHelper)->getFooterRightContent() !!}
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 re-9-mt-40">
            <div class="footer-list">
              <h5 class="iq-fw-4">Get to Know Us</h5>
              <ul>
                <li><a href="http://localhost/laravel/test/public/about-us">About us</a></li>
                <li><a href="http://localhost/laravel/test/public/gallery">Gallery</a></li>
                <li><a href="http://localhost/laravel/test/public/services">Services</a></li>
                <li><a href="http://localhost/laravel/test/public/contact">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 re-mt-40">
            <div class="footer-from">
              <h5 class="iq-fw-4">Contact Us</h5>
              {!! (new \App\Helpers\FooterHelper)->getFooterLeftContent() !!}
               
            </div>
          </div>
          <hr class="iq-mt-60">
          <div class="col-sm-12 text-center">
            <div class="footer-copyright iq-pt-20 iq-pb-20">© Copyright 2020 IOT Developed by <a target="_blank" href="#">Smarqtech.com</a>.</div>
          </div>
        </div>
      </div>
    </footer>
    <div id="back-to-top">
      <a class="top" id="top" href="#top"> <i class="lnr lnr-chevron-up"></i> </a>
    </div>
    
    <!-- Scripts -->
    
    <script src="{{ asset('theme/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('theme/js/popper.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.scrollme.min.js') }}"></script>
    <script src="{{ asset('theme/js/wow.min.js') }}"></script>
    <script src="{{ asset('theme/js/index.js') }}"></script>
    <script src="{{ asset('theme/js/before.js') }}"></script>
    <script src="{{ asset('theme/js/modernizr.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('theme/js/averon.js') }}"></script>
    <script src="{{ asset('theme/js/fullpage.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.panorama_viewer.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('theme/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('theme/js/revolution.extension.video.min.js') }}"></script>
    
    <script src="{{ asset('theme/js/rev-custom.js') }}"></script>
    <script src="{{ asset('theme/js/custom.js') }}"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
    $('.navbar .dropdown-item').on('click', function (e) {
    var $el = $(this).children('.dropdown-toggle');
    var $parent = $el.offsetParent(".dropdown-menu");
    $(this).parent("li").toggleClass('open');
    if (!$parent.parent().hasClass('navbar-nav')) {
    if ($parent.hasClass('show')) {
    $parent.removeClass('show');
    $el.next().removeClass('show');
    $el.next().css({"top": -999, "left": -999});
    } else {
    $parent.parent().find('.show').removeClass('show');
    $parent.addClass('show');
    $el.next().addClass('show');
    $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
    }
    e.preventDefault();
    e.stopPropagation();
    }
    });
    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
    $(this).find('li.dropdown').removeClass('show open');
    $(this).find('ul.dropdown-menu').removeClass('show open');
    });
    });
    </script>
  </body>
</html>
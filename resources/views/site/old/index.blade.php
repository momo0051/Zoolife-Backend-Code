@extends('layouts.site.header')
@section('content')
<div id="overview" style="margin-top: 40px;">

 @include('layouts.includes.site.slider')
<section class="overview-block-pt" id="shop">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>IOT Devices And Products</h2>
                <p>Smart Internet of Things  Based Systems </p>
            </div>
        </div>
        <div class="row iq-mt-20">
            <div class="col-sm-12">
                <div class="owl-carousel" data-items="5" data-items-laptop="3" data-items-tab="2" data-items-mobile="1"
                    data-items-mobile-sm="1" data-margin="30" data-autoplay="true" data-loop="true" data-nav="false"
                    data-dots="true">
                    @foreach($products as $product)
                    <div class="item">
                        <div class="product-home">
                            <img src="{{ asset('/uploads/products/' . $product->image) }}" class="img-fluid" alt="">
                            <h6><a href="#">{{ $product->name }}</a></h6>
                            <p></p>                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overview-block-pt" id="works">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('/uploads/home_page_cms/' . $homeCMS->image_one) }}" class="img-fluid wow fadeInLeft" alt="">
            </div>
            <div class="col-lg-6 iq-pl-30 align-self-center">
                @if($homeCMS)
                <div class="re-9-mt-40 re-9-mb-40">
                    <h3>{{$homeCMS->title}}</h3>
                    <p class="iq-mt-30">{{$homeCMS->description}}</p>
                    <a href="http://localhost/laravel/test/public/gallery" class="home-btn">Explore More Products</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="overview-block-ptb iq-bannerr"
    style="background: url(theme/images/bg/20.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container-fluid">
        <div class="banner-text">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="text-white iq-fw-4">IOT Security System.</h1>
                    <p class="text-white iq-mb-40">Motion sensor IOT cameras </p>
                    <a href="http://localhost/laravel/test/public/gallery" class="btn-buy iq-mt-40">Explore All Smart Camera</a>
                </div>
                <div class="col-sm-6">
                    <img class="bannerr-img" src="theme/images/device/17.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overview-block-ptb">
    <div class="container-fluid">
        <div class="row flex-row-reverse">
            <div class="col-lg-6">
                <img src="theme/images/set-up/23.png" class="img-fluid wow fadeInLeft" alt="">
            </div>
            <div class="col-lg-6 iq-pl-30 align-self-center">
                <div class="re-9-mt-40">
                    <h3>Smart Home LifeStyle...</h3>
                    <p class="iq-mt-30">Hyperhome creates the ultimate lifestyle of comfort and convenience throughout your entire home with automation and smart home technology. Reduce the need to walk from room to room to adjust shades, lights, temperature, and enjoy music and video in any room you want it to be. It can be possible from an easy-to-use touch screen, remote, customized keypad or mobile device and the total smart control of your entire house is always at your fingertips. </p>
                    <a href="http://localhost/laravel/test/public/gallery" class="home-btn">Explore More Products</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overview-block-ptb parallax" style="background: url(theme/images/set-up/15.png); ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 iq-pl-30 align-self-center">
                <h3 class="text-white">IOT Smart Building</h3>
                <a href="http://localhost/laravel/test/public/gallery" class="btn-buy iq-mt-40 w--current">Explore More Products</a>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="overview-block-ptb">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="item-effect">
                    @foreach($galleries as $gallery)
                    <div class="item">
                        <div class="item-image">
                            <img src="{{ asset('/uploads/gallery/' . $gallery->main_image) }}" alt="" />
                        </div>
                        <div class="item-text">
                            <div class="item-text-wrapper">
                                <h3 class="text-white">{{$gallery->title}}</h3>
                                <p>{{$gallery->description}}</p>
                            </div>
                        </div>
                        <a class="item-link" href="#"></a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="set-up overview-block-ptb">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>BENEFITS OF A SMART HOME </h2>
                <p></p>
            </div>
        </div>
        <div class="row iq-mt-40">
            <div class="col-lg-3 col-sm-12">
                <div class="set-up-box text-center">
                    <div class="step-img"><img alt="#" src="theme/images/set-up/saving.png" style="width: 100%;
                        height: 190px;">
                    </div>
                    <h4 class="iq-mt-20 iq-mb-10">Savings</h4>
                    <p>Connected devices such as learning thermostats, smart sprinklers, Wi-Fi enabled lights, electricity monitoring outlets and water heater modules which can be reduce the power consumption and energy. </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="set-up-box text-center">
                    <div class="step-img"><img alt="#" src="theme/images/set-up/lock.png" style="width: 100%;
                        height: 190px;">
                    </div>
                    <h4 class="iq-mt-20 iq-mb-10">Security </h4>
                    <p>There are many simple, connected security solutions for the smart home that are inexpensive alternatives to 24/7 monitored security systems. Wi-Fienabled cameras, connected motion sensors and smart smoke alarms can be monitored from inside or outside a home via live video feed, email and text alerts.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="set-up-box text-center">
                    <div class="step-img"><img alt="#" src="theme/images/set-up/safety.png" style="width: 100%;
                        height: 190px;">
                    </div>
                    <h4 class="iq-mt-20 iq-mb-10">Safety </h4>
                    <p>Smart sensors that can detect water leaks, humidity levels, carbon monoxide, motion, heat and every environmental concern imaginable help prevent accidents from turning into disasters because they can communicate with you directly, wherever you are. </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="set-up-box text-center">
                    <div class="step-img"><img alt="#" src="theme/images/set-up/control.png" style="width: 100%;
                        height: 190px;">
                    </div>
                    <h4 class="iq-mt-20 iq-mb-10">Control </h4>
                    <p>Many things inside the home, from ovens and fridges to deadbolts and garage doors, can be controlled remotely via apps on smart phones and tablets. In most cases, this control also works when you are out of the home, meaning you can close the garage door from the airport, confirm that you switched off your stove from the grocery store.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="contact-us" class="iq-our-from gray-bg overview-block-pt">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 text-center">
                <h2>Get in Touch</h2>
                <p></p>
            </div>
        </div>
        <div class="row iq-mt-50">
            <div class="col-lg-8 col-sm-12">
                <div class="iq-map">
                    
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=A-7-3%20Pinnacle%20Pj%2C%20Jalan%2051A%2F223%2C%20PJS%2052%2C%2046100%20Petaling%20Jaya%20Selangor%2CMalaysia&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://www.embedgooglemap.net/blog/elementor-review/">design</a>
                    
                    
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
               <form  role="form" method="POST" action="{{route('contact.sendemail')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <div class="contact-form">
                        <div class="section-field iq-mt-10">
                            <input class="require" id="contact_name" type="text" placeholder="Name*" name="name">
                        </div>
                        <div class="section-field iq-mt-10">
                            <input class="require" id="contact_email" type="email" placeholder="Email*" name="email">
                        </div>
                        <div class="section-field iq-mt-10">
                            <input class="require" id="contact_phone" type="text" placeholder="Phone*" name="phone">
                        </div>
                        <div class="section-field textarea iq-mt-10">
                            <textarea id="contact_message" class="input-message require" placeholder="Comment*" rows="5"
                            name="message"></textarea>
                        </div>
                        <button id="submit" name="submit" type="submit" value="Send"
                        class="button pull-right iq-mt-20">Send
                    Message</button>
                    <p role="alert"></p>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
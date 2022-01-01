@extends('layouts.site.solar.header')
@section('content')

    <section class="page-top-section set-bg" data-setbg="{{ asset('solar/img/solar-power.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                  
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Page top section end  -->

    <!-- Map section  -->
    <div class="map-section">
        <div class="container">
            <div class="map-info" style="background: #17172d">
                <img src="{{ asset('logo.png') }}" alt="" style="height: 150px;">
                
            </div>
        </div>
        <div class="map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d112723.3958260407!2d153.3713794!3d-28.0059447!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b911ab1069e2905%3A0x7ac7a6ec259a0ba5!2s153%20Cotlew%20St%2C%20Ashmore%20QLD%204214%2C%20Australia!5e0!3m2!1sen!2sin!4v1602834744051!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- Map section end  -->

    <!-- Contact section   -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>{{$contactUs->title}}</h2>
                        <p style="color: #000;">{{$contactUs->description}}</p>
                        <div class="header-info-box">
                            <div class="hib-icon">
                                <img src="{{ asset('solar/img/icons/phone.png') }}" alt="" class="">
                            </div>
                            <div class="hib-text">
                                <h6 style="color: #000;">{{$contactUs->contact_no}}</h6>
                                <p style="color: #000;">{{$contactUs->email}}</p>
                            </div>
                        </div>
                        <div class="header-info-box">
                            <div class="hib-icon">
                                <img src="{{ asset('solar/img/icons/map-marker.png') }}" alt="" class="">
                            </div>
                            <div class="hib-text">
                                
                                <p  style="color: #000;">{{$contactUs->web_address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                 <form class="contact-form" role="form" method="POST" action="{{route('contact.sendemail')}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Name" name="name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" placeholder="Your Email" name="email">
                            </div>
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-12">
                                <input type="text" placeholder="Subject" name="subject">
                                <textarea class="text-msg" placeholder="Message" name="message"></textarea>
                                <button  name="submit" type="submit" class="site-btn" >send message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section end  -->

  

        @endsection

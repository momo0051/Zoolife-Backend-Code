
@extends('layouts.site.solar.header')
@section('content')
    <!-- Page top section  -->
    <section class="page-top-section set-bg" data-setbg="{{ asset('solar/img/solar-power.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                  
                </div>
            </div>
        </div>
    </section>
    <!-- Page top section end  -->


    <!-- About section -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image) }}" alt="">
                </div>
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>{{$aboutUsCMS->title}}</h2>
                        <p style="color: #000; font-size:19px;">{!! $aboutUsCMS->description !!}</p>
                        <!-- <div class="about-sign">
                            <div class="sign">
                                <img src="{{ asset('solar/img/sign.png') }}" alt="">
                            </div>
                            <div class="sign-info">
                                <h5>Michael Smith</h5>
                                <span>CEO Industrial INC</span>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section end -->

    <!-- Milestones section -->
    <section class="milestones-section set-bg" data-setbg="{{ asset('solar/img/milestones-bg.jpg') }}">
       <!--  <div class="container text-white">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="milestone">
                        <div class="milestone-icon">
                            <img src="{{ asset('solar/img/icons/plug.png') }}" alt="">
                        </div>
                        <div class="milestone-text">
                            <span>Clients</span>
                            <h2>725</h2>
                            <p>Nam ornare ipsum </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="milestone">
                        <div class="milestone-icon">
                            <img src="{{ asset('solar/img/icons/light.png') }}" alt="">
                        </div>
                        <div class="milestone-text">
                            <span>Growth</span>
                            <h2>45%</h2>
                            <p>Nam ornare ipsum </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="milestone">
                        <div class="milestone-icon">
                            <img src="{{ asset('solar/img/icons/traffic-cone.png') }}" alt="">
                        </div>
                        <div class="milestone-text">
                            <span>Projects</span>
                            <h2>59</h2>
                            <p>Nam ornare ipsum </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="milestone">
                        <div class="milestone-icon">
                            <img src="{{ asset('solar/img/icons/worker.png') }}" alt="">
                        </div>
                        <div class="milestone-text">
                            <span>Emploees</span>
                            <h2>138</h2>
                            <p>Nam ornare ipsum </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- Milestones section end -->

    <!-- Team section -->
    <section class="team-section spad" style="display: none">
        <div class="container">
            <div class="team-text">
                <h2>Our Amazing Team</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est.</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_one) }}" alt="">
                        <div class="member-info">
                            <h3>{{$aboutUsCMS->name_one}}</h3>
                            <p>{{$aboutUsCMS->designation_one}}</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_two) }}" alt="">
                        <div class="member-info">
                            <h3>{{$aboutUsCMS->name_two}}</h3>
                            <p>{{$aboutUsCMS->designation_two}} </p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_three) }}" alt="">
                        <div class="member-info">
                            <h3>{{$aboutUsCMS->name_three}}</h3>
                            <p>{{$aboutUsCMS->designation_three}}</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team section end -->

    

@endsection
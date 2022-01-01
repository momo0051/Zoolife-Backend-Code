@extends('layouts.site.header')
@section('content')
            <section class="overview-block-ptb iq-bannerr"
                style="background: url({{ asset('/uploads/services/' . $services->banner_image) }}); background-repeat: no-repeat; background-size: cover;">
                <div class="container-fluid">
                    <div class="banner-text">
                        <div class="row">
                            <div class="col-sm-6">
                                <h1 class="text-white iq-fw-4">{{$services->banner_heading}}</h1>
                                <p class="text-white iq-mb-40">{{$services->banner_description}} </p>
                                <a href="#relatedProduct" class="btn-buy iq-mt-40">Explore All Products</a>
                            </div>
                            <div class="col-sm-6">
                                <img class="bannerr-img" src="theme/images/device/17.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overview-block-pt" id="works">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2>{{$services->name}}</h2>
                            <p>{{$services->description}}</p>
                        </div>
                    </div>

                </div>

            </section>
               
                 
                <section class="overview-block-pt" id="">
                    <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->images_one) }}"  alt="" >
                        </div>
                         <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->images_two) }}" >
                        </div>
                    </div>
                </div>
                </section>
                
            

             <section class="overview-block-pt" id="works">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2>{{$services->heading}}</h2>
                            <p>{{$services->service_details}}</p>
                        </div>
                    </div>

                </div>

            </section>

             <section class="overview-block-pt" id="">
                    <div class="container-fluid">
                    <div class="row ">
                        <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->images_three) }}"  alt="" >
                        </div>
                         <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->images_four) }}" >
                        </div>
                    </div>
                </div>
                </section>

            <section class="overview-block-ptb">
                <div class="container-fluid">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->image_three) }}" class="img-fluid center-block" alt="" >
                        </div>
                         <div class="col-lg-6">
                            <img width="100%" height="500px" src="{{ asset('/uploads/services/' . $services->image_four) }}" class="img-fluid center-block" alt="" >
                        </div>
                    </div>
                </div>
            </section>
                
                @if(!empty($products))
                <div class="iq-our-clients overview-block-pb" id="relatedProduct">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 text-center">
                                <h2>Related Products</h2>
                                <p>Simply dummy text ever sincehar the 1500s, when an unknownshil printer took a
                                    galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries.</p>
                            </div>
                        </div>
                        <div class="row iq-mt-50">
                            <div class="col-lg-12 col-md-12">
                                <div class="owl-carousel" data-items="6" data-items-laptop="5" data-items-tab="4" data-items-mobile="2"
                                    data-items-mobile-sm="1" data-margin="30" data-autoplay="true" data-loop="true" data-nav="false"
                                    data-dots="true">
                                    @foreach($products as $product)
                                    <div class="item">
                                     <img class="img-fluid center-block" src="{{ asset('/uploads/services/products/' . $product['image']) }}" alt="#">
                                      <h6><a href="#">{{ $product['name'] }}</a></h6>
                                 </div>
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endsection
@extends('layouts.site.header')
@section('content')
            <div class="clearfix"></div>
            <section class="overview-block-ptb">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2></h2>
                            <p>IoT make to turns the automated home into the smart home. With a combination of sensors, smarts and systems, IoT connects every objects to a network, enabling those objects to complete tasks and communicate with each other, with no user input.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="item-effect">
                                @foreach($galleries as $gallery)
                                <div class="item">
                                    <div class="item-image">
                                        <img style ="height: 330px;"  alt="#" src="{{ asset('/uploads/gallery/' . $gallery->main_image) }}" class="img-fluid">
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
        @endsection
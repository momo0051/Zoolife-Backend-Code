
@extends('layouts.site.header')
@section('content')
            <section class="overview-block-pt" id="works">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2>SERVICES</h2>
                            <p>Simply dummy text ever sincehar the 1500s, when an unknownshil printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries.</p>
                        </div>
                    </div>
                    <div class="row iq-mt-40 m-2">
                        @foreach($services as $service)
                        <div class="col-lg-4 col-sm-12 p-2" style="border: solid;">
                            <a href="{{route('services.detail',$service->slug)}}" target="_blank">
                                <div class="set-up-box text-center">
                                    <div class="step-img">
                                        <img style="width:500px; height:300px"   alt="#" src="{{ asset('/uploads/services/' . $service->main_image) }}" class="img-fluid">
                                    </div>
                                    <h4 class="iq-mt-20 iq-mb-10">{{$service->name}}</h4>
                                    <p>{{ Str::limit($service->description, 200) }}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                      
                    </div>
                </div>
            </section>
        @endsection
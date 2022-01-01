
@extends('layouts.site.header')
@section('content')
<section class="overview-block-pt" id="works">
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2>{{$aboutUsCMS->title}}</h2>
                <p>{{$aboutUsCMS->description}}</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                
                <img class="img-fluid center-block" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_one) }}" alt="#">
            </div>
            <div class="col-lg-6">
                
                <p class="iq-mt-30">{{$aboutUsCMS->details_one}}</p>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-6 iq-pl-30 align-self-center">
                <div class="re-9-mt-40 re-9-mb-40">
                    
                    <p class="iq-mt-30">{{$aboutUsCMS->details_two}}</p>
                    
                </div>
            </div>
            <div class="col-lg-6">
                
                <img class="img-fluid center-block" src="{{ asset('/uploads/aboutus_cms/' . $aboutUsCMS->image_two) }}" alt="#">
            </div>
        </div>
        <div class="row">
            
            
            
        </div>
        
    </div>
</section>
@endsection
@extends('layouts.site.header')
@section('content')
            <div id="contact-us" class="iq-our-from gray-bg overview-block-pt">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 text-center">
                <h2>{{$contactUs->title}}</h2>
                <p>{{$contactUs->description}}</p>
            </div>
        </div>
        <div class="row iq-mt-50">
            <div class="col-lg-8 col-sm-12">
                <div class="iq-map">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.840108181602!2d144.95373631539215!3d-37.8172139797516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2sin!4v1497005461921"></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                @if(@count($errors) > 0)
               <div class="alert alert-danger">
                   <button type="button" class="close" data-dismiss="alert">x</button>
                   <ul>
                       @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
                @endif
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

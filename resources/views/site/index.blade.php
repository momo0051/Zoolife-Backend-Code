@extends('layouts.site.solar.header')
@section('content')
@include('layouts.includes.site.solar.slider')
<section class="page-top-section set-bg" data-setbg="{{ asset('solar/img/home.jpg') }}" style="background-image: url({{ asset('solar/img/home.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                  
                </div>
            </div>
        </div>
    </section>
<!-- Services section  -->
<section class="services-section" style="display: block; ">
  <div class="services-warp" >
    <div class="container">
      <div class="service-text">
        <div class="row">
         <div class="col-lg-12">
            <h2 style="color: #fff;">{{$homeCMS->title_one}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <p  style="color: #fff; font-size:20px;"> {{$homeCMS->description_one}}</p>
          </div>
        </div>
      </div>
     </div>
  </div>
</section>
<!-- Services section end  -->
<!-- Features section   -->
<section class="features-section spad set-bg" data-setbg="{{ asset('solar/img/features-bg.jpg') }}">
  <div class="container">
    <div class="row">
      
      @foreach($videos as $video)
      
      <div class="col-lg-4 col-md-6">
        <div class="feature-box">
          {!!$video->link!!}
          <div class="fb-text">
            <h5 class="text-center"> {{$video->title}}</h5>
           <!--  <p>{{$video->description}}</p> -->
            
          </div>
        </div>
      </div>
      
      @endforeach
      
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="tab-content reserch-tab">
          <!-- single tab content -->
          <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
            <h2 style=" color: #000; font-size:40px;">HOW IT WORKS</h2>
            <p style="color: #000;  font-size:20px;">The Solar Sales Team provide both expert telemarketing and sales closing services in the solar industry. You forward the leads generated from your internal / external marketing campaigns (Google, Social Media, TV etc). TSST will contact your warm leads, setup appointments (face to face, via phone or web meeting) and close sales. (Note TSST can also provide marketing and lead generation services if required) Once the sale is closed, it will be forwarded to your administration team for processing.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<section class="reserch-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="tab-content reserch-tab">
          <!-- single tab content -->
          <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
            <h2 style="font-size:40px;">GRANT MUSAPHIA</h2>
            <p style="color: #fff;  font-size:20px;">Grant has extensive experience in the renewables industry. He has done contract work
                     for a number of companies including:</p>
          <ul style="color: #fff;  font-size:20px;">
            <li>EBM Solar</li>
            <li>Evergen</li>
            <li>Supreme Solar</li>
            <li>The Solar Service Guys</li>
            <li>Goodhew Electrical and Solar</li>
          </ul>
          </br>
          <p style="color: #fff;  font-size:20px; line-height: 21px;">
            Having worked alongside electricians for the past four years, Grant’s skillset in the solar
            industry is extensive. With a thorough understanding of the solar industry, from sales
            through admin, Grant’s experience includes:
          </p>
          <ul style="color: #fff;  font-size:20px;">
            <li>Solar sales – Residential and Commercial in multiple states On Grid and off Grid solar
            design and sales</li>
            <li>Implementing a Sales and Marketing divisions.</li>
            <li>Managing BDM’s and internal Call Centre staff to acquire leads to close solar
            solutions for new clients.</li>
            <li>Managing internal administration teams to improve efficiency between installers /
            CRM / Scheduling.</li>
            <li>Contracting and managing experienced Installers / Electricians in all states. Training
            solar sales reps on closing techniques.</li>
            <li>Assisting in closing Residential and Commercial sales.</li>
            <li>Consulting with Call Centres to train and mentor telesales staff to greatly improve
            efficiency and sales closure in the solar industry.</li>
          </ul>
        </div>
      </div>
    </div>
    
  </div>
</div>
</section>
<section class="clients-section spad">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="tab-content reserch-tab">
        <!-- single tab content -->
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
          <h2 style="color: #000;  font-size:40px;">Further experience includes</h2>
   
          <ul style="color: #000;  font-size:20px;">
            <li>Contracting Lead Generators who specialize in social media and Google lead
            generation.</li>
            <li>Implementing customized CRMs specifically tailored to the solar industry –
            Salesforce.</li>
            <li>Training Sales and Administration teams on Salesforce processes.</li>
            <li>Sourcing and developing high-level partnerships with Electricity Retailers /
              Commercial Solar Installers / Fortune 500 /Solar Farms to perform O&M and manage
            renewable assets.</li>
            <li>Sourced and developed partnerships with renewable monitoring specialists to
            cross-pollinate products.</li>
            <li>Training internal sales staff on upselling.</li>
            <li>Designing Solar and Battery systems (Tesla / Alpha) for residential and commercial
            premises.</li>
            <li>Selling CSIRO built AI electricity management software.</li>
            <li>Working daily with Solar imaging and mapping tools (Nearmaps / Pylon) Experience
              with Hubspot / Slack / Asana / ServiceM8 / Salesforce Additional air conditioning
            and solar hot water experience.</li>
          </ul>
        </div>
      </div>
    </div>    
  </div>
</div>
</section>
<section class="cta-section">
  <div class="container">
    <div class="row">      
      <div class="col-lg-12">
        <div class="tab-content reserch-tab">
          <!-- single tab content -->
          <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
              <h2 style="color: #000; font-size:40px;">EMILY MUSAPHIA</h2>
            <p style="color: #000; font-size:20px;">Emily Musaphia has been in sales for over 20 years, during which time she has worked
                  with many clients across multiple industries. She is known for her professionalism,
                  presentation and a bubbly upbeat nature.
                  Ever confident Emily has worked her sales ‘magic’ in a myriad of different settings from
                medical instrumentation, to education and the solar industry, including;</p>
                <ul style="color: #000; font-size:20px;">
                  <li>Appointment setting in solar.</li>
                  <li>“Warming up” clients who are indecisive/confused Utilising CRM’S – Pipedrive,
                  Salesforce etc.</li>
                  <li>Liaising sales with installers nationally.</li>
                  <li>Clarifying potential clients through tailored questions.</li>
                </ul>

                </br>
                <p  style="color: #000; font-size:20px;">
                  Emily’s communication skills are second to none, both face to face and over the phone.
                  As a very experienced spruiker, Emily has successfully assisted many well-known
                  companies in the luxury goods, jewellery and travel industries obtain new clients.
                  A real people ‘magnet’, Emily has the gift of connecting to customers from all walks of
                  life.
                  In her latest role, Emily was engaged in selling high-end hearing solutions and she hit the
                  ground running, notching the number one sales spot nationwide within four weeks. She
                  helped launch five major national sales campaigns, trained junior sales staff members
                  and raised the bar for sales performance becoming the “go to” sales star.
                  As a Sales Manager Emily is pro-active in developing innovative inducement schemes for
                  her agents and creating unique environments for sales to flourish.
                  Emily has also honed her sales talents on stage as a multi- award-winning comedian and
                  actress, performing in Australia and Hollywood. Onstage, on screen or on the job, Emily
                  garners praise from all she meets.
                  “Emily is talented. She has flawless comic timing.”,
                  BACKSTAGE - NEW YORK
                  "Funny, and ultimately inspiring. Not to be missed" LA THEATRE REVIEW - HOLLYWOOD
                </p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- <section class="clients-section spad">
  <div class="container">
    <div class="row">      
      <div class="col-lg-12">
        <div class="tab-content reserch-tab">
          
          <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
            <h2 style="color: #758090;  font-size:40px;">REMUNERATION</h2>
            <p style="color: #758090; font-size:17px;">TSST take a negotiated commission for each system sold.
                  We understand the solar industry and back our ability 100% to secure sales for your
                  company.
                  Your customers will receive the very best advice and service available. That we
                guarantee.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section> -->

@endsection
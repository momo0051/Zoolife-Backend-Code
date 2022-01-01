@extends('layouts.header')
@section('content')
<div class="content-wrapper">
      <section class="content-header">
        <h1>
        Contact Us
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        @include('layouts.includes.adminlte.alerts')
        <div class="row">
          <div class="col-md-12">
            
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">About Us</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.contact.save')}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <!-- text input -->
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required="required" placeholder="Enter Title" value="{{$ContactUsCMS->title}}">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description"  placeholder="" >{{$ContactUsCMS->description}}</textarea>
                  </div>

                    <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" required="required" placeholder="Enter email" value="{{$ContactUsCMS->email}}">
                  </div>

                    <div class="form-group">
                    <label>Contact No</label>
                    <input type="number" class="form-control" name="contact_no"  placeholder="Enter Phone No" value="{{$ContactUsCMS->contact_no}}">
                  </div>

                   <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" name="web_address"  placeholder="Enter Website" value="{{$ContactUsCMS->web_address}}">
                  </div>

                    <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address_one"  placeholder="Enter Address" value="{{$ContactUsCMS->address_one}}">
                  </div>

                    <div class="form-group">
                    <label>Second Address</label>
                    <input type="text" class="form-control" name="address_two" required="required" placeholder="Enter Address" value="{{$ContactUsCMS->address_two}}">
                  </div>
                  
                  <div class="form-group  text-center">
                    <input type="submit" class="btn btn-primary">
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
            </div>
            
          </div>
          
        </div>
        
      </section>
      <!-- /.content -->
    </div>
    @endsection
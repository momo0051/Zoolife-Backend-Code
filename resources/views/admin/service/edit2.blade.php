@extends('layouts.header')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Products
        <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="{{route('admin.services.show')}}">Services</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            
           
            
            <!-- general form elements disabled -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Product</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form  role="form" method="POST" action="{{route('admin.services.product.update',$service->id)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required" value="{{$service->name}}">
                  </div>
                                   
                   

                   <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" placeholder="" >{{$service->description}}</textarea>
                  </div>
                  
                    <div class="form-group">                    
                     <img id="image" src="{{ asset('/uploads/services/products/' . $service->image) }}"
                    class="avatar" width="300" height="100" alt="avatar">
                    @if ($errors->has('image'))
                    <span class="help-block">
                      <strong style="color: #a94442;">{{ str_replace('crop image source','banner',$errors->first('image')) }}</strong>
                    </span>
                    @else
                    <h6 id="file_name">Main Image</h6>
                    @endif
                    <label class="btn btn-default btn-file">
                      Browse <input id="main_image" name="image" type="file"
                      style="display: none;"
                      accept="image/*">
                    </label>
                  </div>
                
                <div class=" col-lg-12 form-group">
                    <input type="submit" class="btn btn-primary"></input>
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